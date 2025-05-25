<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $sql_db = "mysql";
    $conn = @mysqli_connect($host,$user,$password,$sql_db);
    if(!$conn)
    {
        die("connection failed: ".mysqli_connect_error());
    }
?>