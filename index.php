<!DOCTYPE HTML>
<html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<meta name="description" content="A Simple Web that help you find answers to your question">
	<meta name="author" content="Ghazwan Sihamudin M.">
</head>

<body>
	<div class="banner">
		<div class="container">
			<div class="head-title text-center">
				<h2>SIMPLE STACK EXCHANGE</h2>
			</div>
			<div class="search-form">
				<form id="searchbox">
                        <input name="search" size="150"
                        placeholder="Search"></textarea>
                       
                        <button type="submit" class="button">
                            Search</button>
				</form>
			</div>
			<div class="banner-bottom">
				<ul class="bottom-content">
					<li><span>Cannot find what you are looking for?</span></li>
					<li><a href="ask.html">Ask here</a></li>
					<div class="clearfix"> </div>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="content">
		<h2>Recently Asked Questions</h2>
		<div class="bottom-line"></div>
			
			<?php>
				$db_con = mysql_connect("localhost", "root");
				if (!$db_con){
					die('Could no connect: '.mysql_error());
				}
				mysql_select_db("stackexchange", $db_con);

				$result = mysql_query("SELECT vote FROM question_list");
				


				mysql_close($db_con);
			<?>	
			<div class="vote text-center">
				<p>0<br>vote</p>
			</div>
			<div class="answer text-center">
				<p>0<br>answer</p>
			</div>
			<div class="question">
				<p>The question topic goes here</p>
				<p>The question content goes here</p>
			</div>
			<div class="question-info">
		</div>
</body>
</html>
