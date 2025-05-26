<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enhancements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            line-height: 1.6;
        }
        h1, h2 {
            color: #004080;
        }
        .enhancement {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <h1>Project Enhancements</h1>
    <p>This page describes the additional features implemented in this project that go beyond the specified requirements.</p>

    <div class="enhancement">
        <h2>1. Sorting EOI Records</h2>
        <p>
            I added a dropdown menu on the <code>manage.php</code> page that allows the HR manager to sort EOI records
            by different fields such as applicant name, job reference number, or application date.
            This was implemented using a <code>SELECT</code> statement with an <code>ORDER BY</code> clause in PHP.
        </p>
    </div>

    <div class="enhancement">
        <h2>2. Manager Registration Page</h2>
        <p>
            A new page <code>register_manager.php</code> was created to allow managers to register by providing a unique username and password.
            The server-side script checks for uniqueness before inserting the manager into a managers table in the MySQL database.
        </p>
    </div>

    <div class="enhancement">
        <h2>3. Access Control on manage.php</h2>
        <p>
            Access to <code>manage.php</code> is now restricted to logged-in users. Managers must log in using <code>login.php</code>, 
            and a session is used to keep them logged in. Unauthorized users are redirected.
        </p>
    </div>

    <div class="enhancement">
        <h2>4. Account Lockout on Failed Logins</h2>
        <p>
            To improve security, I implemented a feature that disables login access for a manager after three invalid login attempts.
            A timestamp is stored, and the account is locked for 10 minutes using session and database flags.
        </p>
    </div>

</body>
</html>
