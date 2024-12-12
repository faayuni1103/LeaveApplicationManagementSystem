<?php
    session_start();

    require('config.php');

    $myusername=$_POST["username"];
    $mypassword=$_POST["password"];

    $sql="SELECT * FROM Login WHERE username='$myusername' and password='$mypassword'";

    $result= mysqli_query($conn, $sql);

    $rows= mysqli_fetch_assoc($result);

    $user_name=$rows["username"];
    $user_id=$rows["password"];
    $user_level=$rows["level"];

    $count=mysqli_num_rows($result);

    if($count==1) {
        $_SESSION["Login"]="YES";
        $_SESSION["USER"]=$user_name;
        $_SESSION["ID"]=$user_id;
        $_SESSION["LEVEL"]=$user_level;

        echo "<h2>You are now logged in as " .$_SESSION["USER"]." with access level ".$_SESSION["LEVEL"]."</h2>";
?>
<html>
<head>
        <title>Verify Login</title>
        <link rel="stylesheet" href="layout.css">    
    <head>
     
    <body>
        <div class = header>
            <img src ="header.png" />
            <h2>Welcome</h2>
        </div>
        <div class="menu">
        <ul>
            <li><a href = "main.php?empID=<?php echo $rows['empID']; ?>">Enter Site</a></li>
            <li><a href = "login.php">Back to login page</a></li>   
        </ul>
        </div>

        <!-- <a href="main.php?empID=<?php echo $rows['empID']; ?>">Enter site</a><br/><br/>
        <a href="login.php">Back to login page</a> -->
</html>
<?php
    } 

    else{
        $_SESSION["Login"] = "NO";
        header("Location: login.php");
    }

    mysqli_close($conn);
?>