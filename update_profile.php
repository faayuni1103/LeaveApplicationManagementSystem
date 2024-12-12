<?php
	session_start(); // Start up PHP Session

	if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
		header("Location: index.php");   //send user to login page

	$empID = $_POST["empID"];
	$phoneNO = $_POST["phoneNO"];
	$email = $_POST["email"];
	$address = $_POST["address"];

	require ("config.php"); 

	$sql = "UPDATE empProfile SET phoneNO = '$phoneNO', email = '$email', address = '$address' WHERE empID = '$empID'" ;

	if (mysqli_query($conn, $sql)) {
		echo "<h3>Record updated successfully</h3>";
	} 

	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>