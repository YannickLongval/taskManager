<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/inspectTask_styles.css">
    <title>Task</title>
</head>
<body>
    <?php   
        include_once 'includes/header.inc.php';
        
        $result = mysqli_query($conn, "SELECT * FROM tasks WHERE task_id='".$_GET['task_id']."'");
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class=task>
                        <div class=task_row>
                            <p>Task Title: </p>
                            <p>'.$row['task_title'].'</p>
                        </div>
                        <div class=task_row>
                            <p>Important: </p>';
                if ($row['is_important'] == 'Y') {
                    echo '<p>YES</p>';
                } else {
                    echo '<p>NO</p>';
                } 
                echo '  </div>
                        <div class=task_row>
                        <p>Urgent: </p>';
                if ($row['is_urgent'] == 'Y') {
                    echo '<p>YES</p>';
                } else {
                    echo '<p>NO</p>';
                }

                echo'       </div>
                            <div class="options">
                            <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">DELETE</a>
                            <a href="editTask.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'&task_title='.$row['task_title'].'&is_important='.$row['is_important'].'&is_urgent='.$row['is_urgent'].'">EDIT</a>
                            <a href="viewTask.php?loggedin=success&email='.$_GET['email'].'">RETURN</a>
                        </div>
                    </div>';
            }
        }
    ?>
    
</body>
</html>