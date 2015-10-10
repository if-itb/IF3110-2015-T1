<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/index.css">
	<title >Simple StackExchange</title>
	<script>
		function validateSearch(){
			var SearchInput = document.forms["SearchBar"]["SearchInput"].value;
			var DefaultRegex = /[^ \t]/i;
			var DefaultTest = DefaultRegex.test(SearchInput);
			if(!DefaultTest){
				alert("Search key must be filled");
				return false;
			}
		}
	</script>
</head>
<body>
	<div id="TopDiv">
		<h1 id="MainTitle">Simple StackExchange</h1> 
		<br>
		<form id="SearchBar" action="" onsubmit="return validateSearch()">
			<input id="SearchInput" type="text" name="SearchInput" placeholder="Search here...">&nbsp
			<input id="SearchButton" type="submit" value="Search">
		</form> 
		<h4 id="find">Cannot find what you are looking for? &nbsp <a href="ask.php" id="AskHere">Ask here</a></h4>
		<br>
	</div>
	<div id="BottomDiv">
		<h3 id="RAQ">Recently Asked Question</h3>
		<hr>
	</div>
	<?php
		// try to connect to database
		$link = mysqli_connect("localhost","root","","stack_exchange");
		
		if(!$link){
			die("Error: Unable to connect to database\n");
		}
		else{
			$query = "SELECT COUNT(question_id) FROM question";
			$query_result = mysqli_query($link,$query);
			$num_question = mysqli_fetch_assoc($query_result);

			if(!$num_question)
				echo "<h5>No question has been asked yet</h5>";
			else{
				$query = "SELECT * FROM question ORDER by question_id DESC";
				$query_result = mysqli_query($link, $query);
				while($row = mysqli_fetch_row($query_result)){
					echo	'<div id="QuestionList">
								<div id="votes">0<br>Votes</div>
								<div id="answers">0<br>Answers</div>
								<a href="" id="topic">'.$row[3].'</a>
								<a href="delete.php" id="delete">delete</a>
								<div class="char">|</div> <a href="ask.php" id="edit">edit</a>
								<div class="char">|</div> <div id="name">'.$row[1].'</div>								
								<div id="askedby">asked by</div>
							</div><br>
							<hr id="separator">';
				}
			}
		}
		mysqli_close($link);
	?>
</body>
</html>