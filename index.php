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
			$maxdispcontentlength=300;
			if (strlen($q['Content'])>$maxdispcontentlength){
				$dispcontent=substr($q['Content'],0,$maxdispcontentlength)."...";
			}else{
				$dispcontent=$q['Content'];
			}
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
						<p>$dispcontent</p>
						<div class = 'footer afooter'> asked by <span class='authornamedisp'>".$q['AuthorName']."</span> | <a href='editQuestion.php?qid=".$q['qid']."' class= 'editlink'>edit</a> | <a href='deleteQuestion.php?qid=".$q['qid']."' class= 'deletelink' onclick=\"return confirm('Are you sure?')\">delete</a></div>
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
		
		echo "<ul class='questionlist'>";
		if ($displayedQuestions!=NULL)
		for ($i=0;$i<count($displayedQuestions);$i++){
			echo "<li>";
			echo qToHtml($displayedQuestions[$i]);
			echo "</li>";
		}
		else echo "no questions";
		echo "</ul>";
	?>
</body>	



</html>
