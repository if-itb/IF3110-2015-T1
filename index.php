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
		<p align="center"><input type="text" name="search" class="search" ></input>
		<input class="button" type="button" value="Search"></p>
		
		<h5>Cannot find what you are  looking for? <a href="ask.php"><span id="link">Ask here</span></a></h5>
		<h4>Recently Asked Questions</h4>
		
		<div class="garis"></div>
		<?php

			include 'dbact.php';

			$dislplay_question = getAllQuestion();

			if ($dislplay_question != NULL) {
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
								<?php
									echo $q['Topic'];
								?>
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
								<span class="edit">
								edit
								</span>
								|
								<span class="del">
								delete
								</span>
							</td>
						</tr>
					</table>
					<div class="garis"></div>
					<?php
				}
			} else echo "<h5>No Question Asked</h5>";

		?>
	</body>
</html>
