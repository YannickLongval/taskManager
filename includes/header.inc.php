<?php
    echo '<link rel="stylesheet" href="header_styles.css">
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
                }
                echo '</ul>
                    </div>
                    </nav>'; 
?>