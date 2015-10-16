<!DOCTYPE html>
<html>

<head><title><?php echo $question["topic"]?></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>


<body>
<div class ='container'>
		<h1 class='center'>Simple StackExchange</h1>

		<div class='center'>
			<input type='text' class='searchbar'> <button>Search</button>
		</div>

		<div>&nbsp;</div>

		<h2><?php echo $question["topic"]?></h2>

			<div class='question'>
			<div class='row'>
				<div class='col-1'>
					<div class='arrow-up' onclick="upVoteQuestion(<?php echo $questionId; ?>)"></div>
					<b><p class='center' id='question<?php echo $questionId; ?>'><?php echo $question["votes"]?></p></b>
					<div class='arrow-down' onclick="downVoteQuestion(<?php echo $questionId; ?>)"></div>
				</div>
				
				<div class='col-8'>
					<p><?php echo $question['content']?></p>
					<p class='right'>
						asked by <span class='name'><?php echo $question["email"]?></span> at <?php echo $question["time"]?> | 
						<a href='#' onclick="editQuestion(<?php echo $questionId; ?>)">edit</a> | 
						<a href='#' onclick="deleteQuestion(<?php echo $questionId; ?>)">delete</a>
					</p>
				</div>
			</div>
			</div>
		
		<h2><?php echo sizeof($answers)?> Answers</h2>
		<?php foreach($answers as $answer):?>
			<div class='answer'>
				<div class='row'>
					<div class='col-1'>
						<div class='arrow-up' onclick="upVoteAnswer(<?php echo $answer["answerId"]; ?>)"></div>
						<b><p class='center' id='answer<?php echo $answer["answerId"]; ?>'><?php echo $answer["votes"]?></p></b>
						<div class='arrow-down' onclick="downVoteAnswer(<?php echo $answer["answerId"]; ?>)"></div>
					</div>
					<div class='col-8'>
					<p><?php echo $answer["content"]?></p>
						<p class='right'>
						answered by <span class='name'><?php echo $answer["email"] ?></span> at <?php echo $answer["time"]?>
						</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		
		<hr>

		<h1>Your Answer</h1>
		<form name='answerForm' action="tools/answer/addanswer.php" 
		  method="post" onsubmit="return validateAnswerForm()">
			<input type="hidden" name="questionId" value="<?php echo $questionId;?>">
			<input type='text' name='answerer' class='formInput' placeholder='Name'>
			<input type='text' name='email' class='formInput' placeholder='Email'>
			<textarea name='content' class='formInput' placeholder='Content' rows='10'></textarea>
			<div class='right'><button type='submit'>Post</button></div>
		</form>
	</div>
	<script type='text/javascript' src='/assets/js/validate.js'></script>
	<script type='text/javascript' src='/assets/js/question.js'></script>
	<script type='text/javascript' src='/assets/js/answer.js'></script>
</body>
</html>