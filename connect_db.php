<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db("forum") or die(mysql_error());
$con = mysqli_connect("localhost", "root", "", "forum");

?>

