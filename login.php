<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <div class="textbox">
                <p>E-mail: </p>
                <input type="text" name="email" placeholder="Enter your e-mail">
            </div>
            <div class="textbox">
                <p>Password: </p>
                <input type="password" name="pwd" placeholder="Enter your password">
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>