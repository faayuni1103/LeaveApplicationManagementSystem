<?php
	session_start(); // Start up PHP Session

	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES")
		header("Location: login.php");
?>

<html>
	<head>
		<title>Insert New Profile</title>
		<link rel="stylesheet" href="layout.css">

		<script>
 
		function validate()
		{
			if( document.addprofile.empName.value == "" || 
				document.addprofile.empName.value.length > 25)
			{
				alert( "Please provide your name in between 1 to 25 characters!" );
				document.addprofile.empName.focus() ;
				return false;
			}

			if( document.addprofile.empID.value == "" )
			{
				alert( "Please provide employee ID in the correct format!" );
				document.addprofile.empID.focus() ;
				return false;
			}

			if( ( document.addprofile.gender[0].checked == false ) && 
					( document.addprofile.gender[1].checked == false ) )
			{
				alert( "Please select gender!" );
				return false;
			}

			if( ( document.addprofile.position[0].checked == false ) && 
				( document.addprofile.position[1].checked == false ) &&
				( document.addprofile.position[2].checked == false ))
			{
				alert( "Please select position!" );
				return false;
			}

			if( document.addprofile.noIC.value == "" ||
				document.addprofile.noIC.value.length != 14 )
			{
				alert( "Please provide identity number in the correct format!" );
				document.addprofile.noIC.focus() ;
				return false;
			}

			if( document.addprofile.phoneNO.value == "" ||
				document.addprofile.phoneNO.value.length < 10 ||
				document.addprofile.phoneNO.value.length > 12 )
			{
				alert( "Please provide phone number in the correct format!" );
				document.addprofile.phoneNO.focus() ;
				return false;
			}

			if( document.addprofile.email.value == "" )
			{
				alert( "Please provide your Email!" );
				document.addprofile.email.focus() ;
				return false;
			}

			if( document.addprofile.address.value == "" )
			{
				alert( "Please provide address!" );
				document.addprofile.address.focus() ;
				return false;
			}			

			if( document.addprofile.username.value == "" || 
				document.addprofile.username.value.length < 4 ||
				document.addprofile.username.value.length > 10  )
			{
				alert( "Please provide a username in between 4 to 10 characters" );
				document.addprofile.username.focus() ;
				return false;
			}

			if( document.addprofile.password.value == "" || 
				document.addprofile.password.value.length < 4 ||
				document.addprofile.password.value.length > 10  )
			{
				alert( "Please provide a password in between 4 to 10 characters" );
				document.addprofile.password.focus() ;
				return false;
			}
				
				return( true );
		}

		function validateEmail() 
		{
			var emailID = document.addprofile.email.value;
			var p1 = emailID.indexOf("@");
			var p2 = emailID.lastIndexOf(".");
			if (p1 < 1 || ( p2 - p1 < 2 ))
			{
				alert("Please enter correct email ID")
				document.addprofile.email.focus();
				return false;
			}
				return( true );
		}
		
		</script>
	</head>

	<body>
	<div class = header>
            <img src ="header.png" />
            <h2>Insert New Employee Profile</h2>
        </div>
		<div id="profile">
		

		<?php
			$empID = $_GET['empID'];

			require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

			// Retrieve data from database
			$sql="SELECT * FROM empProfile WHERE empID='$empID'"; 
			$result = mysqli_query($conn, $sql);
			$rows=mysqli_fetch_assoc($result);
		?>
		
		<p>Please fill in the following information:<br><br>

		<form name="addprofile" method="POST" action="add_profile.php" onSubmit = "return(validate() && validateEmail());">
		<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="empName" size="25"></td>
			</tr>
			<tr>
				<td>Employee ID</td>
				<td><input type="text" name="empID" size="5"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="radio" name="gender" value="male">Male
					<input type="radio" name="gender" value="female">Female</td>
			</tr>
			<tr>
				<td>Position</td>
				<td><input type="radio" name="position" value="Admin">Admin
					<input type="radio" name="position" value="Manager">Manager
					<input type="radio" name="position" value="Staff">Staff</td>
			</tr>
			<tr>
				<td>IC Number</td>
				<td><input type="text" name="noIC" size="15"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phoneNO" size="14"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" size="25"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" size="35"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" size="10"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" size="10"></td>
			</tr>
			<tr>
				<td></td><td align="left"><br/><input class = "btn" type="submit" name="submitprofile" value="Add"></td>
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