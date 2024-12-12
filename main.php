<?php
    session_start();

    if($_SESSION["Login"] != "YES")
        header("Location: login.php");

    $empID = $_GET['empID'];
    require ("config.php");
            
    // Retrieve data from database
    $sql = "SELECT e.*, l.*
            FROM Login l JOIN empProfile e
            ON l.empID = e.empID
            WHERE e.empID = '$empID';"; 
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);

    if($_SESSION["LEVEL"] ==1){
?>

<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="layout.css">    
    <head>
     
    <body>
        <div class = header>
            <img src ="header.png" />
            <h2>Welcome, Admin</h2>
            <!-- <button onclick ="document.location='logout.php'">Log out</button> -->

        </div>
        <div class="menu">
        
        <ul>
            <li><a href = "view_admin.php">Admin Profile</a></li>
            <li><a href = "view_staff.php">Staff Profile</a></li>
            <li><a href = "view_manager.php">Manager Profile</a></li>
            <li><a href = "view_report.php">Leave Application Report</a></li>
            <li><a href = "view_status.php?empID=<?php echo $rows['empID']; ?>">Application Status</a></li>
            <li><a href = "leave_form.php?empID=<?php echo $rows['empID']; ?>">Apply Leave</a></li>
            <li><a href = "profile_form.php?empID=<?php echo $rows['empID']; ?>">Add New Profile</a></li>
            <li><a href = "update_form.php?empID=<?php echo $rows['empID']; ?>">Edit Profile</a></li>   
        </ul>
        </div>
        <button onclick ="document.location='logout.php'">Log out</button>
<?php
    } else if ($_SESSION["LEVEL"] ==2){
?>

<html>
    <head>
        <title>Manager</title>
        <link rel="stylesheet" href="layout.css">    
    <head>
     
    <body>
        <div class = header>
            <img src ="header.png" />
            <h2>Welcome, Manager</h2>
            <button onclick ="document.location='logout.php'">Log out</button>

        </div>
        <div class="menu">
        <ul>
            <li><a href = "view_application.php">Leave Application</a></li>
            <li><a href = "view_report.php">Leave Application Report</a></li>
            <li><a href = "leave_form.php?empID=<?php echo $rows['empID']; ?>">Apply Leave</a></li>
            <li><a href = "update_form.php?empID=<?php echo $rows['empID']; ?>">Edit My Profile</a></li>   
        </ul>
        </div>
<?php    
    } else if ($_SESSION["LEVEL"] ==3){
?>

<html>
    <head>
        <title>Staff</title>
        <link rel="stylesheet" href="layout.css">    
    <head>
     
    <body>
    <div class = header>
            <img src ="header.png" />
            <h2>Welcome, Staff</h2>
            <button onclick ="document.location='logout.php'">Log out</button>

        </div>
        <div class="menu">
        <ul>
            <li><a href = "view_status.php?empID=<?php echo $rows['empID']; ?>">Leave Application Status</a></li>
            <li><a href = "view_report.php?empID=<?php echo $rows['empID']; ?>">Leave Application Report</a></li>
            <li><a href = "leave_form.php?empID=<?php echo $rows['empID']; ?>">Apply Leave</a></li>
            <li><a href = "update_form.php?empID=<?php echo $rows['empID']; ?>">Edit My Profile</a></li>   
        </ul>
        </div>
<?php			 
    }
    mysqli_close($conn);
?>

    </body>
</html>