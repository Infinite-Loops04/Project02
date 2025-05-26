<?php
    Session_start();
    require_once("settings.php");

// Process form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['list_all'])) {
        // List all EOIs
        $sql = "SELECT * FROM eoi";
        $result = $conn->query($sql);
        if ($result) {
            $result_html .= generateTable($result);
        }
    } elseif (isset($_POST['list_by_job'])) {
        // List EOIs by job reference number
        $jobRef = $conn->real_escape_string($_POST['job_reference_number']);
        $sql = "SELECT * FROM eoi WHERE job_reference_number = '$jobRef'";
        $result = $conn->query($sql);
        if ($result) {
            $result_html .= generateTable($result);
        }
    } elseif (isset($_POST['list_by_applicant'])) {
        // List EOIs by applicant name
        $firstName = $conn->real_escape_string($_POST['applicant_first_name']);
        $lastName = $conn->real_escape_string($_POST['applicant_last_name']);
        
        $conditions = [];
        if ($firstName) $conditions[] = "applicant_first_name LIKE '%$firstName%'";
        if ($lastName) $conditions[] = "applicant_last_name LIKE '%$lastName%'";
        if (count($conditions) > 0) {
            $whereClause = implode(' AND ', $conditions);
            $sql = "SELECT * FROM eoi WHERE $whereClause";
            $result = $conn->query($sql);
            if ($result) {
                $result_html .= generateTable($result);
            }
        }
    } elseif (isset($_POST['delete_by_job'])) {
        // Delete EOIs by job reference number
        $jobRef = $conn->real_escape_string($_POST['delete_job_reference_number']);
        $sql = "DELETE FROM eoi WHERE job_reference_number = '$jobRef'";
        if ($conn->query($sql) === TRUE) {
            $message = "EOIs for job reference '$jobRef' deleted successfully.";
        } else {
            $message = "Error deleting EOIs: " . $conn->error;
        }
    } elseif (isset($_POST['change_status'])) {
        // Change status of an EOI
        $eoiId = $conn->real_escape_string($_POST['eoi_id']);
        $newStatus = $conn->real_escape_string($_POST['new_status']);
        $sql = "UPDATE eoi SET status = '$newStatus' WHERE id = '$eoiId'";
        if ($conn->query($sql) === TRUE) {
            $message = "EOI status updated successfully.";
        } else {
            $message = "Error updating status: " . $conn->error;
        }
    }
}

// Function to generate an HTML table from a result set
function generateTable($result) {
    $html = "<table border='1'><tr>";
    // Fetch field names
    while ($field = $result->fetch_field()) {
        $html .= "<th>{$field->name}</th>";
    }
    $html .= "</tr>";
    // Fetch rows
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        foreach ($row as $cell) {
            $html .= "<td>{$cell}</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    $result->free();
    return $html;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>EOI Management</title>
</head>
<body>
<h2>EOI Management</h2>
<?php if ($message) echo "<p>$message</p>"; ?>

<h3>List all EOIs</h3>
<form method="post">
    <button type="submit" name="list_all">List All EOIs</button>
</form>

<h3>List EOIs for a specific position</h3>

//enhanced manage page 

