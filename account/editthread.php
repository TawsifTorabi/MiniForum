<?php
	session_start();
	if(!isset($_SESSION['forumcookie'])){
		echo "<script>window.open('../login.php','_self')</script>";
		}
	else {
		
require('../connect_db.php');


		if(isset($_POST['update'])){
			$qid = (int)$_POST["qusid"];
			$title = mysql_real_escape_string($_POST["title"]);
			$description = mysql_real_escape_string($_POST["description"]);
			$userid = $_SESSION['userid'];

			$query="UPDATE questions
					SET question = '$title', description = '$description'
					WHERE questionID='$qid' and userID='$userid'";


			mysql_query($query)or die(mysql_error());
			if(mysql_affected_rows()>=1){
				echo "<script>window.open('index.php','_self')</script>";
			}else{
				echo "<script>alert('Error Occured!'); window.open('index.php','_self')</script>";
				//echo the data from the database to allow the user edit tha data in browser
			}
	
	} else {


		if(isset($_GET['id'])){

		$UID = (int)$_GET['id'];
		$userid = $_SESSION['userid'];
		$query = mysql_query("SELECT * FROM questions WHERE questionID = '$UID' and userID='$userid'") or die(mysql_error());

		if(mysql_num_rows($query)>=1){
			while($row = mysql_fetch_array($query)) {
				$question=$row['question'];
				$description=$row['description'];
			}
		?>

		<html>
		<head>
				<title>সম্পাদনা </title>
		</head>
		<body>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
			
			<input type="hidden" value="<?php echo $UID;?>" name="qusid">
			<input type="submit" value="আপডেট করো" name="update"></br>
			<input type="text" value="<?php echo $question; ?>" required placeholder="টাইটেল" name="title"></br>	

			<textarea required="" cols="90" placeholder="বিস্তারিত লিখো..." name="description" rows="20"><?php echo $description; ?></textarea>
			</br>
			
		</form>

		</body>
		</html>

		<?php
		}else{
			echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
			// echo if user tries to edit other users data
		}
		
		}
		?>





<?php
	}}
?>