<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="../css/question.css">
    <script type = "text/javascript" src="../js/validatequestion.js"> </script>
  </head>
  <body>
		<div class="container">
		  <h1 class="align-center margin-bot"><a class="text-link" href="index.php"><black>Simple StackExchange</black></a></h1>
		  <h2>What's Your Question?</h2>
		  	<?php
			echo'
			  <hr>
				<form name="addQuestion" action="data-question.php" onsubmit="return validateForm()" method = "Post">
				  <input type="text" class="form" placeholder="Name" name="Name">
				  <input type="text" class="form" placeholder="Email" name="Email"> 
				  <input type="text" class="form" placeholder="Question Topic" name="Topic">
				  <textarea class="form" placeholder="Content" rows="5" name="Content"></textarea>
				  <div class="align-right">
					<button class="button">Post</Button>
				  </div>
				</form>';
			?>
	</div>	
  </body>
</html>