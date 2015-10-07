<?php

	function getQuestions(){
		include ("connection.php");
		$db = mysql_select_db("tubeswbd", $connect);

		$query = "SELECT * FROM question";
		$result = mysql_query($query, $connect);

		while($row = mysql_fetch_array($result, MYSQL_BOTH)){
			echo '<div class="question-container">';
				/* votes */
				echo '<div class="votes">';
					echo '<p>'.$row['votes'].'</p>';
					echo '<p>Votes</p>';
				echo '</div>';

				/* get count answers*/
				$query = sprintf("SELECT * FROM answer WHERE id_question = %d",mysql_escape_string($row['id']));
				$res = mysql_query($query, $connect);
				$countAnswers = mysql_num_rows($res);

				echo '<div class="answers">';
					echo '<p>'.$countAnswers.'</p>';
					echo '<p>Answers</p>';
				echo '</div>';

				echo '<div class="question">';
					echo '<h3><a href="question.php?id='.$row['id'].'">'.$row['topic'].'</a></h3>';
					echo '<p>'.$row['content'].'</p>';
				echo '</div>';

				echo '<div class="asked-by">';
					echo '<p>asked by <span class="name">'.$row['name'].'</span> | ';
						echo '<a href="#" class="edit">edit</a> | ';
						echo '<a href="#" class="delete">delete</a>';
					echo '</p>';
				echo '</div>';
		}

	}

	function getQuestionByParam($temp){
		include ("connection.php");

		$db = mysql_select_db("tubeswbd", $connect);

		$query = sprintf("SELECT %s FROM question WHERE id = %d",mysql_escape_string($temp), mysql_escape_string($_GET['id']));
		$result = mysql_query($query, $connect);
		$row = mysql_fetch_array($result, MYSQL_BOTH);

		echo $row[0];
	}

?>