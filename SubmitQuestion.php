<html>
	<head>
		<title>Submit Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php
			//check whether there are post parameters
			if (!(isset($_POST['Name'])&&isset($_POST['Email'])&&isset($_POST['QuestionTopic'])&&isset($_POST['Content']))){
				echo '<h2>Something is wrong</h2>';
				header("Location: QuestionForm.html");
				exit();
			}

			include 'dbmgr.php';

			//main program
			echo '<h1>Submitting...</h1>';
			echo '<h2>got data:</h2>';
			echo '<p> Name:'.$_POST['Name'];
			echo '<p> Email:'.$_POST['Email'];
			echo '<p> Question Topic:'.$_POST['QuestionTopic'];
			echo '<p> Content:'.$_POST['Content'];



			$qid=submitQuestion($_POST['Name'],$_POST['Email'],$_POST['QuestionTopic'],$_POST['Content']);
			echo 'qid = '.$qid;
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

