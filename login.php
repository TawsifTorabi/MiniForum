<?php
session_start();
if(isset($_SESSION['forumcookie'])){
	echo "<script>window.open('index.php','_self')</script>";
	}
	include("connect_db.php");
	if(isset($_POST['login'])){

		$user_email = mysql_real_escape_string($_POST["user_email"]);
		$user_pass = mysql_real_escape_string($_POST["pass"]);

		$login_query="select * from usersdata where email='$user_email' AND password='$user_pass'";
			
		$run = mysql_query($login_query);

		if(mysql_num_rows($run)>0){
		$new_query="select * from usersdata where email='$user_email' AND password='$user_pass'";
	
			if($rows=mysql_fetch_array(mysql_query($new_query))){  
				$userid = $rows['id'];
			}
			$_SESSION['useremail'] = $user_email;
			$_SESSION['userid']= $userid;
			$_SESSION['forumcookie']= $user_email;
			echo "<script>window.open('index.php','_self')</script>";
		} else {
			echo "<script>alert('User Name or Password Incorrect')</script>";
		}
}
?>
<html>
<head>
<link href='../img/logo%20big.png' rel='icon'/>
<title>লগিন</title>
<link rel="icon" type="image/x-icon" href="../img/logoS.png">
<noscript><title>Enable Javascript or This page may act wrong</title></noscript>
</head>
<body>
	<center>
	<noscript><h1>Enable Javascript or This page may act wrong</h1></noscript>
	</br>
	<h2 style="font-family: arial;">লগিন করো</h2>
	</br>
			<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<input type="email" placeholder="ইমেইল লিখো" name="user_email">
					</br>
					<input type="password" placeholder="পাসওয়ার্ড লিখো" name="pass">
					</br>
					<input type="submit" value="লগিন করো" name="login">
		</form>
		</br>
		<small><a href="register.php">একাউন্ট নেই? রেজিস্টার করো</a></small>
	</center>	
</body>
</html>