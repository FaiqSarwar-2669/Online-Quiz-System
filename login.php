<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin-pages/styling/stylesheet-2.css">
    <title>Login</title>
</head>
<body>
<a href="index.php" class="button_for_register">Back</a>
    <div class="login_form">
        <img src="pic/logo.png" alt="logo pic" class="logo_pic_on_login_form">
        <h1>Login Here</h1>
        <form method="POST" action="backend/LogIn-page.php">
            <p class="error">
               <?php
                if(isset($_GET['error']))
                    echo $_GET['error'];
               ?> 
            </p>
            <label for="user_name">User Name</label><span>*</span><br>
            <input type="text" id="user_name" class="get_user_name_field" placeholder="Enter User Name" name="user_name"><br>
            <label for="user_password">Password</label><span>*</span><br>
            <input type="password" id="user_password" class="get_user_password_field" placeholder="Enter password" name="user_password"><br>
            <input type="submit" value="Log In"><br>
        </form>
    </div>
</body>
</html>