<?php
  require ("config.php"); 

  $sql = "CREATE TABLE DateLeave(
          applicationID INT(6) PRIMARY KEY AUTO_INCREMENT REFERENCES LeaveApplication(applicationID),
          startLeave DATE,
          endLeave DATE
          )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table date leave created successfully</h3>";
  } 
  
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>