<?php

	function getQuestions(){
		$db = mysql_select_db("tubeswbd", $connect);

		$query = "SELECT * FROM question";
		$result = mysql_query($query, $connect);

		while($row = mysql_fetch_array($result, BOTH)){
			echo '<div class="question-container">';
				echo '<div class="votes">';
					echo '<p>'.$row['votes'].'</p>';
					echo '<p>Votes</p>';
				echo '</div>';

				/* get count answers*/
				$query = "SELECT id FROM answer WHERE id_question='$row['id']";
				$countAnswers = mysql_query($query);

				echo '<div class="answers">';
					echo '<p>.$countAnswers.</p>';
					echo '<p>Answers</p>';
				echo '</div>';

				echo '<div class="question">';
					echo '<h3>'.$row['topic'].'</h3>';
					echo '<p>'.$row['question'].'</p>';
				echo '</div>';

				echo '<div class="asked-by">';
					echo '<p>asked by <a href="#" class="name">name</a> | ';
						echo '<a href="#" class="edit">edit</a> | ';
						echo '<a href="#" class="delete">delete</a>';
					echo '</p>';
				echo '</div>';
		}

	}

?>