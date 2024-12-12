<?php
	session_start(); // Start up PHP Session

	if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
		header("Location: index.php");
?>
	 	
<html>
	<head>
		<title>Viewing Manager</title>
		<link rel="stylesheet" href="layout.css">
	<head>
	
	<body>
	<div class = header>
            <img src ="header.png" />
            <h2>View Manager</h2>
        </div>
		<div id="vm">
		
		
		<?php
			require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
			
			// Retrieve data from database
			$sql="SELECT e.*, p.position
				FROM empProfile e JOIN EmployeePosition p
				ON e.empID = p.empID
				WHERE p.position='Manager'"; 
			$result = mysqli_query($conn, $sql);
			
			$count = 1;

			if (mysqli_num_rows($result) > 0) {
		?>
			 
		<!-- Start table tag -->
		<table class = "table" width="600" border="1" cellspacing="0" cellpadding="3">
		 
		<!-- Print table heading -->
		<tr>
			<td align="center"><strong>Employee ID</strong></td>
			<td align="center"><strong>Name</strong></td>
			<td align="center"><strong>Gender</strong></td>
			<td align="center"><strong>Identity Number</strong></td>
			<td align="center"><strong>Phone Number</strong></td>
			<td align="center"><strong>Email</strong></td>
			<td align="center"><strong>Address</strong></td>
			
			<?php if ($_SESSION["LEVEL"] != 3) {?>
			<td align="center"><strong>Update</strong></td>
			<td align="center"><strong>Delete</strong></td>
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
		<div id="logouthp"><a href="logout.php">Log Out</a> <?php } $count += 1?>
		</div>
		</div>

	    <tr>
		 	<td><?php echo $rows['empID']; ?></td>
			<td><?php echo $rows['empName']; ?></td>
			<td><?php echo $rows['gender']; ?></td>
			<td><?php echo $rows['noIC']; ?></td>
            <td><?php echo $rows['phoneNO']; ?></td>
			<td><?php echo $rows['email']; ?></td>
			<td><?php echo $rows['address']; ?></td>
			
			<?php if ($_SESSION["LEVEL"] !=3) {?> 
			<td align="center"> <a href="update_form.php?empID=<?php echo $rows['empID']; ?>">Update</a> </td>
			<td align="center"> <a href="delete_profile.php?empID=<?php echo $rows['empID']; ?>">Delete</a> </td>
		</tr> 

		<?php     }
		
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