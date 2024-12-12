<?php
	session_start(); // Start up PHP Session

	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES") 
		header("Location: login.php");
	  
	$empName = $_POST["empName"];
	$empID = $_POST["empID"];
	$gender = $_POST["gender"];
	$noIC = $_POST["noIC"];
	$phoneNO = $_POST["phoneNO"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$position = $_POST["position"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	$empID = strtoupper($empID);  // convert ID to uppercase

	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
	
	$sql = "INSERT INTO empProfile (empName, empID, gender, noIC, phoneNO, email, address)
			VALUES ('$empName','$empID','$gender', '$noIC', '$phoneNO', '$email', '$address');";

	$sql .= "INSERT INTO EmployeePosition (empID, position)
			 VALUES ('$empID', '$position');";

	if ($position == 'Admin') {
		$sql .= "INSERT INTO Login(username, password, level, empID)
				 VALUES ('$username', '$password', 1, '$empID');";
	}

	else if ($position == 'Manager') {
		$sql .= "INSERT INTO Login(username, password, level, empID)
				 VALUES ('$username', '$password', 2, '$empID');";
	}

	else {
		$sql .= "INSERT INTO Login(username, password, level, empID)
				 VALUES ('$username', '$password', 3, '$empID');";
	}

	if (mysqli_multi_query($conn, $sql)) {
	echo "<h3>New employee profile created successfully</h3>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	mysqli_close($conn);	   
?>