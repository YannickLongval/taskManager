<?php
    include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewTask_styles.css">
    <title>Document</title>
</head>
<body>

    <?php
        include_once 'includes/header.inc.php';
    ?>

    <div class="task-section-container">
        <?php
            echo '<form action="addTask.php?loggedin=success&email='.$_GET['email'].'" method="POST">';
        ?>
            <button type="submit" class="add"><p class="plus">+</p></button>
        </form>
        
        <div class="task-section">
            <h2>IMPORTANT AND<br>URGENT</h2>
            <?php
                $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                $user = mysqli_fetch_array($user_id);
                $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='Y' AND is_urgent='Y'");
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class=task><p>'.$row['task_title'].'</p> <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">DELETE</a></div>';
                    }
                }
            ?>
        </div>
        <div class="vl"></div>
        <div class="task-section">
            <h2>IMPORTANT AND<br>NOT URGENT</h2>
            <?php
                $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                $user = mysqli_fetch_array($user_id);
                $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='Y' AND is_urgent='N'");
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class=task><p>'.$row['task_title'].'</p> <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">DELETE</a></div>';
                    }
                }
            ?>
        </div>
        <div class="vl"></div>
        <div class="task-section">
            <h2>NOT IMPORTANT<br>AND URGENT</h2>
            <?php
                $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                $user = mysqli_fetch_array($user_id);
                $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='N' AND is_urgent='Y'");
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class=task><p>'.$row['task_title'].'</p> <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">DELETE</a></div>';
                    }
                }
            ?>
        </div>
        <div class="vl"></div>
        <div class="task-section">
            <h2>NOT IMPORTANT<br>OR URGENT</h2>
            <?php
                $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                $user = mysqli_fetch_array($user_id);
                $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='N' AND is_urgent='N'");
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class=task><p>'.$row['task_title'].'</p> <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">DELETE</a></div>';
                    }
                }
            ?>
        </div>
    </div>
    
</body>
</html>