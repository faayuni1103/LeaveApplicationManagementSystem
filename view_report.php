<?php
    session_start(); // Start up  PHP Session

    if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
        header("Location: index.php");
?>
	
<html>
	<head>
        <title>Viewing Report</title>
        <link rel="stylesheet" href="layout.css">
    <head>
	
    <body>
    <div class = header>
            <img src ="header.png" />
            <h2>View Report</h2>
        </div>
        <div id="rpt">
	    
	
        <?php if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {?>

		<?php
            require("config.php");

            $sql = "SELECT a.*, d.*
                    FROM LeaveApplication a JOIN DateLeave d
                    ON a.applicationID = d.applicationID;";
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
            <td align="center"><strong>Reason</strong></td>
            <td align="center"><strong>Start Leave</strong></td>
            <td align="center"><strong>End Leave</strong></td>
            <td align="center"><strong>Status</strong></td>
	 	</tr>

        <?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {
		?>

        <?php 
			if ($count == 1) {
		?>

        <div class="menu">
        <form method="post" action="view_search_report.php?empID=<?php echo $rows['empID']; ?>">
            <p style = "color: white">Search by employee ID: <input type="text" name="empID" size="5"/>
            <input class = "searchbtn" type="submit" value="Search" /></p>
        </form>
        
        <ul>
            <li><a href="view_sort_id.php">Sort Report by Employee ID</a></li>
            <li><a href="view_sort_date.php">Sort Report by Start Leave Date</a></li>
            <!-- <li><a href = "leave_form.php?empID=<?php echo $rows['empID']; ?>">Apply Leave</a></li>
            <li><a href = "update_form.php?empID=<?php echo $rows['empID']; ?>">Edit My Profile</a></li>    -->
        </ul>
        </div>

        
        <br/>

        <div id="btn">
        <div id="mainhp"><a href="main.php?empID=<?php echo $rows['empID']; ?>">Main Page</a></div>
		<div id="logouthp"><a href="logout.php">Log Out</a> <?php } $count += 1?></div>
        </div>

        <tr>
			<td><?php echo $rows['applicationID']; ?></td>
			<td><?php echo $rows['empID']; ?></td>
			<td><?php echo $rows['reason']; ?></td>
			<td><?php echo $rows['startLeave']; ?></td>
			<td><?php echo $rows['endLeave']; ?></td>
            <td><?php echo $rows['status']; ?></td>
        </tr>
		<?php } }
            else {
                echo "<h3>There are no records to show</h3>";
            }

            mysqli_close($conn);
	    ?>
        </table>

        <?php
        } 
        
        else if($_SESSION["LEVEL"] == 3) {?>
        <?php 		
            $empID = $_GET['empID']; 
            require ("config.php");
            
            // Retrieve data from database
            $sql="SELECT a.*, d.*
                  FROM LeaveApplication a JOIN DateLeave d
                  ON a.applicationID = d.applicationID
                  WHERE empID = '$empID';";

            $count = 1;

            $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) { ?>
					
        <!-- Start table tag -->
        <table width="600" border="1" cellspacing="0" cellpadding="3">
        
        <!-- Print table heading -->
        <tr>
            <td align="center"><strong>Application ID</strong></td>
            <td align="center"><strong>Employee ID</strong></td>
            <td align="center"><strong>Reason</strong></td>
            <td align="center"><strong>Start Leave</strong></td>
            <td align="center"><strong>End Leave</strong></td>
            <td align="center"><strong>Status</strong></td>
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
            <td><?php echo $rows['reason']; ?></td>
            <td><?php echo $rows['startLeave']; ?></td>
            <td><?php echo $rows['endLeave']; ?></td>
            <td><?php echo $rows['status']; ?></td>
        </tr>
        <?php } }
            else {
            echo "<h3>There are no records to show</h3>";
            }

            mysqli_close($conn);
        ?>
        </table>
        </div>
        
        <?php } ?>
    </body>
</html>