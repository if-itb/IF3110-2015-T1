<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  	<link rel="stylesheet" href="home.css">
</head>
<body>
	<h1 > Simple StackExchange</h1>
	<br><br>

	<form action="aswer.php" class ="input"> 
	<div class="search">
		<input class="search-bar" type="text" name="cari" value="" >
		<input class="submit-button" type="submit" value="Submit">
	</div>
	</form>

	<p class="state1"> Cannot find what are you are looking for ?<a href="ask.php" > Ask here </a> </p>
	<br>
	<p class="state2"> Recently Asked Questions</p>

	<hr>
	<div class="pertanyaan">
		<div class="vote">
			<span>0</span><br>
			<span>Vote</span>
		</div>
		<div class="answer-number">
			<span>0</span><br>
			<span>Answer</span>
		</div>
		<div class="topic-question">
			<p> The questions topic goes here</p>
		</div>
		<div class="id-question">
			<p> asked by <span class="name"> name </span> | <span class="edit"> <a href="ask.php"> edit </a> </span> | <span class="delete"> <a href="ask.php"> delete </a> </span> </p>
		</div>
	</div>

	
</body>
</html>