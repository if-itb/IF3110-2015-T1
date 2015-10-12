<!DOCTYPE HTML>
<html>
	<head>
		<title>Stack Exchange</title>
	    <link rel="stylesheet" type="text/css" href="../css/question.css">
	  	</head>
	<body>
		<div class="container">
			<h1 class="align-center margin-bot">Simple StackExchange</h1>
		  	<h2>What's Your Question?</h2>
		  	<?php		
				echo'
				  <hr>
					<form name="addQuestion">
						<input type="text" class="form" placeholder="Name" name="Name">
						<input type="text" class="form" placeholder="Email" name="Email"> 
				 		<input type="text" class="form" placeholder="Question Topic" name="Topic">
				  		<textarea class="form" placeholder="Content" rows="5" name="Content"></textarea>
					  	<div class="align-right">
							<button type="submit">Post</button>
					  	</div>
					</form>
				';
			?>
		</div>	
	</body>
</html>