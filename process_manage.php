<!DOCTYPE html>
<html>
<head>
    <title>EOI Management</title>
</head>
<body>
    <h1>EOI Management System</h1>

    <!-- Display message from PHP -->
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <!-- List all EOIs -->
    <form method="POST">
        <button type="submit" name="list_all">List All EOIs</button>
    </form>

    <hr>

    <!-- List EOIs by Job Reference Number -->
    <h2>List EOIs by Job Reference Number</h2>
    <form method="POST">
        <label for="job_reference_number">Job Reference Number:</label>
        <input type="text" id="job_reference_number" name="job_reference_number" required>
        <button type="submit" name="list_by_job">List</button>
    </form>

    <hr>

    <!-- List EOIs by Applicant Name -->
    <h2>List EOIs by Applicant Name</h2>
    <form method="POST">
        <label for="applicant_first_name">First Name:</label>
        <input type="text" id="applicant_first_name" name="applicant_first_name">
        <label for="applicant_last_name">Last Name:</label>
        <input type="text" id="applicant_last_name" name="applicant_last_name">
        <button type="submit" name="list_by_applicant">List</button>
    </form>

    <hr>

    <!-- Delete EOIs by Job Reference Number -->
    <h2>Delete EOIs by Job Reference Number</h2>
    <form method="POST">
        <label for="delete_job_reference_number">Job Reference Number:</label>
        <input type="text" id="delete_job_reference_number" name="delete_job_reference_number" required>
        <button type="submit" name="delete_by_job">Delete</button>
    </form>

    <hr>

    <!-- Change EOI Status -->
    <h2>Change EOI Status</h2>
    <form method="POST">
        <label for="eoi_id">EOI ID:</label>
        <input type="number" id="eoi_id" name="eoi_id" required>
        <label for="new_status">New Status:</label>
        <select id="new_status" name="new_status" required>
            <option value="">Select Status</option>
            <?php
            // Assuming $statusOptions from PHP code
            foreach ($statusOptions as $status) {
                echo "<option value=\"" . htmlspecialchars($status) . "\">" . htmlspecialchars($status) . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="change_status">Update Status</button>
    </form>

    <!-- Display results table -->
    <?php echo $result_html; ?>
</body>
</html>