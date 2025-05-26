<?php 
<html>
<head>
    <title>Apply for Position</title>
</head>
<body>
<h2>Apply for a Position</h2>
<form action="submit_application.php" method="post" enctype="multipart/form-data">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <!-- File Upload for Resume or Document -->
    <label for="attachment">Upload Your Resume or Document:</label>
    <input type="file" id="attachment" name="attachment" accept=".pdf,.doc,.docx" required><br><br>

    <!-- Image Upload (Optional) -->
    <label for="photo">Upload Your Photo:</label>
    <input type="file" id="photo" name="photo" accept="image/*"><br><br>

    <input type="submit" value="Submit Application">
</form>
</body>
</html>
