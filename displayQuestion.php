<html>
	<head>
		<title>Display Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
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
		<div class="votediv">VOTECELL NOT IMPLEMENTED</div><!--//TODO buat vote cell-->
		<div class="postdiv">
		<p><?php echo $row["Content"]?></p>
		<div class = "footer qfooter"> asked by <?php echo $row["Email"];?> at <?php echo $row["created_at"] ?> </div>"; <!--//TODO edit dan delete-->
		</div>
		</div>
		<div class = "answerpart">
		<?php 
			$answers=getAnswers($qid);
			echo "<h2>".count($answers)." Answers</h2>";
			for ($i=0;$i<count($answers);$i++){
				echo "
					<div class='answerContainer'>
					<div class='votediv'>VOTECELL NOT IMPLEMENTED</div>
					<div class='postdiv'>
					<p>".$answers[$i]["Content"]."</p>
					<div class = 'footer afooter'> answered by ".$answers[$i]["Email"]." at ".$answers[$i]["created_at"]."</div>
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
					<script src="formValidate.js"></script>
					<input type="submit" value="Post" onclick="return validateForm()" action="submitAnswer.php">
				</div>
			</form>
		</div>
	</body>
</html>

