		<div class="center">
			<form action="" method="POST">
				<input class="rectangle" type="search" name="search" placeholder="Search...">
				<input class="rectangle" type="submit" value="Search">
			</form>

			<p>Cannot find what you are looking for? <a href="ask-question.php" class="orange">Ask here</a></p>
		</div>
		<h3>Recently Asked Question</h3>
		<hr>
		<div class="question-list">

		<?php
			if (count($questions)){
				foreach ($questions as $question) {
					echo "<a href='question.php?id=" . $question['id'] . "' class='question-topic'>" . $question['topic'] . "</a>\n";
					echo "\t\t<table class='stats'>
			<tr class='stat-number'>
				<td>" . $question['vote'] . "</td>
				<td>"; 
					if ($question['COUNT(1)'] == ''){
						echo "0";
					} else{
						echo $question['COUNT(1)'];
					}
					echo "</td>
			</tr>
			<tr>
				<td>Votes</td>
				<td>Answers</td>
			</tr>
		</table>\n<br>";
					$detail = substr($question['question'], 0, 70);
					echo "\t\t<p class='question-detail'><i>" . $detail . "...</i></p>\n";
					echo "\t\t<p class='right'><b>asked by <a class='purple'>" . $question['name'] . "</a> | <a href='ask-question.php?id=" . $question['id'] . "' class='orange'>edit</a> | <a href='delete-question.php?id=" . $question['id'] . "' class='red' onclick=\"return confirm('Do you really want to submit the form?');\">delete</a></b></p>";
					echo "\n\t\t<br><hr>\n\n\t\t";
				}
			}
		?>
</div>

