<!DOCTYPE html>
<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/delete.js"></script>
	</head>

	<body>
		<a href="index.php"><h1>Simple StackExchange</h1></a>
		<form action="search.php" method="GET" name="search">
			<p align="center">
				<input type="text" name="search" class="search" placeholder="Search here..."></input>
				<input class="button" type="submit" value="Search" onclick="search.php">
			</p>
		</form>
		
		<h5>Cannot find what you are  looking for? <a href="ask.php"><span id="link">Ask here</span></a></h5>
		<h4>Recently Asked Questions</h4>
		
		<div class="garis"></div>
		<?php

			include 'dbact.php';

			$dislplay_question = getAllQuestion();
			$number = count($dislplay_question);
			if ($dislplay_question != NULL && $number!=0) {
				foreach ($dislplay_question as $q) {
					?>
					<table class="question">
						<tr>
							<td class="number">
								<?php
									echo $q['nvote'];
								?>
							</td>
							<td class="number">
								<?php
									echo $q['nAns'];
								?>
							</td>
							<td>
							</td>
							<td class="Topic">
								<a href="displayQuestion.php?id_q=+<?php echo $q['id_q'] ?>">
								<?php
									echo $q['Topic'];
								?>
								</a>
							</td>
							<td class="Date">
								<?php
									echo "Asked at ",$q['created_date'];
								?>
							</td>
						</tr>
						<tr>
							<td class="Text">
								<?php
									echo "Votes";
								?>
							</td>
							<td class="Text">
								<?php
									echo "Answers";
								?>
							</td>
							<td></td>
							<td class="Content">
								<?php
									echo $q['Content'];
								?>
							</td>
							<td class="Detail">
								<?php
									echo "Asked by ";
								?>
								<span class="name">
									<?php
									echo $q['Name'];
									?>
								</span>
								| 
								<a href="ask.php?id_q=+<?php echo $q['id_q'] ?>"><span class="edit">
								edit
								</span></a>
								|
								<a href="javascript:confirmDel(<?php echo $q['id_q'] ?>)"><span class="del">
								delete
								</span></a>
							</td>
						</tr>
					</table>
					<div class="garis"></div>
					<?php
				}
			} else echo "<h5>No Question Asked</h5>";

		?>
	</body>

	<script type="text/javascript">
	function confirmDel(id) {
	    if (confirm("Are you sure to delete this post?") == true) {
	        location.href = "delQuestion.php?id_q="+id;
    	}
	}
	</script>
</html>
