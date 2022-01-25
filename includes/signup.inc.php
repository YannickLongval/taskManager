<?php
    include_once 'dbh.inc.php';

    //Error handling

    //if code is accessed without submitting form
    // if (isset($_POST['submit'])){
    //     include_once 'dbh.inc.php';

    //     $first = mysqli_real_escape_string($conn, $_POST['first']);
    //     $last = mysqli_real_escape_string($conn, $_POST['last']);
    //     $email = mysqli_real_escape_string($conn, $_POST['email']);
    //     $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    //     $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //     //check if inputs are empty
    //     if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
    //         header("Location: ../index.php?signup=empty");
    //     }
    // }
    // else{
    //     header("Location: ../index.php?signup=error");
    // }

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //prepared statements
    $sql = "INSERT INTO  users(user_first, user_last, user_email, user_pwd) VALUES(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statement failed";
    } else{
        //if not failed, bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $pwd);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    header("Location: ../login.php?signup=success");