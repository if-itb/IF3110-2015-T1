<?php include("header.php"); ?>

		<?php
			include("checkRequestA.php");
		?>

		<?php include("requestSingleQuestion.php") ?>
		<!-- div keluar dari include diatas karena ada penyimpanan jumlah answer -->
			<?php include("requestAnswers.php"); ?>
		</div>

		<div id="answerForm">
			<h1 class="tag">Your Answer</h1>
			<form class="form makeQuestion" action="question.php?id=<?php echo $_GET["id"] ?>" method="POST">
				<div class="innerForm">
					<input class="textForm" type="text" placeholder="Name" name="name">
				</div>
				<div class="innerForm">
					<input class="textForm" type="email" placeholder="Email" name="email">
				</div>
				<div class="innerForm">
					<textarea class="textArea" name="content" placeholder="Content"></textarea>
				</div>
				<div class="innerForm">
					<input class="submitButton" type="submit" value="Post">
				</div>
			</form>
		</div>
	
<?php include("footer.php"); ?>


<!--
//Question?id=Qno - laman untuk setiap pertanyaan
	//brand
	//topic
	-//#focusQuestionDiv
	//answerTag
	-//#focusAnswerDiv
	-//#answerForm

	//#answerForm
		//answerTag
		//textForm - name
		//textForm - email
		//textForm - content
		//submitForm

	//#focusQuestionDiv
		//Increase Votes button
		//Votes
		//Decrease Votes button
		//content
		//asked by
		//datetime
		//edit
		//delete

	//#focusAnswerDiv
		//Increase Votes button
		//Votes
		//Decrease Votes button
		//content
		//answered by
		//datetime
-->