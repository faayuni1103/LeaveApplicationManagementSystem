<?php
	// Start up your PHP Session
	session_start();

	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES") 
	header("Location: login.php");

	$empID = $_GET["empID"];

	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "DELETE FROM empProfile WHERE empID = '$empID';" ;
	$sql .= "DELETE FROM EmployeePosition WHERE empID = '$empID';";
	$sql .= "DELETE FROM Login WHERE empID = '$empID';";

	if (mysqli_multi_query($conn, $sql)) {
	echo "<h3>Record deleted successfully</h3>";
	} 

	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>