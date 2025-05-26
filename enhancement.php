<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Features Implementation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
            line-height: 1.6;
        }
        section {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: auto;
        }
        h1 {
            color: #003366;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #1f3b6e;
            margin-top: 20px;
        }
        ul {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<section>
    <h1>Manager Features Implementation Summary</h1>

    <h2>1. Sorting EOIs by Selected Field</h2>
    <p>
        In <code>manage.php</code>, a form was added that allows the manager to select a field (like <strong>EOInumber</strong>, <strong>FirstName</strong>, etc.)
        and the order (ascending/descending) to sort the list of EOIs.
    </p>
    <ul>
        <li>A dropdown menu allows selection of the sort field and order.</li>
        <li>On form submission, the selected values are sanitized and used to build an SQL <code>ORDER BY</code> clause.</li>
        <li>The result is displayed using the <code>displayEOIs()</code> function.</li>
    </ul>

    <h2>2. Manager Registration with Server-Side Validation</h2>
    <p>
        A dedicated page <code>register_manager.php</code> was created to register managers. It includes:
    </p>
    <ul>
        <li>Validation for unique usernames using a database check.</li>
        <li>Password strength rule: at least 8 characters with both letters and numbers.</li>
        <li>Passwords are hashed using <code>password_hash()</code> before storing in the <code>managers</code> table.</li>
        <li>Error messages are displayed if validation fails or the username is taken.</li>
    </ul>

    <h2>3. Login and Access Control for manage.php</h2>
    <p>
        A login system was implemented in <code>login.php</code> and integrated with <code>manage.php</code>:
    </p>
    <ul>
        <li>The login form verifies the manager's credentials using <code>password_verify()</code>.</li>
        <li>On success, a session variable <code>$_SESSION['manager_logged_in']</code> is set.</li>
        <li><code>manage.php</code> checks if this session is active. If not, it redirects the user to <code>login.php</code>.</li>
        <li>A logout option is also provided in <code>manage.php</code> to end the session.</li>
    </ul>
</section>
<?php     echo '<button onclick="location.href=\'index.php\'">Return to Homepage</button>'; ?>
</body>
</html>
