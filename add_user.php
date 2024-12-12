<?php
  require ("config.php");

  //insert data in empprofile
  $sql = "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Ali', 'A001', 'male','890101-02-9889','019-2334567','ali@gmail.com','13A Jalan Meranti');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Aminah', 'A002', 'female','900107-02-9789','017-2674567','aminah@gmail.com','13H Jalan Meranti');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Megat', 'M001', 'male','850304-01-0134','013-4556780','megat@gmail.com','145 Jalan Resak');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Mariam', 'M002', 'female','8501123-01-2346','016-9001002','mariam@gmail.com','178 Jalan Resak');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Muaz', 'M003', 'male','920603-02-0987','012-8997809','muaz@gmail.com','150 Jalan Resak');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Amirah', 'S001', 'female','971218-01-9008','013-8967807','amirah@gmail.com','234 Jalan Universiti');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Fatin Aimi Ayuni', 'S002', 'female','970322-02-8997','013-8113809','fatin@gmail.com','990 Jalan Universiti');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Bilkis', 'S003', 'female','910918-01-2775','016-9003298','bilkis@gmail.com','190 Jalan Resak');";
  $sql .= "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
  VALUES ('Nurin Sofiya', 'S004', 'female','951028-01-2443','019-6007894','nurin@gmail.com','101 Jalan Resak');";

  //insert data into employee position
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('A001', 'Admin');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('A002', 'Admin');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('M001', 'Manager');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('M002', 'Manager');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('M003', 'Manager');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('S001', 'Staff');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('S002', 'Staff');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('S003', 'Staff');";
  $sql .= "INSERT INTO EmployeePosition (empID, position)
  VALUES ('S004', 'Staff');";

  //insert data in login
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('admin1', 'adm123', 1, 'A001');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('admin2', 'adm234', 1, 'A002');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('manager1', 'mngr123', 2, 'M001');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('manager2', 'mngr234', 2, 'M002');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('manager3', 'mngr345', 2, 'M003');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('amirah', 'amirah1', 3, 'S001');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('fatin', 'fatin1', 3, 'S002');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('bilkis', 'bilkis1', 3, 'S003');";
  $sql .= "INSERT INTO Login (username, password, level, empID)
  VALUES ('nurin', 'nurin1', 3, 'S004');";

  if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records created successfully</h3>";
  } 
  
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?> 