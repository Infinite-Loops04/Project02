<?php
    session_start();
    $errors = $_SESSION['validation_errors'] ?? [];
    unset($_SESSION['validation_errors']);
?>
<!DOCTYPE html>
 <html>
    <head>
        <title>Form Errors</title>
    </head>
    <body>
        <h2>Please fix the following errors:</h2>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="index.html">Back to Form</a>
    </body>
</html>