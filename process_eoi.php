<?php
    require_once("settings.php");
    //prevent direct access to the script
    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        //redirect to apply.php
        header("Location: apply.php");
        exit();
    }
    //check if 'eoi' table exists
    $table_check_query = " SHOW TABLES LIKE 'eoi'";
    $result = mysqli_query($conn, $table_check_query);
    if (mysqli_num_rows($result) == 0)
    {
        //create table if it doesnt exist
        $create_table_query = "
            CREATE TABLE eoi (
                EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                JobRefenrenceNumber VARCHAR(20) NOT NULL,
                FirstName VARCHAR(20) NOT NULL,
                LastName VARCHAR(20) NOT NULL,
                StreetAddress VARCHAR(40) NOT NULL,
                SuburbTown VARCHAR(40) NOT NULL,
                State ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
                Postcode CHAR(4) NOT NULL,
                EmailAddress VARCHAR(100) NOT NULL,
                PhoneNumber VARCHAR(15) NOT NULL,
                Skill1 BOOLEAN,
                Skill2 BOOLEAN,
                Skill3 BOOLEAN,
                Skill4 BOOLEAN,
                Skill5 BOOLEAN,
                Skill6 BOOLEAN,
                Skill7 BOOLEAN,
                Skill8 BOOLEAN,
                Skill9 BOOLEAN,
                Skill10 BOOLEAN,
                Skill11 BOOLEAN,
                Skill12 BOOLEAN,
                OtherSkills TEXT,
                Status ENUM('New','Current','Final') DEFAULT 'New'
            );";
            mysqli_query($conn, $create_table_query)
    }
    function sanitize_input($data)
    {
        $data = trim($data);    //remove leading and trailing spaces
        $data = stripslashes($data);    //remove backslashes
        $data = htmlspecialchars($data);    // convert special HTML characters
        return $data;
    }
    $errors = [];
    $jobReferenceNumber = sanitize_input($_POST["job_ref_no"]);
    $firstname = sanitize_input($_POST["first_name"]);
    if (!preg_match("/^[a-zA-Z]{1,20}$/",$firstname))
    {
        $errors[] = "First name must be 1-20 alphabetic characters.";
    }
    $lastname = sanitize_input($_POST["last_name"]);
    if (!preg_match("/^[a-zA-Z]{1,20}$/",$lastname))
    {
        $errors[] = "Last name must be 1-20 alphabetic characters.";
    }
    $dob = sanitize_input($_POST["dob"]);
    $dob_parts = explode('/',$dob);
    if (count($dob_parts) == 3)
    {
        $dob_sql = "{$dob_parts[2]}-{$dob_parts[1]}-{$dob_parts[0]}";
    }
    else
    {
        $errors[] = "Date of Birth must be in dd/mm/yyyy format.";
    }
?>