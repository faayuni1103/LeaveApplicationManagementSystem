<?php
  require ("config.php");

  $sql = "CREATE TABLE empProfile(
          empName VARCHAR(25),
          empID VARCHAR(5) PRIMARY KEY,
          gender VARCHAR(10),
          noIC VARCHAR(15),
          phoneNO VARCHAR(14),
          email VARCHAR(25),
          address VARCHAR(35)
          )";

  if (mysqli_query($conn, $sql)) {
      echo "<h3>Table profile created successfully</h3>";
  } 

  else {
    echo "Error creating table: " . mysqli_error($conn);
  }
    
  mysqli_close($conn);
?>