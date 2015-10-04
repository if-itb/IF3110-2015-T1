<?php include("header.php"); ?>
		<br>
		<h1 class="tag">What's your question?</h1>
		<form class="form makeQuestion">
			<div class="innerForm">
				<input class="textForm" type="text" value="Name" name="name" onclick="this.focus();this.select()">
			</div>
			<div class="innerForm">
				<input class="textForm" type="email" value="Email" name="email" onclick="this.focus();this.select()">
			</div>
			<div class="innerForm">
				<input class="textForm" type="text" value="Question Topic" name="qTopic" onclick="this.focus();this.select()">
			</div>
			<div class="innerForm">
				<textarea class="textArea" name="content" onclick="this.focus();this.select()">Content</textarea>
			</div>
			<div class="innerForm">
				<input class="submitButton" type="submit" value="Post">
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