<?php
    echo '<link rel="stylesheet" href="styles/header_styles.css">
        <nav class="navbar">
            <div class="inner_nav">
                <!-- <img src="YL_Website.png" alt="LOGO"> -->
                <h2>TASK MANAGER</h2>
            </div>
            <div class="inner_nav">
                <ul>';
                if(isset($_GET['loggedin'])){
                    echo    '<li class="view-page"><a href="viewTask.php?loggedin=success&email='.$_GET['email'].'">VIEW TASKS</a></li>
                            <li class="logout"><a href="login.php">LOGOUT</a></li>';
                } else{
                    echo    '<li class="logout"><a href="login.php">LOGIN</a></li>
                            <li class="view-page"><a href="index.php">HOME</a></li>';
                }
                echo '</ul>
                    </div>
                    </nav>'; 
?>