<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_styles.css">
    <title>Add Task</title>
</head>
<body>
    <?php
        include_once 'includes/header.inc.php';
    ?>
    <div class="forms">
        <h2>Add Task</h2>
        <?php
            echo '<form action="includes/add.inc.php?loggedin=success&email='.$_GET['email'].'" method="POST">';
        ?>
            <div class="textbox">
                <p>Task name: </p>
                <input type="text" name="task_title" placeholder="Enter name of task">
            </div>
            <!-- <div class="textbox">
                <p>Task description: </p>
                <input type="text" name="pwd" placeholder="Enter task description">
            </div> -->
            <div class="textbox">
                <p>Important task? </p>
                <div class="rad-container">
                    <input type="radio" id="importantY" name="important" value="Y">
                    <label for="importantY">Yes</label><br>
                    <input type="radio" id="importantN" name="important" value="N" checked>
                    <label for="importantN">No</label><br>
                </div>
            </div>
            <div class="textbox">
                <p>Urgent task? </p>
                <div class="rad-container">
                    <input type="radio" id="urgentY" name="urgent" value="Y">
                    <label for="urgentY">Yes</label><br>
                    <input type="radio" id="urgentN" name="urgent" value="N" checked>
                    <label for="importantN">No</label><br>
                </div>
            </div>
            <button type="submit" name="submit">Add Task</button>
        </form>

        <?php
            if(!isset($_GET['add'])) {
                exit();
            } 
            else {
                $addCheck = $_GET['add'];

                if ($addCheck == "empty") {
                    echo "<p style='color: red; margin-top: 20px;'>Please fill in all fields</p>";
                    exit();
                } elseif ($addCheck == "success") {
                    echo "<p style='color: green; margin-top: 20px;'>Task successfully Added</p>";
                    exit();
                } 
            }
        ?>
    </div>
</body>
</html>