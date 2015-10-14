<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
	require_once('connection.php');
	$query = "SELECT * FROM question"; 
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
	$rows = pg_fetch_all($rs);
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
					<html>
					<head>
					<title>My StackExchange</title>
					<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
					<link rel="stylesheet" type="text/css" href="css/style.css">
					</head>
					<body>
						<div class="container">
							<a class="homelink" href="http://mystackexchange.dev"><h1 id="title">My StackExchange</h1></a>
							<div class="search">
								<form action="search.php" method="post">
									<input type="text" id="searchbar" name="searchbar">
									<input type="submit" id="searchsubmit" value="Search">
								</form>
								<br>
								Can\'t find what you are looking for? <a href="ask.html">Ask here!</a>
							</div>
							<div class="content">
								<h2>Recently Asked Questions</h2>
								<hr>';
								if (count($rows) > 0){
								foreach ($rows as $val) {
									$query = "SELECT COUNT(qid) AS answers FROM answer WHERE qid=".$val['id'].";";
									$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
									$id = pg_fetch_row($rs);
									echo '<div class="stack">
									<div class="votes"><div>'.$val['vote'].'</div>Votes</div>
									<div class="answers"><div>'.$id[0].'</div>Answers</div>
									<div class="questiontitle"><a href="question.php?id='.$val['id'].'">'.$val['topic'].'</a></div>
									<div class="detail">asked by <a class="linkname">'.$val['name'].' ('.$val['email'].')</a> | <a class="linkedit" href="editpost.php?id='.$val['id'].'">edit</a> | <a class="linkdelete" onclick="return validatedelete()" href="deletepost.php?id='.$val['id'].'">delete</a></div>
									<hr>
								</div>';}
								}
							echo '</div>	
						</div>
						<script src="js/script.js"></script>
					</body>
					</html>';
?>
