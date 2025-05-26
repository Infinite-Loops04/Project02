<!DOCTYPE html>
 <html>
    <head>
        <title>Form Errors</title>
    </head>
</html>
<?php
    session_start();
    $errors = $_SESSION['validation_errors'] ?? [];
    echo"<h2>Please fix the following errors:</h2>";
    echo"<ul>";
    foreach ($errors as $error)
    {
        echo"<li>" . htmlspecialchars($error) . "</li>";
    }
    echo '<button onclick="location.href=\'apply.php\'">Back to Form</button>';
    unset($_SESSION['validation_errors']);
?>