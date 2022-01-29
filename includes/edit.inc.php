<?php

    //Error handling

    //if code is accessed without submitting form
    if (isset($_POST['submit'])){
        include_once 'dbh.inc.php';

        $email = $_GET['email'];
        $task_id = $_GET['task_id'];
        $task_title = mysqli_real_escape_string($conn, $_POST['task_title']);
        $important = mysqli_real_escape_string($conn, $_POST['important']);
        $urgent = mysqli_real_escape_string($conn, $_POST['urgent']);

        //check if inputs are empty
        if (empty($task_title)){
            header("Location: ../editTask.php?loggedin=success&email=$email&add=empty&task_title=$task_title&is_important=$is_important&is_urgent=$is_urgent");
            exit();
        } else {

            //prepared statements
            $sql = "UPDATE tasks SET task_title=?, is_important=?, is_urgent=? WHERE task_id=?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "SQL statement failed";
            } else{
                //if not failed, bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ssss", $task_title, $important, $urgent, $task_id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);
                // $result = mysqli_stmt_get_result($stmt);
            }
            header("Location: ../viewTask.php?loggedin=success&email=$email");
            
        }
    }

    