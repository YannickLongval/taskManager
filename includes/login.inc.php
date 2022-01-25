<?php

    //Error handling

    //if code is accessed without submitting form
    if (isset($_POST['submit'])){
        include_once 'dbh.inc.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        //check if inputs are empty
        if (empty($email) || empty($pwd)){
            header("Location: ../login.php?login=empty&email=$email");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../login.php?login=email");
                exit();
            } else {
                //Created a template
                $sql = "SELECT * FROM users WHERE user_email = ? AND user_pwd = ?";
                
                //Created a prepare statement
                $stmt = mysqli_stmt_init($conn);

                //Prepare the prepare statement
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "SQL statement failed";
                } else{

                    //if not failed, bind parameters to the placeholder
                    mysqli_stmt_bind_param($stmt, "ss", $email, $pwd);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (mysqli_fetch_assoc($result)){
                        header("Location: ../addTask.php?email=" . $email);
                    }
                    else {
                        header("Location: ../login.php?login=error&email=" . $email);
                    }
                }
            }
        }
    }

    