<?php
  require ("config.php"); 

  $sql = "CREATE TABLE EmployeePosition(
          empID VARCHAR(5) PRIMARY KEY REFERENCES empProfile(empID),
          position VARCHAR(10)
          )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table employee position created successfully</h3>";
  } 
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>