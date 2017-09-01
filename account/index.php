<?php
session_start();
if(!isset($_SESSION['forumcookie'])){
	echo "<script>window.open('login.php','_self')</script>";
	} else {
	include("../connect_db.php");
	require("../functions.php");
	
?>


<html>
<head>
<title>আমার একাউন্ট</title>
<noscript><title>Enable Javascript or This page may act wrong</title></noscript>
<style>
.lol{
	text-align: center;
}
</style>
</head>
<body>

<?php
	$UserID = $_SESSION['userid'];
	
?>
<a href='../'>Home</a> | <a href='../ask.php'>Ask a Question</a> | <a href='../logout.php'>LogOut</a>
<table width="100%" border="1px">
<tr>
	<th>Status</th>
	<th>Question</th>
	<th>Tag</th>
	<th>Action</th>
</tr>
<?php
$sql= "SELECT * FROM `questions` where `userID` = '$UserID' order by `questionID` desc";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){

$tagID = $rows['TagID'];
$UserID = $rows['userID'];
if($row=mysql_fetch_array(mysql_query("SELECT * FROM `tags` where `TagID` = '$tagID'"))){  	
	$tagName = $row['title'];
}
if($row1=mysql_fetch_array(mysql_query("SELECT * FROM `usersdata` where `id` = '$UserID'"))){  	
	$UserName = $row1['name'];
}
?>



<tr>
	<td class="lol"><?php if($rows['answered'] == "yes"){ echo "<span style='color: green; font-weight: bold;'>Answered</span>"; } else { echo "<span style='color: red; font-weight: bold;'>Not Answered</span> ";} ?></td>
	<td class="lol"><a href='../question.php?id=<?php echo $rows['questionID']; ?>'><?php echo htmlspecialchars($rows['question']); ?></a></td>
	<td class="lol"><b><?php echo $tagName;?></b></td>
	<td class="lol"><b><a href='editthread.php?id=<?php echo $rows['questionID']; ?>'>Edit</a> | <a href='deletethread.php?id=<?php echo $rows['questionID']; ?>'>Delete</a></b></td>
</tr>

<?php
}
?>
</table>

</body>
</html>

	<?php } ?>