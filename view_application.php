<?php
	session_start(); // Start up PHP Session

	if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
		header("Location: login.php");
?>
	 	
<html>
	<head>
		<title>Viewing All Leave Application</title>
		<link rel="stylesheet" href="layout.css">
	<head>
	
	<body>
	<div class = header>
            <img src ="header.png" />
            <h2>View All Leave Application</h2>
        </div>
		<div id="la">
		
	
		<?php
			require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

			$sql = "SELECT * FROM LeaveApplication";
			$result = mysqli_query($conn, $sql);

			$count = 1;

			if (mysqli_num_rows($result) > 0) { 	
		?>
			 
		<!-- Start table tag -->
		<table width="600" border="1" cellspacing="0" cellpadding="3">
		 
		<!-- Print table heading -->
		<tr>
			<td align="center"><strong>Application ID</strong></td>
			<td align="center"><strong>Employee ID</strong></td>
			<td align="center"><strong>Status</strong></td>
			
			<?php if ($_SESSION["LEVEL"] == 2) {?>
			<td align="center"><strong>View</strong></td>
			<?php } ?>
		</tr> 
		
		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {
		?>
		
		<?php 
			if ($count == 1) {
		?>

		<div id="btn">
		<div id="mainhp"><a href="main.php?empID=<?php echo $rows['empID']; ?>">Main Page</a></div>
		<div id="logouthp"><a href="logout.php">Log Out</a> <?php } $count += 1?></div>
		</div>

	    <tr>
			<td><?php echo $rows['applicationID']; ?></td>
			<td><?php echo $rows['empID']; ?></td>
			<td><?php echo $rows['status']; ?></td>
			
			<?php if ($_SESSION["LEVEL"] == 2) {?> 
				<!--only user with access level 2 can view update and delete button-->
				<td align="center"> <a href="approval_form.php?applicationID=<?php echo $rows['applicationID']; ?>">View</a> </td>
		</tr> 

		<?php 	  }
		
			}
			} 
		
			else {
				echo "<h3>There are no records to show</h3>";
			}

			mysqli_close($conn);
	    ?>
	    </table>
		</div>
	</body>
</html>