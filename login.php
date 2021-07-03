<?php
include_once 'header.php';
?>
<section class="body">
    <h1>Log in</h1><br>
    <form action="include/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username/Email"><br><br>
    <input type="password" name="pwd" placeholder="password"><br><br>
    <button submit="submit" name="submit">login</button><br>
    
    </form>
    <h3>do not have an account? <a href="signup.php">Sign up</a></h3>
    </section>
    </body>
    </html>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
        echo "<p> Fill in all feilds!</p>";
        }
        elseif($_GET["error"]=="wronglogininfo")
        {
            echo "<p>Incorrect login info!</p>";
        }
    }
    ?>