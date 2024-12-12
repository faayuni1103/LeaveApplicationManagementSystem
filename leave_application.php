<?php
	session_start(); // Start up your PHP Session

	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES") 
		header("Location: login.php");
		
	$empID = $_POST["empID"];
	$startLeave = $_POST["startLeave"];
	$endLeave = $_POST["endLeave"];
	$reason = $_POST["reason"];
	$description = $_POST["description"];
	$status = $_POST["status"];

	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "INSERT INTO LeaveApplication (empID, status, reason, description)
			VALUES ('$empID', '$status', '$reason', '$description');";

	$sql .= "INSERT INTO DateLeave (startLeave, endLeave)
			 VALUES ('$startLeave', '$endLeave');";

	if (mysqli_multi_query($conn, $sql)) {
		echo "<h3>New leave application created successfully</h3>";
	} 
	
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);	   
?>