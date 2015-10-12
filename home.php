<!DOCTYPE html>
<html>
<head>
	<title>
		Simple StackExchange
	</title>
	<link rel='stylesheet' type="text/css" href="css/sst.css">
</head>

<body>
	<h1 align="center">Simple StackExchange</h1>
	<br>
	<br>
	<div class="search" align="center">
		<form action="home.php" class="searchform" method="GET">
			<input type="text" id="search" name="search">
	        <input type="submit" id="submit" name="searchbutton" value="Search">
		</form>
	</div>
	<h3 id="ask_here">Cannot find what you are looking for? <a href="create.php">Ask here</a></h3>
	<br>
	<h3 id="recent">Recently Asked Questions</h3>
	<hr>
	<?php
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);

		if ($_POST['type'] == 'ask') {
			$insert = "INSERT INTO question (name, email, topic, content) VALUES (
				'".$_POST["name"]."',
				'".$_POST["email"]."',
				'".$_POST["topic"]."',
				'".$_POST["content"]."'
			)";
			mysql_query($insert);
		}
		else if ($_POST['type'] == 'update') {
			$update = "UPDATE
							question
						SET
							name='".$_POST["name"]."',
							email='".$_POST['email']."',
							topic='".$_POST['topic']."',
							content='".$_POST['content']."'
						WHERE
							id='".$_POST['question_id']."'";
			mysql_query($update);
		}
		else if ($_POST['type'] == 'answer') {
			$answer = "INSERT INTO answer (question_id, name, email, content) VALUES (
				'".$_POST['question_id']."',
				'".$_POST['name']."',
				'".$_POST['email']."',
				'".$_POST['content']."'
			)";
			mysql_query($answer);
		}

		if (isset($_GET['search']) && !is_null($_GET['search'])) {
			$search = $_GET['search'];
			$sql = "SELECT * from question WHERE topic LIKE '%$search%' OR content LIKE '%$search%'";
		}
		else
			$sql = "SELECT * FROM question";
		
		$result = mysql_query($sql);
	?>

	<script type="text/javascript">
		function confirmDelete(id) {
			if (confirm("Are you sure you want to delete this question?") == true) {
				var xhttp = new XMLHttpRequest();
		        xhttp.onreadystatechange = function() {
		            if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("questionlist"+id).innerHTML = xhttp.responseText;
		            }
		        }
		        xhttp.open("POST", "./ajax/delete.php", true);
		        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		        xhttp.send("id=" + id);
			}
		}
	</script>

	<div class="question">
		<?php while ($row = mysql_fetch_assoc($result)) { ?>
			<div class="questionlist<?php echo $row['id']; ?>">
				<div class="question" id="votes">
					<?php echo $row['vote'] . " "; ?> <div>Vote(s)</div>
				</div>
				<div class="question" id="answers">
					<?php
						$answer_count_sql = "SELECT count(id) as c FROM answer WHERE question_id='".$row['id']."'";
						$answer_count = mysql_fetch_assoc(mysql_query($answer_count_sql));
						echo $answer_count['c'];
					?> <div>Answer(s)</div>
				</div>
				<div class="question" id="topic">
					<a href="answer.php?question_id=<?php echo $row['id']; ?>"><?php echo $row['topic'] . " "; ?></a>
				</div>
				<div class="question" id="content">
					<?php
						$content = $row['content'];
						if (strlen($content) > 100)
							echo substr($content, 0, 110) . '...';
						else
							echo $content;
					?>
				</div>
				<div class="question" id="asked_by">
					<?php echo "asked by "?>
					<font color="#0024ff">
						<?php echo $row['name'] . " "; ?>
					</font>
					| <a href="create.php?question_id=<?php echo $row['id']; ?>"><font color="ffdb00">edit</font></a> | 
					<a href="javascript:confirmDelete(<?php echo $row['id']; ?>)">
						<font color="#ff1a00">
							delete
						</font>
					</a>
				</div>
				<hr>
			</div>
		<?php } ?>
	</div>
	<?php mysql_close($conn); ?>
</body>
</html>