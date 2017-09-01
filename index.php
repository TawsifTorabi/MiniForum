<?php
session_start();
require("connect_db.php");
require("functions.php");
?>

<?php
if(!isset($_SESSION['forumcookie'])){
	echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";}

if(isset($_SESSION['forumcookie'])){
	
	$UserID = $_SESSION['userid'];
	
	if($row111=mysql_fetch_array(mysql_query("SELECT * FROM `usersdata` where `id` = '$UserID'"))){  	
		$UserName = $row111['name'];
	}
	
	echo "Hello! <b>$UserName</b> | <a href='account'>My Account</a> | <a href='ask.php'>Ask a Question</a> | <a href='logout.php'>LogOut</a>"; 
	}
?>

</br>
</br>
</br>
</br>

<?php
$sql= "SELECT * FROM `questions` order by `questionID` desc limit 30";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){
?>

<div style="border: 2px solid black; padding: 12px 26px;">

<a href='question.php?id=<?php echo $rows['questionID']; ?>'>
	<h2><?php echo htmlspecialchars($rows['question']); ?></h2>
</a>

<p>
<?php echo htmlspecialchars(shorter($rows['description'], 300));?>
</p>

<?php
$tagID = $rows['TagID'];
$UserID = $rows['userID'];
if($row=mysql_fetch_array(mysql_query("SELECT * FROM `tags` where `TagID` = '$tagID'"))){  	
	$tagName = $row['title'];
}
if($row1=mysql_fetch_array(mysql_query("SELECT * FROM `usersdata` where `id` = '$UserID'"))){  	
	$UserName = $row1['name'];
}
?>

Tag: <b><a href='tag.php?name=<?php echo $tagName;?>'><?php echo $tagName;?></a></br></b>
Asked By <b><a href='user.php?id=<?php echo $UserID; ?>'><?php echo htmlspecialchars($UserName);?></a></br></b>
Question answered: <?php if($rows['answered'] == "yes"){ echo "<span style='color: green; font-weight: bold;'>YES</span>"; } else { echo "<span style='color: red; font-weight: bold;'>NO</span> ";} ?></br>
<a href='question.php?id=<?php echo $rows['questionID']; ?>#answer'>SEE or SUBMIT Answers</a>
</div>
</br>
<?php
}
?>