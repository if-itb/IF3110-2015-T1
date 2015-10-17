<!DOCTYPE html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/delete_question.js"></script>
	<?php include('backend/all_questions.php');?>
</head>
<body>
	<a href="index.php"><h1>Simple StackExchange</h1></a><br>
	<div class="search">
		<form method="post">
			<input class="search_form" type="text" name="keyword">
			<button class="button">Search</button>
		</form><br>
		<div class="search_new">Cannot find what you are looking for? <a class="yellow" href="new.php">Ask here</a><br></div>
	</div>
	<br><br>
	<div class="list">
	<div class="title">Recently Asked Questions</div>
	<ul>
	<?php while($row = mysqli_fetch_array($result)) { ?>
		<hr></hr>
		<li>
			<table>
				<tbody>
					<tr>
						<td><div class="votes"><?php echo $row['votes'];?><br>Votes</div></td>
						<td><div class="count"><?php echo $row['count'];?><br>Answers</div></td>
						<td>
							<div class="content"><?php echo '<a href="question.php?id='.$row['id'].'">'.$row['topic'].'</a>';?></div><br>
							<div class="credential">asked by <div class="name"><?php echo $row['name'];?></div> | <?php echo '<a class="yellow" href="edit.php?id='.$row['id'].'">edit</a> | <a class="delete" href="javascript:confirmDelete('.$row['id'].')">delete</a>';?></div>
						</td>
					</tr>
				</tbody>
			</table>
		</li>
		<br>
	<?php 
	};?>
	</ul>
	</div>
</body>
<script src="js/delete_question.js"></script>