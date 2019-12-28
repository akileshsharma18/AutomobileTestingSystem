<?php
//error_reporting(0);
	session_start();
	session_unset();
    session_destroy();		
	header("location:index.php");
	setcookie("uname", "", time() - 3600); 
	setcookie("name", "", time() - 3600); 
	setcookie("type", "", time() - 3600);
	setcookie("cid", "", time() - 3600);  
    exit();
?>