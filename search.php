<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/index.css">
	<script src="stack_exchange.js"></script>
	<title >Simple StackExchange</title>
	
</head>
<body>
	<div id="TopDiv">
		<h1 id="MainTitle">Simple StackExchange</h1> 
		<br>
		<form id="SearchBar" action="search.php" onsubmit="return validateSearch()" method="post">
			<input id="SearchInput" type="text" name="SearchInput" placeholder="Search here...">&nbsp
			<input id="SearchButton" type="submit" value="Search">
		</form> 
		<h4 id="find">Cannot find what you are looking for? &nbsp <a href="ask.html" id="AskHere">Ask here</a></h4>
		<br>
	</div>
	<?php
		// try to connect to database
		$link = mysqli_connect("localhost","root","","stack_exchange");
		
		if(!$link){
			die("Error: Unable to connect to database\n");
		}
		else{
			$keyword = mysqli_real_escape_string($link,$_POST["SearchInput"]);
			echo	'<div id="BottomDiv">
						<h3 id="RAQ">Search: '.$keyword.'</h3>
						<hr>
					</div>';
			$query = "SELECT * FROM question WHERE topic LIKE '%".$keyword."%' OR content LIKE '%".$keyword."%' ORDER by question_id DESC";
			$query_result = mysqli_query($link, $query);
			
			if(!mysqli_num_rows($query_result))
				echo '<div id="noresult">No results found</div>';
			
			while($row = mysqli_fetch_row($query_result)){
				//truncate question content
				if(strlen($row[4]) > 60){
					$row[4]= substr($row[4],0,60).'...';
				}
				// print question list
				echo	'<div id="QuestionList">
							<div id="votes">'.$row[5].'<br>Votes</div>
							<div id="answers">'.$row[6].'<br>Answers</div>
							<div id="SubDiv">
								<a id="topic" href="question.php?id='.$row[0].'" >'.$row[3].'</a><br>
								<p id="content">'.$row[4].'</p>
							</div>
							<a href="delete.php?id='.$row[0].'" id="delete" onclick="return confirmDelete()">delete</a>
							<div class="char">|</div> <a href="edit.php?id='.$row[0].'" id="edit">edit</a>
							<div class="char">|</div> <div id="name">'.$row[1].'</div>								
							<div id="askedby">asked by</div>
						</div><br>
						<hr id="separator">';
			}
		}
		mysqli_close($link);
	?>
	<br>
</body>
</html>