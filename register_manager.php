<?php
require_once("settings.php");
session_start();

$create_table = "
CREATE TABLE IF NOT EXISTS managers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $create_table);

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (strlen($password) < 8 || !preg_match('/[a-z]/i', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must be at least 8 characters long and contain both letters and numbers.";
    }

    // Check if username is taken
    if (empty($errors)) {
        $stmt = mysqli_prepare($conn, "SELECT id FROM managers WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = "Username already exists.";
        }
        mysqli_stmt_close($stmt);
    }

    // Insert if no errors
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($conn, "INSERT INTO managers (username, password_hash) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);

        if (mysqli_stmt_execute($stmt)) {
            $success = "Manager registered successfully.";
        } else {
            $errors[] = "Error registering manager: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Registration</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f2f2f2;
        color: #333;
        padding: 30px;
    }

    h2 {
        color: #003366;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        background: white;
        padding: 30px;
        max-width: 400px;
        margin: 40px auto; /* This centers the form with equal spacing on both sides */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 15px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        margin-top: 20px;
        background-color: #003366;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background-color: #0055aa;
    }

    ul {
        margin-top: 15px;
        color: red;
    }

    .success {
        color: green;
        margin-top: 15px;
        text-align: center;
    }
</style>
</head>
<body>

<h2 style="text-align:center;">Register New Manager</h2>

<form method="post" action="">
    <label>Username:</label>
    <input type="text" name="username" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Register</button>

    <?php
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $e) {
            echo "<li>" . htmlspecialchars($e) . "</li>";
        }
        echo "</ul>";
    }
    if ($success) {
        echo "<p class='success'>$success</p>";
    }
    echo '<button onclick="location.href=\'index.php\'">Back to Homepage</button>';
    ?>
</form>

</body>
</html>
