<?php
	session_start(); // Start up your PHP Session

	if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
		header("Location: index.php");   //send user to login page
		
	$applicationID = $_POST["applicationID"];
	$status = $_POST["status"];

	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "UPDATE LeaveApplication SET status = '$status' 
			WHERE applicationID = '$applicationID';" ;

	if (mysqli_query($conn, $sql)) {
		echo "<h3>Record updated successfully</h3>";
	} 
	
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>