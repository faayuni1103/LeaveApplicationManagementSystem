<?php
	session_start(); // Start up PHP Session

	if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
	header("Location: index.php");   //send user to login page
?>

<html>
	<head>
		<title>Updating Employee Profile</title>
		<link rel="stylesheet" href="layout.css">

		<script>
			function validate()
			{
				if( document.updateprofile.phoneNO.value == "" ||
					document.updateprofile.phoneNO.value.length < 10 ||
					document.updateprofile.phoneNO.value.length > 12 )
				{
					alert( "Please provide phone number in the correct format!" );
					document.updateprofile.phoneNO.focus() ;
					return false;
				}

				if( document.updateprofile.email.value == "" )
				{
					alert( "Please provide your Email!" );
					document.updateprofile.email.focus() ;
					return false;
				}

				if( document.updateprofile.address.value == "" )
				{
					alert( "Please provide address!" );
					document.updateprofile.address.focus() ;
					return false;
				}			
			}
		</script>
	<head>
	
	<body>
	<div class = header>
            <img src ="header.png" />
            <h2>Update Employee Profile Form</h2>
        </div>
		<div id="upd">
		

		<?php      
			$empID = $_GET['empID'];

			require ("config.php"); 

			// Retrieve data from database
			$sql="SELECT * FROM empProfile WHERE empID='$empID'"; 
			$result = mysqli_query($conn, $sql);
			$rows=mysqli_fetch_assoc($result); 
		?>

		<form name="updateprofile" method="post" action="update_profile.php" onSubmit="return(validate());">
		<table border="0" cellspacing="5" cellpadding="0">

		<tr>
		<td align="center"><strong>Name</strong></td>
		<td align="center">&nbsp;</td>
		<td align="center"><strong>Employee ID</strong></td>
		<td align="center"><strong>Gender</strong></td>
		<td align="center"><strong>IC Number</strong></td>
		<td align="center"><strong>Phone Number</strong></td>
		<td align="center"><strong>Email</strong></td>
		<td align="center"><strong>Address</strong></td>
		</tr>

		<tr>
		<td align="center"><?php echo $rows['empName']; ?></td>
		<td align="center"><input name="empID" type="hidden" id="empID" value="<?php echo $rows['empID']; ?>"></td>
		<td align="center"><?php echo $rows['empID']; ?></td>
		<td align="center"><?php echo $rows['gender']; ?></td>
		<td align="center"><?php echo $rows['noIC']; ?></td>
		<td align="center"><input type="text" name="phoneNO" size="14" value = "<?php echo $rows['phoneNO']; ?>"></td>
		<td align="center"><input type="text" name="email" size="25" value = "<?php echo $rows['email']; ?>"></td>
		<td align="center"><input type="text" name="address" size="35" value = "<?php echo $rows['address']; ?>"></td>

		<td align="center"><input class = "updatebtn" type="submit" name="Submit" value="Update"></td>
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