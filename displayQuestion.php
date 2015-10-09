<html>
	<head>
		<title>Display Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
		<script src="formValidate.js"></script>
		<script src="vote.js"></script>
	</head>
	<body>
		<?php
			$qid=$_GET["qid"];
			if (!isset($qid) || !is_numeric($qid)){
				echo '<h2>Something is wrong</h2>';
				exit();
			}
			if ($qid<1){
				echo '<h2>Something is wrong</h2>';
				exit();
			}
			
			include "dbmgr.php";
			$row=getQuestion($qid);
		?>

		<h1>Simple StackExchange</h1>
		<div class="questionpart">
		<h2><?php echo $row["QuestionTopic"];?></h2>
		<div class='votediv'>
			<a href="javascript:void(0)" onclick="upVoteQuestion(<?php echo $qid.', \'q'.$qid ?>')" class='vote-up-off' title='This question shows research effort; it is useful and clear'>up vote</a>
			<div itemprop='upvoteCount' class='vote-count-post' id="q<?php echo $row['qid']?>"><?php echo $row['vote']?></div>
			<a href="javascript:void(0)" onclick="downVoteQuestion(<?php echo $qid.', \'q'.$qid ?>')" class='vote-down-off' title='This question does not show any research effort; it is unclear or not useful'>down vote</a>
		</div>
		<div class="postdiv">
		<p><?php echo $row["Content"]?></p>
		<div class = "footer qfooter"> asked by <?php echo $row["Email"];?> at <?php echo $row["created_at"] ?> | <a href="editQuestion.php?qid=<?php echo $qid ?>" class= "editlink">edit</a> | <a href="deleteQuestion.php?qid=<?php echo $qid ?>" class= "deletelink">delete</a></div>
		</div>
		</div>
		<div class = "answerpart">
		<?php 
			$answers=getAnswers($qid);
			echo "<h2>".count($answers)." Answers</h2>";
			for ($i=0;$i<count($answers);$i++){
				echo "
					<div class='answerContainer'>
					<div class='votediv'>
						<a href='javascript:void(0)' onclick='upVoteAnswer(".$answers[$i]['qid'].",".$answers[$i]['aid'].", \"a".$answers[$i]['aid']."\")' class='vote-up-off' title='This question shows research effort; it is useful and clear'>up vote</a>
						<div itemprop='upvoteCount' class='vote-count-post' id='a".$answers[$i]['aid']."'>".$answers[$i]['vote']."</div>
						<a href='javascript:void(0)' onclick='downVoteAnswer(".$answers[$i]['qid'].",".$answers[$i]['aid'].", \"a".$answers[$i]['aid']."\")' class='vote-down-off' title='This question does not show any research effort; it is unclear or not useful'>down vote</a>
					</div>

					<div class='postdiv'>
					<p>".$answers[$i]["Content"]."</p>
					<div class = 'footer afooter'> answered by ".$answers[$i]["Email"]." at ".$answers[$i]["created_at"]."| <a href='editAnswer.php?qid=$qid&aid=$aid' class= 'editlink'>edit</a> | <a href='deleteAnswer.php?qid=$qid&aid=$aid' class= 'deletelink'>delete</a></div>
					</div>
					</div>
				";
			}				
		?>
		</div>
		<div class="answerFormContainer">
			<h2>Your Answer</h2>
			<form action="submitAnswer.php" method="post">
				<input type="hidden" name="qid" value="<?php echo $qid;?>">
				<div class="answer-form-input">
					<input type="text" name="Name" placeholder="Name" class = "requiredInput">
				</div>
				<div class="answer-form-input">
					<input type="text" name="Email" placeholder="Email"  class = "requiredInput emailInput">
				</div>
				<div class="answer-form-input">
					<textarea name="Content" placeholder="Content" class = "requiredInput"></textarea>
				</div>
				<div class="answer-form-input">
					<input type="submit" value="Post" onclick="return validateForm()" action="submitAnswer.php">
				</div>
			</form>
		</div>
	</body>
</html>

