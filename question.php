<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="validation.js"></script>
		<title>Stack Exchange</title>
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		<br>
		<h2 class="header">What's your question ?</h2>
		<br>
		
		<?php 
		if(isset($_GET["id"])) {
			
			include 'header.php';
			$conn = connectToDatabase();
			$sql = "Select asker_name, asker_email, question_topic, question_content From question Where question_id=".$_GET["id"];
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			echo "<form name = 'inputForm' onsubmit='return validateForm()' action='editQuestion.php?id=".$_GET["id"]."' method='post' >";
			echo "<div id = 'name_box'>";
			echo "<input type='text' name='asker_name' value='".$row["asker_name"]."'><br>";
			echo "<input type='text' name='asker_email' value='".$row["asker_email"]."'><br>";
			echo "<input type='text' name='question_topic' value='".$row["question_topic"]."'><br>";
			echo "</div>";
			echo "<div>";
			echo "<textarea name='content'>".$row["question_content"]."</textarea><br><br>";
			echo "</div>";
			echo "<div id = 'post_button'>";
			echo "<input type='submit' value='Post' onclick='location.href='index.php'>";
			echo "</div>";
			echo "</form>";
		} else {
			echo "<form name = 'inputForm' onsubmit='return validateForm()' action='post.php' method='post' >";
			echo "<div id = 'name_box'>";
			echo "<input type='text' name='asker_name' placeholder='Name'><br>";
			echo "<input type='text' name='asker_email' placeholder='Email'><br>";
			echo "<input type='text' name='question_topic' placeholder='Question Topic'><br>";
			echo "</div>";
			echo "<div>";
			echo "<textarea name='content' placeholder='Content'></textarea><br><br>";
			echo "</div>";
			echo "<div id = 'post_button'>";
			echo "<input type='submit' value='Post' onclick='location.href='index.php'>";
			echo "</div>";
			echo "</form>";
		}
		?>
		
	</body>
</html>