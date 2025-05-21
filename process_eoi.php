<?php
    require_once("settings.php");
    //prevent direct access to the script
    if ($_SERVER["REQUEST_METHOD"] !== "POST")
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
    $jobreferencenumber
?>