<?php
session_start();
if(isset($_SESSION['username']) || isset($_SESSION['id']))
    header('location: ../../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <title>Login</title>

</head>
<body>
    <div class  = "login-main">
        <h2>Login</h2>
        <h3>Enter your Username & Password</h3>

        <form class="login-form" action="kongwarit.php" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" password="password">
            <a href="#">Foget your password?</a>
            <button type="submit">LOGIN</button>
        </form>
        
    </div>
</body>
</html>