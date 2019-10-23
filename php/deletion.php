<?php
	include("config.php");
 	session_start();
	$username=$_GET['username'];
	mysqli_query($db,"DELETE FROM user WHERE user_name='$username'");
	header("Location: logout.php");
	exit();
?>