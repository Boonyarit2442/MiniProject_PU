<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_ResetPass.css">

</head>

<body>
    <div class="resetpass-main">
        <h2>Reset Password</h2>
        <h3>Enter your new username & confirm password</h3>

        <form class="resetpass-form" action="ResetPass_Page.php" method="POST">
            <input type="text" placeholder="New Password" name="username">
            <input type="password" placeholder="Confirm Password" name="password">
            <button  type="submit">Change</button>
            <h3>Black to the <span><a href="http://203.188.54.9/~u6411800010/view/Login/kongwarit.php">Login page.</a></span></h3>
        </form>
        
    </div>
</body>

</html>