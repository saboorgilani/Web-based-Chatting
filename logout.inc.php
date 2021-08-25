<?php
    session_start();
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION["useruid"] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("../log.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_start();
    session_unset();
    session_destroy();
    header("location:../login.php");
    exit();
    ?>