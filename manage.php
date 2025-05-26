<?php
require_once("settings.php");
session_start();
require_once("process_eoi.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage EOIs</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { color: #1f3b6e; }
        table, th, td {
            border: 1px solid #aaa;
            border-collapse: collapse;
            padding: 8px;
        }
        table { width: 100%; margin-top: 20px; }
        form { margin: 20px 0; padding: 10px; background: #f1f1f1; }
        input, select { margin: 5px; padding: 5px; }
        button { padding: 6px 12px; margin-left: 5px; }
    </style>
</head>
<body>
    <h1>Manage EOIs</h1>

    <!-- 1. List All EOIs -->
    <form method="post">
        <button name="action" value="list_all">List All EOIs</button>
    </form>

    <!-- 2. Filter by Job Title -->
    <form method="post">
        <label>Job Title:</label>
        <input type="text" name="jobTitle">
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
            $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);
            $query = "SELECT * FROM eoi WHERE JobTitle = '$jobTitle'";
            $result = mysqli_query($conn, $query);
            echo "<h2>EOIs for Job Title: $jobTitle</h2>";
            displayEOIs($result);
            break;

        case "delete_job":
            $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);
            $delete = "DELETE FROM eoi WHERE JobReferenceNumber = '$jobRef'";
            if (mysqli_query($conn, $delete)) {
                echo "<p style='color:green;'>EOIs with Job Title '$jobTitle' deleted successfully.</p>";
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
    }
}
mysqli_close($conn);
?>

</body>
</html>