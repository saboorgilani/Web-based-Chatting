<?php 
include_once 'header.php';
?>

<div id="divtwo">
<h1>Sign up</h1>
    <form action="include/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="FullName"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="text" name="uid" placeholder="Username"><br><br>
        <input type="password" name="pwd" placeholder="ae8f94f6a65"><br><br>
        <input type="password" name="pwdrepeat" placeholder="ae8f94f6a65"><br>
        <br>
        <button submit="submit" name="submit">Sing up</button><br>
        <br>
    </form>


    <div id="divthree" >already have an account?<a href="login.php">Log in</a></div>
    </div>