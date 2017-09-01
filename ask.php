<?php
session_start();
if(!isset($_SESSION['forumcookie'])){
	echo "<script>window.open('login.php','_self')</script>";
	} else {
	include("connect_db.php");
	
	if(isset($_POST['ask'])){
		
		$questionID = '';
		$title = mysql_real_escape_string($_POST["title"]);
		$tagID = mysql_real_escape_string($_POST["tagid"]);
		$description = mysql_real_escape_string($_POST["description"]);
		$answered = 'no';
		$userID = $_SESSION['userid'];
		
		$query1 ="Insert Into `questions` Values
		  (
		   '$questionID',
		   '$title',
		   '$description',
		   '$answered',
		   '$tagID',
		   '$userID'
		  )";  
		  if(mysql_query($query1)){			
				echo "<script>alert('Data Submitted Successfully'); window.open('index.php','_self');</script>";
			}else{
				die(mysql_error());
			}
			
		} else {
	

	
?>


<html>
<head>
<title>জিজ্ঞাসা</title>
<noscript><title>Enable Javascript or This page may act wrong</title></noscript>
</head>
<body>

<form name="information_form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="submit" value="পোস্ট করো" name="ask"></br>
	<input type="text" required placeholder="টাইটেল" name="title"></br>
	Tag: <select required name="tagid">
	<?php
		$sql= "SELECT * FROM `tags` order by `TagID`";
		$result=mysql_query($sql);
		while($rows=mysql_fetch_array($result)){
	?>
	<option value="<?php echo $rows['TagID']; ?>"><?php echo $rows['title']; ?></option>
	<?php
		}
	?>
	</select>	
	</br>
	<textarea required="" cols="90" placeholder="বিস্তারিত লিখো..." name="description" rows="20"></textarea>
	</br>
</form>

</body>
</html>

	<?php }} ?>