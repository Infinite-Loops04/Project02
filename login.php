<?php
require_once("settings.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT id, password_hash FROM managers WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        mysqli_stmt_bind_result($stmt, $id, $password_hash);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $password_hash)) {
            $_SESSION['manager_logged_in'] = true;
            $_SESSION['manager_username'] = $username;
            header("Location: manage.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid username.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Login</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background-color: #f5f5f5; }
        form { background: #fff; padding: 30px; max-width: 400px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px #aaa; }
        h2 { text-align: center; color: #003366; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            margin-top: 20px; background: #003366; color: white; padding: 10px 20px; border: none; border-radius: 5px;
        }
        .error { color: red; margin-top: 10px; text-align: center; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Manager Login</h2>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
        <?php if ($error) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>
    </form>
</body>
</html>
