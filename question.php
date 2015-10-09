
<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
	require_once('connection.php');
	$query = "SELECT * FROM question WHERE id=".$_GET['id'].";";
	$query2 = "SELECT * FROM answer WHERE qid=".$_GET['id'].";";
	$query3 = "SELECT COUNT(qid) AS answers FROM answer WHERE qid=".$_GET['id'].";";
	$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
	$rows = pg_fetch_all($rs);
	$rs = pg_query(Database::getInstance(), $query2) or die("Cannot execute query: $query\n");
	$rows2 = pg_fetch_all($rs);
	$rs = pg_query(Database::getInstance(), $query3) or die("Cannot execute query: $query\n"); 
	$id = pg_fetch_row($rs);
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html>
	<head>
	<title>My StackExchange</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<h1 id="title">My StackExchange</h1>
			<div class="content">
				<h2>'.$rows[0]['topic'].'</h2>
				<hr>
				<div class="stackquestion">
					<div class="votes"><div class="arrow-up"></div>0<div class="arrow-down"></div></div>
					<div class="content">'.$rows[0]['content'].'</div>
					<div class="detail">asked by <a class="linkname">'.$rows[0]['name'].'</a> at '.$rows[0]['date'].' | <a class="linkedit">edit</a> | <a class="linkdelete">delete</a></div>
				</div>
				<br>
				<h2>'.$id[0].' Answers</h2>
				<hr>';
				if ($id[0] > 0){	
				foreach($rows2 as $val){	
				echo '<div class="stackanswer">
					<br>
					<div class="votes"><div class="arrow-up"></div>'.$val['vote'].'<div class="arrow-down"></div></div>
					<div class="content">'.$val['content'].'</div>
					<div class="detail">answered by <a class="linkname">'.$val['name'].'</a> at '.$val['date'].'</div>
				</div>
				<br>
				<hr>';
				}
				}
			echo '</div>
			<div class="content question">
				<h2 class="title2">Your Answer</h2>
				<hr>
				<form action="answer.php?qid='.$_GET['id'].'" method="post">
				<input class="textbox" type="text", name="name", id="name" value="Name">
				<br>
				<input class="textbox" type="text", name="email", id="email" value="Email">
				<br>
				<textarea class="textarea", name="content", id="content" value="Content" >Content</textarea>
				<br>
				<input type="submit" id="post" value="Post">
				</form>	
			</div>	
		</div>
	</body>
	</html>';