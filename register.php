<?php 
session_start();
	if(isset($_SESSION['forumcookie'])){
		echo "<script>alert('You Need To Log Out First'); window.open('index.php','_self');</script>";
		}
	else {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>রেজিস্টার</title>	
		<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
	</head>
<body>
	

<center>
		<a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">রিসেট</a></br>
		<a href="login.php">লগিন</a></br>
</center>

	
	<h2 align="center">সাইন আপ</h2>
	
<form name="information_form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<center>
					<input type="text" required placeholder="নাম লিখো" name="name">
					</br>
					<input type="email" required placeholder="ইমেইল লিখো" name="email">
					</br>
					<input type="password" required placeholder="পাসওয়ার্ড লিখো" name="pass">
					</br>
		</center>
	  
	  </br>
	  
	  <center>
			<input type="submit" value="সাইন আপ" name="signup">
	  </center>
	  
	  </br>

	  </br>
	  </br>

</form>
</body>
</html>


<?php
require('connect_db.php');

if(isset($_POST['signup'])){
$id='';
$name=mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$pass=mysql_real_escape_string($_POST['pass']);
$privilege= 'user';

 $query ="Insert Into `usersdata` Values
      (
       '$id',
       '$name',
       '$email',
       '$pass',
       '$privilege'
      )";  
	  if(mysql_query($query)){
		  
			echo "<script>alert('Data Submitted Successfully'); window.open('login.php','_self');</script>";
		
		}else{
			die(mysql_error());
		}
	}
?>



	<?php } ?>