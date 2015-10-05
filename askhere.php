<?php include("header.php"); ?>
		<br>
		<h1 class="tag">What's your question?</h1>
		<form class="form makeQuestion" method="post" action="index.php">
			<div class="innerForm">
				<input class="textForm" type="text" placeholder="Name" name="name">
			</div>
			<div class="innerForm">
				<input class="textForm" type="email" placeholder="Email" name="email">
			</div>
			<div class="innerForm">
				<input class="textForm" type="text" placeholder="Question Topic" name="topic" >
			</div>
			<div class="innerForm">
				<textarea class="textArea" name="content" placeholder="Content" ></textarea>
			</div>
			<div class="innerForm">
				<input class="submitButton" type="submit" placeholder="Post">
			</div>
		</form>

<?php include("footer.php"); ?>


<!--
//AskHere - input pertanyaan
	//brand
	-//#askForm

	//#askForm
		//askTag
		//textForm - name
		//textForm - email
		//textForm - topic
		//textForm - content
		//submitForm
-->