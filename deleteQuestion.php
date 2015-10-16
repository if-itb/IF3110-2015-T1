<html>
	<head>
		<title>Delete Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php
			//check whether there are post parameters
			if (!isset($_GET['qid'])|| !is_numeric($_GET['qid'])){
				echo '<h2>Something is wrong</h2>';
				if (isset($_SERVER["HTTP_REFERER"])) {
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				}
				exit();
			}

			include 'dbmgr.php';

			//main program
			echo '<h1>Deleting...</h1>';
			echo '<h2>got data:</h2>';
			echo '<p> qid:'.$_GET['qid'];

			$result=deleteQuestion($_GET['qid']);
			
			if ($result){
				echo '<h2>you should be redirected soon</h2>';
				header("Location: index.php"); /* Redirect browser */
				exit();
			}else{
				echo '<h2> an error has occured </h2>';
			}
		?> 
	</body>
</html>

