<?php
	session_start(); // Start up your PHP Session

	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES") 
		header("Location: login.php");
?>

<html>
	<head>
		<title>Leave Application</title>
		<link rel="stylesheet" href="layout.css">

		<script>
 
		function validate()
		{
			if( document.leaveapplication.startLeave.value == "" )
			{
				alert( "Please provide the starting date you're leaving!" );
				document.leaveapplication.startLeave.focus() ;
				return false;
			}

			if( document.leaveapplication.endLeave.value == "" )
			{
				alert( "Please provide the ending date you're leaving!" );
				document.leaveapplication.endLeave.focus() ;
				return false;
			}

			if( document.leaveapplication.reason.value == "")
			{
				alert( "Please choose your reason!" );
				return false;
			}

			if( document.leaveapplication.description.value == "" )
			{
				alert( "Please provide your explanation!" );
				document.leaveapplication.description.focus() ;
				return false;
			}
			
			return( true );
		}
 
		</script>
	</head>

	<body>
	<div class = header>
            <img src ="header.png" />
            <h2>Leave Application Form</h2>
        </div>
		<div id="leaveapp">
		

		<?php
			$empID = $_GET['empID'];

			require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

			// Retrieve data from database
			$sql="SELECT * FROM empProfile WHERE empID='$empID'"; 
			$result = mysqli_query($conn, $sql);
			$rows=mysqli_fetch_assoc($result);
		?>

		<p>Please fill in the following information:<br><br>

		<form name="leaveapplication" method="POST" action="leave_application.php" onSubmit="return(validate());">
		<table border="0">
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center"><input name="empID" type="hidden" id="empID" value="<?php echo $rows['empID']; ?>"></td>
			</tr>
			<tr>
				<td>Date Start Leave</td>
				<td><input type="date" name="startLeave"></td>
			</tr>
			<tr>
				<td>Date End Leave</td>
				<td><input type="date" name="endLeave"></td>
			</tr>
			<tr>
				<td>Reason</td>
				<td><select name = "reason">
					<option value = "Medical leave">Medical leave</option>
					<option value = "Family matters">Family matters</option>
					<option value = "Emergency">Emergency</option>
					<option value = "Others">Others</option>
				</select></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="description" size="100"></td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center"><input name="status" type="hidden" id="status" value="Pending"></td>
			</tr>
			<tr>
				<td></td><td align="left"><br/><input class = "btn" type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		</form>
		</div>

		<div id="btn">
		<div id="mainhp"><a href="main.php?empID=<?php echo $rows['empID']; ?>">Main Page</a></div>
		<div id="logouthp"><a href="logout.php">Log Out</a></div>
		</div>
	</body>
</html>

<?php 
	mysqli_close($conn);
?>