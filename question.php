<?php
	include("header.php");
?>
	<h1>Question Topic</h2>
	<div class="bottom-line"></div>
	<div>
		<div class="votesFunc col">
			<div>
				<span class="votes-up">Up</span>
			</div>
			<div>
				0
			</div>
			<div>
				<span class="votes-down">Down</span>
			</div>
		</div>
		<div class="questContent col">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
		<div class="navPost">
			<p>
				asked by Someone at | <a class="edit" href="#"> edit </a> | <a class="delete" href="#"> delete </a>
			</p>
		</div>
	</div>



	<h1>1 Answer</h1>
	<div class="question-answer">
		<div class="bottom-line"></div>
		<div class="votesFunc col">
			<div>
				<span class="votes-up">Up</span>
			</div>
			<div>
				0
			</div>
			<div>
				<span class="votes-down">Down</span>
			</div>
		</div>
		<div class="questContent col">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
		<div class="post-info">
			<p>
				answered by Someone at
			</p>
		</div>
		<div class="bottom-line"></div>
	</div>

	<div class="answer-form">
		<h1>Your Answer</h1>
		<form>
			<div class="form">
				<input class="formContent" type="text" name="name" placeholder="Name" size="139px">
			</div>
			<div class="form">
				<input class="formContent" type="text" name="email" placeholder="Email" size="139px">
			</div>
			<div class="textArea">
				<textarea class="formContent" name="content" placeholder="Contents" rows="10" cols="141"></textarea>
			</div>
				<input class="button" type="submit" value="Post">
		</form>
	</div>

<?php
	include("footer.php");
?>