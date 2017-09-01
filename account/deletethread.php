<?php
	session_start();
	if(!isset($_SESSION['forumcookie'])){
		echo "<script>window.open('../login.php','_self')</script>";
		}
	else {
		
		$id =(int)$_GET['id'];
		$uid =$_SESSION['userid'];

		$con = require('../connect_db.php');

		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}

		// sending query
		mysql_query("DELETE FROM questions WHERE questionID='$id' and userID='$uid'")
		or die(mysql_error());

		echo "<script>window.open('index.php','_self')</script>";

	}
?>