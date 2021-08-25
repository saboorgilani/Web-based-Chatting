<?php 
include_once 'header.php';
?>

<div id="divtwo">
<h1>Sign up</h1>
    <form action="include/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="FullName"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="text" name="uid" placeholder="Username"><br><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <input type="password" name="pwdrepeat" placeholder="RepeatPassword"><br>
        <br>
        <button submit="submit" name="submit">Sing up</button><br>
        <br>
    </form>


    <div id="divthree" >already have an account?<a href="login.php">Log in</a></div>
    </div>
    </body>
    </html>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyinput"){
            echo "<p> Fill in all feilds!</p>";
            }
            
            elseif($_GET["error"]=="usernametaken")
            {
                echo "<p>Username Already exist</p>";
            }
            elseif($_GET["error"]=="passwordsdontmatch")
            {
                echo "<p>Passwords don't match</p>";
            }
        }
    ?>