<?php
    require ("config.php");

    $sql = "CREATE TABLE Login(
            username VARCHAR(10) PRIMARY KEY,
            password VARCHAR(10),
            level INT(3),
            empID VARCHAR(5) REFERENCES empProfile(empID)
            )";

    if (mysqli_query($conn, $sql)){
        echo "<h3>Table login created successfully</h3>";
    }

    else{
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>