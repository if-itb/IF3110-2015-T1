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
					echo '<p>'.customEcho($row['content'], 200).'</p>';
				echo '</div>';

				echo '<div class="asked-by">';
					echo '<p>asked by <span class="name">'.$row['name'].'</span> | ';
						$editURL = "form-edit.php?id=".$row['id'];
						$deleteURL = "delete-question.php?id=".$row['id'];
						echo '<a href='.$editURL.' class="edit">edit</a> | ';
						echo '<a href='.$deleteURL.' onclick="return validateDelete()" class="delete">delete</a>';
					echo '</p>';
				echo '</div>';
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

	function getCountAnswers(){
		include ("connection.php");

		$db = mysql_select_db("tubeswbd", $connect);

		$query = sprintf("SELECT * FROM answer WHERE id_question = %d", mysql_escape_string($_GET['id']));
		$result = mysql_query($query, $connect);
		$numRow = mysql_num_rows($result);

		if($numRow != 0){
			$output = $numRow." Answers";

			echo '<div class="title">';
				echo '<h2>';
					echo $output;
				echo '</h2>';
			echo '</div>';
		}
	}

	function getAnswers(){
		include ("connection.php");

		$db = mysql_select_db("tubeswbd", $connect);
		
		$query = sprintf("SELECT * FROM answer WHERE id_question = %d", mysql_escape_string($_GET['id']));
		$result = mysql_query($query, $connect);

		while($row = mysql_fetch_array($result, MYSQL_BOTH)){
			echo '<div class="answer-container">';
				echo '<div class="vote-place">';
					echo '<img src="images/up-arrow.png" onclick=\'vote('.$row['id'].', "answer", "up")\' class="arrow-images">';
					echo '<h1>';
						$idAnswer = "answer-".$row['id'];
						echo '<span id='.$idAnswer.' >'.$row['votes'].'</span>';
					echo '</h1>';
					echo '<img src="images/down-arrow.png" onclick=\'vote('.$row['id'].', "answer", "down")\' class="arrow-images">';
				echo '</div>';
				
				echo '<div class="full-question">';
					echo '<p>'.$row['content'].'</p>';
				echo '</div>';
				echo '<div class="asked-by">';
					echo '<p>answered by <span class="name">'.$row['email'].'</span> at <span class="date">'.$row['date'].'</span></p>';
				echo '</div>';
			echo '</div>';
		}
	}

	function getValueFromQuestion(){
		include ("connection.php");

		$db = mysql_select_db("tubeswbd", $connect);
		
		$query = sprintf("SELECT * FROM question WHERE id = %d", mysql_escape_string($_GET['id']));
		$result = mysql_query($query, $connect);

		return mysql_fetch_array($result, MYSQL_BOTH);
	}

	function customEcho($var, $length){
		if(strlen($var) <= $length){
			echo $var;
		}
		else{
			$var = substr($var, 0, $length);
			$var = $var." .....";
			echo $var;
		}
	}


	function getSearchResult(){
		include ("connection.php");

		$db = mysql_select_db("tubeswbd", $connect);

		if(isset($_GET['search-button'])){
			$keyword = sprintf("%s",mysql_escape_string($_GET['keyword']));

			$query = "SELECT * FROM question WHERE topic LIKE '%$keyword%' OR content LIKE '%$keyword%'";

			$result = mysql_query($query, $connect);
			if(!$result){
				die('Invalid query: '.mysql_error());
			}
			else{
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
							echo '<p>'.customEcho($row['content'], 200).'</p>';
						echo '</div>';

						echo '<div class="asked-by">';
							echo '<p>asked by <span class="name">'.$row['name'].'</span> | ';
								$editURL = "form-edit.php?id=".$row['id'];
								$deleteURL = "delete-question.php?id=".$row['id'];
								echo '<a href='.$editURL.' class="edit">edit</a> | ';
								echo '<a href='.$deleteURL.' onclick="return validateDelete()" class="delete">delete</a>';
							echo '</p>';
						echo '</div>';
					echo '</div>';
				}
			}
		}

		mysql_close($connect);
	}
	

	

?>