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
    $firstname = sanitize_input($_POST["first_name"]);
    $lastname = sanitize_input($_POST["last_name"]);
    $dob = sanitize_input($_POST["dob"]);
    $gender = sanitize_input($_POST["gender"]);
    $streetAddress = sanitize_input($_POST["street_address"]);
    $suburbTown = sanitize_input($_POST["suburb"]);
    $state = sanitize_input($_POST["state"]);
    $postcode = sanitize_input($_POST["postcode"]);
    $email = sanitize_input($_POST["email_address"]);
    $phone = sanitize_input($_POST["phone_number"]);
    $jobReferenceNumber = sanitize_input($_POST["job_ref_no"]);
    $skills = [];
    for ($i = 1;$i <= 12;$i++)
    {
        if (isset($_POST["skill$i"]))
        {
            $skill[$i] = 1;
        }
        else
        {
            $skill[$i] = 0;
        }
    }
    $otherSkills = sanitize_input($_POST["other_skills"])
    $status = 'New';//Default
    $errors = [];
    //Required field check
    if (empty($firstname))
    {
        $errors[] = "First name is required.";
    }
    if (empty($lastname))
    {
        $errors[] = "Last name is required.";
    }
    if (empty($dob))
    {
        $errors[] = "Date of birth is required.";
    }
    if (empty($gender))
    {
        $errors[] = "Gender is required.";
    }
    if (empty($streetAddress))
    {
        $errors[] = "Street address is required.";
    }
    if (empty($suburbTown))
    {
        $errors[] = "Suburb/Town is required.";
    }
    if (empty($state))
    {
        $errors[] = "State is required.";
    }
    if (empty($postcode))
    {
        $errors[] = "Postcode is required.";
    }
    if (empty($email))
    {
        $errors[] = "Email address is required.";
    }
    if (empty($phone))
    {
        $errors[] = "Phone number is required.";
    }
    if (empty($jobReferenceNumber))
    {
        $errors[] = "Job reference number is required.";
    }
    //Format validation
    if (!preg_match("/^[a-zA-Z]{1,20}$/",$firstname))
    {
        $errors[] = "First name must be 1-20 alphabetic characters.";
    }
    if (!preg_match("/^[a-zA-Z]{1,20}$/",$lastname))
    {
        $errors[] = "Last name must be 1-20 alphabetic characters.";
    }
    if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob))
    {
        $errors[] = "Date of Birth must be in dd/mm/yyyy format.";
    }
    $dob_parts = explode('/',$dob);
    if (count($dob_parts) == 3)
    {
        $dob_sql = "{$dob_parts[2]}-{$dob_parts[1]}-{$dob_parts[0]}";
    }
    else
    {
        $errors[] = "Date of Birth must be in dd/mm/yyyy format.";
    }
    if (!preg_match("/^\d{4}$/", $postcode))
    {
        $errors[] = "Postcode must be 4 digits";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "Invalid email address";
    }
    if (!preg_match("/^[0-9 ]{8,12}$/", $phone))
    {
        $errors[] = "Phone number must be 8-12 digits";
    }
    //redirect to error page if any errors are detected
    if (!empty($errors))
    {
        $_SESSION['validation_errors'] = $errors;
        header("Location: error.php");
        exit();
    }
    $stmt = mysqli_prepare($conn,
        "INSERT INTO eoi (
            JobReferenceNumber, FirstName, LastName,
            StreetAddress, SuburbTown, State, Postcode, EmailAddress,
            PhoneNumber, Skill1, Skill2, Skill3, Skill4, Skill5, Skill6, Skill7,
            Skill8, Skill9, Skill10, Skill11, Skill12, OtherSkills, Status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, 'sssssssssssiiiiiiiiiiiis',
        $jobReferenceNumber, $firstname, $lastname,
        $streetAddress, $suburbTown, $state, $postcode, $email,
        $phone, $skills[1], $skills[2], $skills[3], $skills[4], $skills[5],
        $skills[6], $skills[7], $skills[8], $skills[9], $skills[10],
        $skills[11], $skills[12], $otherSkills, $status
    );
    if (mysqli_stmt_execute($stmt))
    {
        $eoiNumber = mysqli_insert_id($conn);
        echo "<h2>Application Submitted Successfully!</h2>";
        echo "<p>Your EOInumber is: <strong>$eoiNumber</strong></p>";
    }
    else
    {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>