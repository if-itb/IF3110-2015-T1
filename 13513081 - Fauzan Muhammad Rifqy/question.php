<?php include("header.php"); ?>

		<h1 class="tag">Question Topic</h1>
		<div class="innerContent fQuestion">
			<div class="col votesCount">
				<div>
					<span class="up">Up</span>
				</div>
				<div>
					0
				</div>
				<div>
					<span class="down">Down</span>
				</div>
			</div>
			<div class="col content">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
			<div class="navPost2">
				<p>
					asked by Fauzan | <a class="link edit"href="#"> edit </a> | <a class="link delete" href="#"> delete </a>
				</p>
			</div>
		</div>


		<div class="containerAnswer">
			<h1 class="tag">4 Answer</h1>
			<?php include("answerDiv.php"); ?>
			<?php include("answerDiv.php"); ?>
			<?php include("answerDiv.php"); ?>
			<?php include("answerDiv.php"); ?>
		</div>

		<div id="answerForm">
			<h1 class="tag">Your Answer</h1>
			<form class="form makeQuestion">
				<div class="innerForm">
				<input class="textForm" type="text" value="Name" name="name" onclick="this.focus();this.select()">
			</div>
			<div class="innerForm">
				<input class="textForm" type="email" value="Email" name="email" onclick="this.focus();this.select()">
			</div>
			<div class="innerForm">
				<textarea class="textArea" name="content" onclick="this.focus();this.select()">Content</textarea>
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