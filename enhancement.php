<?php
$sort_field = "eoi_id"; 

$allowed_fields = ['eoi_id', 'job_reference', 'first_name', 'last_name', 'status', 'application_date'];

if (isset($_GET['sort_by']) && in_array($_GET['sort_by'], $allowed_fields)) {
    $sort_field = $_GET['sort_by'];
}

$sql = "SELECT * FROM eoi ORDER BY $sort_field";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage EOIs</title>
</head>
<body>

<h1>Manage EOIs</h1>

<form method="get" action="manage.php">
    <label for="sort_by">Sort EOIs by:</label>
    <select name="sort_by" id="sort_by">
        <option value="eoi_id">EOI ID</option>
        <option value="job_reference">Job Reference</option>
        <option value="first_name">First Name</option>
        <option value="last_name">Last Name</option>
        <option value="status">Status</option>
        <option value="application_date">Application Date</option>
    </select>
    <input type="submit" value="Sort">
</form>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>EOI ID</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Status</th><th>Application Date</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['eoi_id']}</td>";
        echo "<td>{$row['job_reference']}</td>";
        echo "<td>{$row['first_name']}</td>";
        echo "<td>{$row['last_name']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>{$row['application_date']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No EOI records found.";
}

mysqli_close($conn);
?>

</body>
</html>


