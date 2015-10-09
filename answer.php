<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<link rel="stylesheet" href="answer.css">
</head>
<body>
	<h1 align="Middle"> Simple StackExchange</h1>
	<br><br>
	<h2 class="question">The Questions Topic Goes Here</h2>
	<hr>

	<div class="question">
		<div class="question-vote">
			<div class="question-vote-up">
				<p>X</p>
			</div>
			<div class="question-vote-number">
				<p>0</p>
			</div>
			<div class="-question-vote-down">
				<p>X</p>
			</div>
		</div>
		<div class="question-content">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	
		</div>
		<br>
		<div class="question-identity">
			<p> asked by .............</p>
		</div>
	</div>

	<br>
	<h2 class="answer"> X Answer</h2>

	<div class="answer">
		<hr>
		<div class="answer-vote">
			<div class="answer-vote-up">
				<p>X</p>
			</div>
			<div class="answer-vote-number">
				<p>0</p>
			</div>
			<div class="answer-vote-down">
				<p>X</p>
			</div>
		</div>
		<div class="answer-content">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	
		</div>
		<br>
		<div class="amswe-identity">
			<p> answered by .............</p>
		</div>
	</div>
	
	<hr>
	<h2 class="answer-form">Your Answer</h2>
	<div class="answer-form">
		<form action="ask.php">
			<input class="name" type="text" name="nama" value="" placeholder="Name"> <br>
			<input class="email" type="text"  name="email" value"" placeholder="Email"> <br>
			<textarea class="content" type="text" name="konten" value"" placeholder="Content"> </textarea><br>
			<input class="submit-button" type="submit" value="Post">
		</form>		
	</div>
	


</body>
</html>