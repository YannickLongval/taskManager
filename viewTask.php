<?php
    include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/viewTask_styles.css">
    <title>View Tasks</title>
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

        <table>
            <tr class="table_header">
                <th class="table_col"></th>
                <th>IMPORTANT</th>
                <th>NOT IMPORTANT</th>
            </tr>
            <tr>
                <th class="table_col">URGENT</th>
                <td>
                    <div class="task-section">
                        <?php
                            $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                            $user = mysqli_fetch_array($user_id);
                            $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='Y' AND is_urgent='Y'");
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class=task>
                                            <a class=title href="inspectTask.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">'.$row['task_title'].'</a> 
                                            <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">X</a>
                                        </div>';
                                }
                            }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="task-section">
                        <?php
                            $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                            $user = mysqli_fetch_array($user_id);
                            $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='N' AND is_urgent='Y'");
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class=task>
                                            <a class=title href="inspectTask.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">'.$row['task_title'].'</a> 
                                            <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">X</a>
                                        </div>';
                                }
                            }
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="table_col">NOT URGENT</th>
                <td>
                    <div class="task-section">
                        <?php
                            $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                            $user = mysqli_fetch_array($user_id);
                            $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='Y' AND is_urgent='N'");
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class=task>
                                            <a class=title href="inspectTask.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">'.$row['task_title'].'</a> 
                                            <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">X</a>
                                        </div>';
                                }
                            }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="task-section">
                        <?php
                            $user_id = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='".$_GET['email']."'");
                            $user = mysqli_fetch_array($user_id);
                            $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='".$user['user_id']."' AND is_important='N' AND is_urgent='N'");
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class=task>
                                            <a class=title href="inspectTask.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">'.$row['task_title'].'</a> 
                                            <a href="includes/delete.inc.php?loggedin=success&email='.$_GET['email'].'&task_id='.$row['task_id'].'">X</a>
                                        </div>';
                                }
                            }
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    
</body>
</html>