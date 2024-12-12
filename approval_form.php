<?php
	session_start(); // Start up your PHP Session

	if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
		header("Location: index.php");   //send user to login page
?>

<html>
	<head>
		<title>Viewing Leave Application</title>
		<link rel="stylesheet" href="layout.css">
	</head>

	<body>
		<div id="appr">
		<h1>View Leave Application</h1>

		<?php
			$applicationID = $_GET['applicationID'];
			require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
			
			// Retrieve data from database
			$sql = "SELECT a.*, d.*
					FROM LeaveApplication a JOIN DateLeave d
					ON a.applicationID = d.applicationID
					WHERE a.applicationID = '$applicationID'
					AND d.applicationID = '$applicationID';";
			$result = mysqli_query($conn, $sql);
			$rows = mysqli_fetch_assoc($result);
		?>

		<form name="approvalapplication" method="post" action="approval_application.php">
		<table border="0" cellspacing="5" cellpadding="0">

			<tr>
			<td align="center"><strong>Application ID</strong></td>
			<td align="center">&nbsp;</td>
			<td align="center"><strong>Employee ID</strong></td>
			<td align="center"><strong>Reason</strong></td>
			<td align="center"><strong>Description</strong></td>
			<td align="center"><strong>Start Leave</strong></td>
			<td align="center"><strong>End Leave</strong></td>
			<td align="center"><strong>Approve/Reject</strong></td>
			</tr>

			<tr>
			<td><?php echo $rows['applicationID']; ?></td>
			<td align="center"><input name="applicationID" type="hidden" id="applicationID" value="<?php echo $rows['applicationID']; ?>"></td>
			<td><?php echo $rows['empID']; ?></td>
			<td><?php echo $rows['reason']; ?></td>
			<td><?php echo $rows['description']; ?></td>
			<td><?php echo $rows['startLeave']; ?></td>
			<td><?php echo $rows['endLeave']; ?></td>
			<td><input type="radio" name="status" value = "Approve" <?php if($rows['status'] == 'Approve') echo "checked";?>>Approve
			<input type="radio" name="status" value = "Reject" <?php if($rows['status'] == 'Reject') echo "checked";?>>Reject</td>
			</tr>

			<tr>
			<td></td><td align="left"><br/><input type="submit" name="submitstatus" value="Update"></td>
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