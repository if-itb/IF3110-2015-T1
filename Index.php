<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<script type="text/javascript" src = "ConfirmDel.js"></script>
	</head>
	<body>
		<div class = "titlefont">
			<div class="textcentering">
				<h1>Simple Stack Exchange</h1>
			</div>
		</div>
		<form action="Submit.php" method="post">
			<div class="search">
				<input type="text" name="name"  class="form-textfield"></input>
				<input type="submit" value="Search">
			</div>
		</form>
		<div class ="textcentering">
			Cannot find what you are looking for? <a id=orange href="QuestionForm.php" id=linkstyle1>Ask here</a>
		</div>		
		<div class = "titlefont">
			<h2>Recently Asked Questions</h2>
		</div>
		<hr>
		<?php
			include 'qDBFunct.php';
			include 'aDBFunct.php';
			$Questions = getAllQuestionOrderByDate();
			if($Questions != null){
				foreach($Questions as $Question){
					$qid=$Question['qid'];
					$Answers = getAllAnswerOrderByVote($qid);
					$nAns = count($Answers)-1;
			
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
								<h1>'.$nAns.'</h1><h2>Answers</h2>
							</div>
						</div>
					</div>
					<div class="compactbox">
						<div class="topicidxstyle">
							<a id = black href="DisplayQuestion.php?qid='.$qid.'">'. $Question['qTopic'].'</a>
						</div>
					</div>
					<div class="choicebox">
						Asked by<a id=blue> '.$Question['qName'].'</a> | <a id=orange href="QuestionForm.php?qid='.$qid.'">edit</a> | <a id=red href="DeleteQuestion.php?qid='.$qid.'" onclick ="return confirmDeletion('.$qid.')">delete</a> </div>
					</div>
					<hr>';
				}
			}
		?>	
	</body>
</html> 