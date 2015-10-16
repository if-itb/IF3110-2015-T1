<html>
	<head>
		<title>Submit Answer - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php
			//check whether there are post parameters
			if (!(isset($_POST['Name'])&&isset($_POST['Email'])&&isset($_POST['Content'])&&isset($_POST['qid']))){
				echo '<h2>Something is wrong</h2>';
				header("Location: displayQuestion.php?qid=".$_POST['qid']);
				exit();
			}
			$qid=$_POST['qid'];

			include 'dbmgr.php';

			//main program
			echo '<h1>Submitting...</h1>';
			echo '<h2>got data:</h2>';
			echo '<p> Name:'.$_POST['Name'];
			echo '<p> Email:'.$_POST['Email'];
			echo '<p> QuestionTopic:'.$_POST['QuestionTopic'];
			echo '<p> Content:'.$_POST['Content'];
			echo '<p> qid:'.$qid;

			echo '<p>NOT IMPLEMENTED<p>';

			$qid=updateQuestion($qid,$_POST['Name'],$_POST['Email'],$_POST['QuestionTopic'],$_POST['Content']);
			if ($qid!=0){
				echo '<h2>you should be redirected soon</h2>';
				header("Location: displayQuestion.php?qid=".$qid); /* Redirect browser */
				exit();
			}else{
				echo '<h2> an error has occured </hd>';
			}
		?> 
	</body>
</html>

