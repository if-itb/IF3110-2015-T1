<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<script type="text/javascript" src = "Validate.js"></script>
	</head>
	<body>
		<div class = "titlefont">
			<div class="textcentering">
				<h1>Simple Stack Exchange</h1>
			</div>
		</div>
		<br>
		<hr>
		<?php
			include 'qDBFunct.php';
			include 'aDBFunct.php';
			$Questions = searchQuestion($_POST['searchQ']);
			if($Questions != null){
				foreach($Questions as $Question){
					$qid=$Question['qid'];
					$Answers = getAllAnswerOrderByVote($qid);
					$n = countAnswer($qid);
					$nAns = mysqli_fetch_assoc($n);
					echo '<br><div class="collection">
					<div class="compactbox">
						<div class="textcentering">
							<div class="voteansweridxstyle">
								<h1>'.$Question['qVote'].'</h1><h2>Vote</h2>
							</div>
						</div>
					</div>
					<div class="compactbox">
						<div class="textcentering">
							<div class="voteansweridxstyle">
								<h1>'.$nAns['count'].'</h1><h2>Answers</h2>
							</div>
						</div>
					</div>
					<div class="compactbox">
						<div class="topicidxstyle">
							<a id = black href="DisplayQuestion.php?qid='.$qid.'">'. $Question['qTopic'].'</a>
						</div>
					</div>
					<div class="choicebox">
						Asked by<a id=blue> '.$Question['qName'].'</a> | <a id=orange href="QuestionForm.php?qid='.$qid.'">edit</a> | <a id=red href="DeleteQuestion.php?qid='.$qid.'" onclick ="return confirmDeletion()">delete</a> </div>
					</div>
					<hr>';
				}
			}
		?>	
	</body>
</html> 