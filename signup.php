<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_styles.css">
    <title>Sign Up</title>
</head>
<body>

    <?php
        include_once 'includes/header.inc.php';
    ?>

    <div class="login">
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="POST">
            <?php
                if (isset($_GET['fname'])) {
                    $first = $_GET['fname'];
                    echo    '<div class="textbox">
                                <p>First name: </p> 
                                <input type="text" name="fname" placeholder="Enter your given name" value="'.$first.'">
                            </div>';
                }
                else {
                    echo    '<div class="textbox">
                                <p>First name: </p> 
                                <input type="text" name="fname" placeholder="Enter your given name">
                            </div>';
                }

                if (isset($_GET['lname'])) {
                    $last = $_GET['lname'];
                    echo    '<div class="textbox">
                                <p>Last name: </p> 
                                <input type="text" name="lname" placeholder="Enter your surname" value="'.$last.'">
                            </div>';
                }
                else {
                    echo    '<div class="textbox">
                                <p>Last name: </p> 
                                <input type="text" name="lname" placeholder="Enter your surname">
                            </div>';
                }

                if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                    echo    '<div class="textbox">
                                <p>E-mail: </p>
                                <input type="text" name="email" placeholder="Enter your e-mail" value="'.$email.'">
                            </div>';
                }
                else {
                    echo    '<div class="textbox">
                                <p>E-mail: </p>
                                <input type="text" name="email" placeholder="Enter your e-mail">
                            </div>';
                }
            ?>
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

        <?php
            if(!isset($_GET['signup'])) {
                exit();
            } 
            else {
                $signupCheck = $_GET['signup'];

                if ($signupCheck == "empty") {
                    echo "<p style='color: red; margin-top: 20px;'>Please fill in all fields</p>";
                    exit();
                } elseif ($signupCheck == "char") {
                    echo "<p style='color: red; margin-top: 20px;'>Invalid name</p>";
                    exit();
                } elseif ($signupCheck == "email") {
                    echo "<p style='color: red; margin-top: 20px;'>Invalid email</p>";
                    exit();
                } elseif ($signupCheck == "taken") {
                    echo "<p style='color: red; margin-top: 20px;'>User already exists with that email</p>";
                    exit();
                } elseif ($signupCheck == "match") {
                    echo "<p style='color: red; margin-top: 20px;'>Passwords do not match</p>";
                    exit();
                }
            }
        ?>
    </div>
</body>
</html>