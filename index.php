<html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" type="text/css" href="SiteStyle.css"> 
</head>

<body>
	<h1>Simple StackExchange</h1>
	<div class='search-container'>
		<form action="index.php" method="get">
			<input name="searchquery" type="text" value="<?php echo $_GET['searchquery'];?>">
			<input type="submit" value="Search">
		</form>
	</div>
	<div class='cannotfindthenask-container'>
		Cannot find what you are looking for? <a href="QuestionForm.html">Ask here</a>
	</div>
	<?php
		include 'dbmgr.php';

		function qToHtml($q){
			return "
			<div class='questionContainer'>
				<div class='votediv'>
				<p>".$q['vote']."</p>
				<p>Votes</p>
				</div>
				<div class='anscountdiv'>
				<p>".$q['anscount']."</p>
				<p>Answers</p>
				</div>
					<div class='postdiv'>
						<p><a href=displayQuestion.php?qid=".$q["qid"]." class='questionLink'>".$q["QuestionTopic"]."</a></p>
						<div class = 'footer afooter'> asked by <span class='authornamedisp'>".$q['AuthorName']."</span> | <a href='editQuestion.php?qid=".$q['qid']."' class= 'editlink'>edit</a> | <a href='deleteQuestion.php?qid=".$q['qid']."' class= 'deletelink'>delete</a></div>
						</div>
					</div>
			</div>
			";
		}

		if (isset($_GET['searchquery'])){
			$displayedQuestions=searchQuestions($_GET['searchquery']);
		}else{
			$displayedQuestions=getQuestionsAndAnswerCount();
		}

		echo "<h2>Recently Asked Questions</h2>";
		

		if ($displayedQuestions!=NULL)
		for ($i=0;$i<count($displayedQuestions);$i++){
			echo qToHtml($displayedQuestions[$i]);
		}
		else echo "no questions";
	?>
</body>	



</html>
