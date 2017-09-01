<?php
session_start();
if(!isset($_SESSION['forumcookie'])){
	echo "<script>window.open('login.php','_self')</script>";
	} else {
require('connect_db.php');

if(isset($_POST['submitanswer'])){
$id= '';
$qid = (int)$_POST["QID"];
$answer = mysql_real_escape_string($_POST["answer"]);
$userid = $_SESSION['userid'];

 $query ="Insert Into `answers` Values
	  (
	   '$id',
	   '$userid',
	   '$qid',
	   '$answer'
	  )"; 

mysql_query($query)or die(mysql_error());
if(mysql_affected_rows()>=1){
	echo "<script>window.open('question.php?id=$qid','_self')</script>";
}else{
	echo "<script>alert('Error Occured!'); window.open('index.php','_self')</script>";
	//echo the data from the database to allow the user edit tha data in browser
}

} else { echo "NO DATA ON POST";}
}
?>