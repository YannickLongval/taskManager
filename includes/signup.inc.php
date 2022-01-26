<?php
    include_once 'dbh.inc.php';

    //Error handling

    //if code is accessed without submitting form
    if (isset($_POST['submit'])){
        include_once 'dbh.inc.php';

        $first = mysqli_real_escape_string($conn, $_POST['fname']);
        $last = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);

        //check if inputs are empty
        if (empty($first) || empty($last) || empty($email) || empty($pwd) || empty($cpwd)){
            header("Location: ../signup.php?signup=empty&fname=$first&lname=$last&email=$email");
            exit();
        } else {
            if ($pwd != $cpwd){
                header("Location: ../signup.php?signup=match&fname=$first&lname=$last&email=$email");
                exit();
            } else {
                if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                    header("Location: ../signup.php?signup=char&email=$email");
                    exit();
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        header("Location: ../signup.php?signup=email&fname=$first&lname=$last");
                        exit();
                    } else {
                        $select = mysqli_query($conn, "SELECT * FROM users WHERE user_email='".$_POST['email']."'");
                        if(mysqli_num_rows($select)) {
                            header("Location: ../signup.php?signup=taken&fname=$first&lname=$last");
                            exit();
                        } else {

                            //prepared statements
                            $sql = "INSERT INTO users(user_first, user_last, user_email, user_pwd) VALUES(?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
        
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "SQL statement failed";
                            } else{
                                //if not failed, bind parameters to the placeholder
                                mysqli_stmt_bind_param($stmt, "ssss", $first, $last, $email, $pwd);
                                //run parameters inside database
                                mysqli_stmt_execute($stmt);
                                // $result = mysqli_stmt_get_result($stmt);
                            }
        
                            header("Location: ../login.php?signup=success");
                        }
                    }
                }
            }
        }
    }

    