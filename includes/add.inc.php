<?php

    //Error handling

    //if code is accessed without submitting form
    if (isset($_POST['submit'])){
        include_once 'dbh.inc.php';

        $email = $_GET['email'];
        $task_title = mysqli_real_escape_string($conn, $_POST['task_title']);
        $important = mysqli_real_escape_string($conn, $_POST['important']);
        $urgent = mysqli_real_escape_string($conn, $_POST['urgent']);

        //check if inputs are empty
        if (empty($task_title)){
            header("Location: ../addTask.php?email=$email&add=empty&task_title=$task_title&is_important=$is_important&is_urgent=$is_urgent");
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
                //prepared statements
                $sql = "INSERT INTO tasks(user_id, task_title, is_important, is_urgent) VALUES(?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "SQL statement failed";
                } else{
                    $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$email."'");
                    $result = mysqli_fetch_array($user_id);
                    //if not failed, bind parameters to the placeholder
                    mysqli_stmt_bind_param($stmt, "ssss", $result['user_id'], $task_title, $important, $urgent);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);
                    // $result = mysqli_stmt_get_result($stmt);
                }
                header("Location: ../addTask.php?loggedin=success&email=$email&add=success");
            }
            
        }
    }

    