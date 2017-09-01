<?php
session_start();
require('connect_db.php');

		if(isset($_GET['id'])){

		$UID = (int)$_GET['id'];
		$query1 = mysql_query("SELECT * FROM questions WHERE questionID = '$UID'") or die(mysql_error());

		if(mysql_num_rows($query1)>=1){
			while($row = mysql_fetch_array($query1)) {
				$question=$row['question'];
				$description=$row['description'];
				$tagID = $row['TagID'];
				$UserID = $row['userID'];
			}
		}
		?>

		<html>
		<head>
				<title><?php echo $question; ?></title>
		</head>
		<body>

			<?php
			if($rows=mysql_fetch_array(mysql_query("SELECT * FROM `tags` where `TagID` = '$tagID'"))){  	
				$tagName = $rows['title'];
			}
			if($row1=mysql_fetch_array(mysql_query("SELECT * FROM `usersdata` where `id` = '$UserID'"))){  	
				$UserName = $row1['name'];
			}
			?>
			<h1><?php echo $question; ?></h1>
			<p><?php echo $description; ?></p>
			</br>
			Tag: <b><a href='tag.php?name=<?php echo $tagName;?>'><?php echo $tagName;?></a></br></b>
			Asked By <b><a href='user.php?id=<?php echo $UserID; ?>'><?php echo htmlspecialchars($UserName);?></a></br></b>
			Question answered: <?php if($row['answered'] == "yes"){ echo "<span style='color: green; font-weight: bold;'>YES</span>"; } else { echo "<span style='color: red; font-weight: bold;'>NO</span> ";} ?></br>
			</br>
			
			
			
			<a name="answer">
			Write Your Answer:</br>
			<?php
			if(!isset($_SESSION['forumcookie'])){
				echo "You need to login first!";
			} else {
			?>
			<form enctype="multipart/form-data" method="post" action="answer.php">
				<input type="hidden" name="submitanswer" value='0'/>
				<input type="hidden" name="QID" value='<?php echo $_GET['id'];?>'/>
				<textarea name="answer" style="background: black; color: white;" cols="70" rows="10"></textarea>
				</br>
				<input type="submit" value="submit"/>
			</form>
			<?php } ?>
			</a>
			
		
			
			
			<h3>Answers:</h3>
		
			
			
			<?php
			$UID = (int)$_GET['id'];
			$query = mysql_query("SELECT * FROM answers WHERE questionID = '$UID'") or die(mysql_error());
			if(mysql_num_rows($query)>=1){
			while($rows=mysql_fetch_array($query)){
			?>
			<div style="border: 1px solid black;">
				<p><?php echo htmlspecialchars($rows['answer']); ?></p>
				<?php 
					$UserID = $rows['userID'];
					if($row1=mysql_fetch_array(mysql_query("SELECT * FROM `usersdata` where `id` = '$UserID'"))){  	
						$answerer = $row1['name'];
					}
				?>
				Answered by: <a href='user.php?id=<?php echo $UserID; ?>'><?php echo $answerer; ?></a>
			</div>
			</br>			
			<?php
			}
			} else {
				echo "<h2 style='color: red;'>not answered yet!</h2>";
			}
			?>
			</br>

			

		<?php
			} else{
			echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
			// echo if user tries to edit other users data
		}
		
		?>


		</body>
		</html>
