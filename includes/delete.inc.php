<?php
    include_once 'dbh.inc.php';

    $email = $_GET['email'];
    $task_id = mysqli_real_escape_string($conn, $_GET['task_id']);

    //Created a template
    $sql = "DELETE FROM tasks WHERE task_id = ?";
            
    //Created a prepare statement
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statement failed";
    } else{
        //if not failed, bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "s", $task_id);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);
    }
    header("Location: ../viewTask.php?loggedin=success&email=$email");


