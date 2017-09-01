<?php
session_start();
require('connect_db.php');

		if(isset($_GET['id'])){

		$UID = (int)$_GET['id'];
		$query1 = mysql_query("SELECT * FROM usersdata WHERE id = '$UID'") or die(mysql_error());

		if(mysql_num_rows($query1)>=1){
			while($row = mysql_fetch_array($query1)) {
				$name=$row['name'];
				$email=$row['email'];
				$UserID = $row['id'];
			}
		}
		?>

		<html>
		<head>
				<title><?php echo $name; ?></title>
		</head>
		<body>
			<h1><?php echo $name; ?></h1>
			<p><?php echo $email; ?></p>
			</br>
		
			<h3>Questions:</h3>
			<center>
			<table border="1px" width="90%">
			<tr>
				<th>Question</th>
			</tr>
			<?php
			$UID = (int)$_GET['id'];
			$query = mysql_query("SELECT * FROM questions WHERE userID = '$UID'") or die(mysql_error());
			if(mysql_num_rows($query)>=1){
			while($rows=mysql_fetch_array($query)){
			?>
			<tr>
			<td style="text-align: center;">
				<a href='question.php?id=<?php echo htmlspecialchars($rows['questionID']); ?>'><?php echo htmlspecialchars($rows['question']); ?></p></a>
			</td>
			</tr>			
			<?php
			}
			} else {
				echo "<tr><td><h2 style='color: red;'>No Questions! A Geek!</h2></td></tr>";
			}
			?>
			</table>
			</center>
			</br>

			

		<?php
			} else{
			echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
			// echo if user tries to edit other users data
		}
		
		?>


		</body>
		</html>
