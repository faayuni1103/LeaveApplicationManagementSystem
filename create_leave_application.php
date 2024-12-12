<?php
  require ("config.php"); 

  $sql = "CREATE TABLE LeaveApplication(
          applicationID INT(6) PRIMARY KEY AUTO_INCREMENT,
          empID VARCHAR(5) REFERENCES empProfile(empID),
          status VARCHAR(10),
          reason VARCHAR(50),
          description VARCHAR(100)
          )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table leave application created successfully</h3>";
  } 

  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>