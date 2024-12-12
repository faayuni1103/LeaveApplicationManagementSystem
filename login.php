<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="layout.css">
    </head>

    <body>
        <div class = header>
            <img src ="header.png" />
            <h2>Welcome to Leave Application Management System</h2>
            

        </div>
        
        <br><br>
        <div id="login">
            <form method="post" action="verify_login.php">
                <br><p>Username: <input type="text" name="username" /></p>
                <p>Password: <input type="password" name="password" /></p><br>
                <p><input class = "loginbtn" type="submit" value="Log in" /></p>
            </form>
        </div>
    </body>
</html>