<html>
<head>
	<title>Simple StackExchange</title>
<<!--	<link rel="stylesheet" type="text/css" href="SiteStyle.css"> -->
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

		if (isset($_GET['searchquery'])){
			$displayedQuestions=searchQuestions($_GET['searchquery']);
		}else{
			$displayedQuestions=getQuestions();
		}

		echo "<h2>Recently Asked Questions</h2>";
		
		if ($displayedQuestions!=NULL)
		for ($i=0;$i<count($displayedQuestions);$i++){
			echo "
				<div class='questionContainer'>
				<div class='votediv'>VOTECELL NOT IMPLEMENTED</div>
				<div class='anscountdiv'>ANSWER COUNT NOT IMPLEMENTED</div>
				<div class='postdiv'>
				<p><a href=displayQuestion.php?qid=".$displayedQuestions[$i]["qid"]." class='questionLink'>".$displayedQuestions[$i]["QuestionTopic"]."</a></p>
				<div class = 'footer afooter'> asked by <span class='authornamedisp'".$displayedQuestions[$i]["Authorname"]."</span> | <a href='editQuestion.php?qid=".$displayedQuestions[$i]['qid']."' class= 'editlink'>edit</a> | <a href='deleteQuestion.php?qid=".$displayedQuestions[$i]['qid']."' class= 'deletelink'>delete</a></div>
				</div>
				</div>
			";
		}
	?>
</body>	



</html>
