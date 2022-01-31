<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/form_styles.css">
    <title>Login</title>
</head>
<body>

    <?php
        include_once 'includes/header.inc.php';
    ?>
    
    <div class="forms">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <?php
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
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>

        <?php
            if(!isset($_GET['login'])) {
                exit();
            } 
            else {
                $loginCheck = $_GET['login'];

                if ($loginCheck == "empty") {
                    echo "<p style='color: red; margin-top: 20px;'>Please fill in all fields</p>";
                    exit();
                } elseif ($loginCheck == "email") {
                    echo "<p style='color: red; margin-top: 20px;'>Invalid email</p>";
                    exit();
                } elseif ($loginCheck == "error") {
                    echo "<p style='color: red; margin-top: 20px;'>Invalid email or password</p>";
                    exit();
                }
            }
        ?>
    </div>
</body>
</html>