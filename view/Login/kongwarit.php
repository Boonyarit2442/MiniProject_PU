<?php
require_once "../../controler/loginController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>

    

</head>
<body>
    <div class  = "login-main">
        <h2>Login</h2>
        <h3>Enter your username to change password</h3>

        <form class="login-form" action="kongwarit.php" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <!--a href="http://203.188.54.9/~u6411800010/view/ForgetPass_Page/ForgetPass_Page.php" style="width: 150px;">Foget your password?</a-->
            <button type="submit">LOGIN</button>
        </form>
        
    </div>
</body>
</html>