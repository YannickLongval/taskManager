<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add Task</title>
</head>
<body>
    <div class="login">
        <h2>Add Task</h2>
        <form action="includes/login.inc.php" method="POST">
            <div class="textbox">
                <p>Task name: </p>
                <input type="text" name="task_title" placeholder="Enter name of task">
            </div>
            <div class="textbox">
                <p>Task description: </p>
                <input type="text" name="pwd" placeholder="Enter task description">
            </div>
            <div class="textbox">
                <p>Important task? </p>
                <div class="rad-container">
                    <input type="radio" id="importantY" name="important" value="Important" class="rad">
                    <label for="importantY">Yes</label><br>
                    <input type="radio" id="importantN" name="important" value="NotImportant" class="rad">
                    <label for="importantN">No</label><br>
                </div>
            </div>
            <div class="textbox">
                <p>Urgent task? </p>
                <div class="rad-container">
                    <input type="radio" id="urgentY" name="urgent" value="Urgent">
                    <label for="urgentY">Yes</label><br>
                    <input type="radio" id="urgentN" name="urgent" value="NotUrgent">
                    <label for="importantN">No</label><br>
                </div>
            </div>
            <button type="submit" name="submit">Add Task</button>
        </form>
        <p><a href="login.php">Logout</a></p>
    </div>
</body>
</html>