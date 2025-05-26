<?php
require_once("settings.php");
session_start();
// Redirect to login if not logged in
if (!isset($_SESSION['manager_logged_in']) || $_SESSION['manager_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/Project1.css">
    <title>Manage EOIs</title>
    <style>
        /* Manage EOIs Page Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            padding: 20px;
        }

        h1, h2 {
            color: #1f3b6e;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        form label {
            display: inline-block;
            min-width: 120px;
            font-weight: bold;
        }

        form input, form select, form button {
            margin: 10px 5px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            background-color: #003366;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0055aa;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid #aaa;
        }

        th {
            background-color: #1f3b6e;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            background-color: #fff;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php include("header.inc"); ?>
    <h1>Manage EOIs</h1>

    <!-- 1. List All EOIs -->
    <form method="post">
        <button name="action" value="list_all">List All EOIs</button>
    </form>

    <!-- 2. Filter by Job Reference Number -->
    <form method="post">
        <label>Job Reference Number:</label>
        <select name="job_ref_no" id="job_ref_no">
            <option value="">Please select your preferred Position</option>
            <option value="cfa-2025-63">Computer Forensic Analyst(CFA-2025-63)</option>
            <option value="css-2025-21">Cyber Security Specialist(CSS-2025-21)</option>
            <option value="eha-2025-86">Ethical Hacker(EHA-2025-86)</option>
            <option value="ise-2025-26">IT Security Engineer(ISE-2025-26)</option>
        </select>
        <button name="action" value="filter_job">Search by Job Title</button>
        <button name="action" value="delete_job" style="background:purple; color:white;">Delete EOIs by Job Ref</button>
    </form>

    <!-- 3. Filter by Applicant Name -->
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="firstName">
        <label>Last Name:</label>
        <input type="text" name="lastName">
        <button name="action" value="filter_name">Search by Name</button>
    </form>

    <!-- 5. Change Status -->
    <form method="post">
        <label>EOInumber:</label>
        <input type="number" name="eoiNumber" required>
        <label>New Status:</label>
        <select name="newStatus">
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select>
        <button name="action" value="change_status">Update Status</button>
    </form>

    <!-- 6. Sort EOIs -->
    <form method="post">
        <label>Sort by:</label>
        <select name="sort_field">
            <option value="EOInumber">EOInumber</option>
            <option value="JobReferenceNumber">Job Reference Number</option>
            <option value="FirstName">First Name</option>
            <option value="LastName">Last Name</option>
            <option value="Status">Status</option>
        </select>
        <select name="sort_order">
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>
        <button name="action" value="sort">Sort EOIs</button>
    </form>
<?php
function displayEOIs($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr>
                <th>EOInumber</th><th>Job Ref</th><th>First Name</th><th>Last Name</th>
                <th>Email</th><th>Phone</th><th>Status</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['EOInumber']}</td>
                    <td>{$row['JobReferenceNumber']}</td>
                    <td>{$row['FirstName']}</td>
                    <td>{$row['LastName']}</td>
                    <td>{$row['EmailAddress']}</td>
                    <td>{$row['PhoneNumber']}</td>
                    <td>{$row['Status']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }
}

// Handle Form Actions
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case "list_all":
            $query = "SELECT * FROM eoi";
            $result = mysqli_query($conn, $query);
            echo "<h2>All EOIs</h2>";
            displayEOIs($result);
            break;

        case "filter_job":
            $jobRef = mysqli_real_escape_string($conn, $_POST['job_ref_no']);
            $query = "SELECT * FROM eoi WHERE JobReferenceNumber = '$jobRef'";
            $result = mysqli_query($conn, $query);
            echo "<h2>EOIs for Job Reference Number: $jobRef</h2>";
            displayEOIs($result);
            break;

        case "delete_job":
            $jobRef = mysqli_real_escape_string($conn, $_POST['job_ref_no']);
            $delete = "DELETE FROM eoi WHERE JobReferenceNumber = '$jobRef'";
            if (mysqli_query($conn, $delete)) {
                echo "<p style='color:green;'>EOIs with Job Reference Number '$jobRef' deleted successfully.</p>";
            } else {
                echo "<p style='color:purple;'>Error deleting EOIs.</p>";
            }
            break;

        case "filter_name":
            $first = mysqli_real_escape_string($conn, $_POST['firstName'] ?? '');
            $last = mysqli_real_escape_string($conn, $_POST['lastName'] ?? '');

            $conditions = [];
            if (!empty($first)) $conditions[] = "FirstName = '$first'";
            if (!empty($last))  $conditions[] = "LastName = '$last'";
            if (count($conditions) > 0) {
                $query = "SELECT * FROM eoi WHERE " . implode(" AND ", $conditions);
                $result = mysqli_query($conn, $query);
                echo "<h2>EOIs for Applicant: $first $last</h2>";
                displayEOIs($result);
            } else {
                echo "<p style='color:red;'>Please provide at least a first or last name.</p>";
            }
            break;

        case "change_status":
            $eoiNumber = (int)$_POST['eoiNumber'];
            $newStatus = mysqli_real_escape_string($conn, $_POST['newStatus']);

            $update = "UPDATE eoi SET Status = '$newStatus' WHERE EOInumber = $eoiNumber";
            if (mysqli_query($conn, $update)) {
                echo "<p style='color:green;'>Status updated successfully for EOI #$eoiNumber.</p>";
            } else {
                echo "<p style='color:red;'>Failed to update status.</p>";
            }
            break;
        case "sort":
            $allowed_fields = ['EOInumber', 'JobReferenceNumber', 'FirstName', 'LastName', 'Status'];
            $allowed_orders = ['ASC', 'DESC'];

            $field = in_array($_POST['sort_field'], $allowed_fields) ? $_POST['sort_field'] : 'EOInumber';
            $order = in_array($_POST['sort_order'], $allowed_orders) ? $_POST['sort_order'] : 'ASC';

            $query = "SELECT * FROM eoi ORDER BY $field $order";
            $result = mysqli_query($conn, $query);
            echo "<h2>EOIs Sorted by $field ($order)</h2>";
            displayEOIs($result);
            break;
    }
}
mysqli_close($conn);
include("footer.inc");
?>

</body>
</html>