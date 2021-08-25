<?php
session_start();
if(isset($_SESSION["useruid"])){
	$text = $_POST['text'];
	date_default_timezone_set('Asia/Kolkata');
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'>(".date('m/d/Y h:i:s a', time()).") <b>".$_SESSION["useruid"]."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);
}
?>