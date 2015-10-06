<div class="center">
	<form action="" method="POST">
		<input type="search" name="search" placeholder="Search...">
		<input type="submit" value="Search">
	</form>

	<p>Cannot find what you are looking for? <a href="ask-question.php" class="orange">Ask here</a></p>
</div>

<h3>Recently Asked Question</h3>
<hr>
<div class="question-list">
	<?php
		if (count($questions)){
			foreach ($questions as $question) {
				echo "<p class='question-topic'>" . $question['topic'] . "</p>\n";
				echo "<table class='stats'>\n
						\t<tr class='stat-number'>\n
							\t<td>" . $question['vote'] . "</td>\n
							\t<td>" . $answers[0]['COUNT(1)'] . "</td>\n
						\t</tr>\n
						\t<tr>\n
							\t\t<td>Votes</td>\n
							\t\t<td>Answers</td>\n
						\t</tr>\n
					</table>\n";

				echo "<p class='question-detail'>" . $question['question'] . "</p>\n";
				echo "\t<p class='right'><b>asked by <a class='purple'>" . $question['name'] . "</a> | <a href='ask-question.php?id=" . $question[id] . "' class='orange'>edit</a> | <a href='delete-question' class='red'>delete</a></b></p>";
				echo "<hr>";
			}
		}
	?>

	
	
</div>

