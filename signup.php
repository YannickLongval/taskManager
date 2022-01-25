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
    <title>Sign Up</title>
</head>
<body>
    <div class="login">
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="POST">
            <div class="textbox">
                <p>First name: </p>
                <input type="text" name="fname" placeholder="Enter your given name">
            </div>
            <div class="textbox">
                <p>Last name: </p>
                <input type="text" name="lname" placeholder="Enter your surname">
            </div>
            <div class="textbox">
                <p>E-mail: </p>
                <input type="text" name="email" placeholder="Enter your e-mail">
            </div>
            <div class="textbox">
                <p>Password: </p>
                <input type="password" name="pwd" placeholder="Enter your password">
            </div>
            <div class="textbox">
                <p>Confirm password: </p>
                <input type="password" name="cpwd" placeholder="Confirm your password">
            </div>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <p><a href="login.php">Login</a></p>
    </div>
</body>
</html>