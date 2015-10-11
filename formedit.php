<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
        <link rel="stylesheet" href="style.css" >
        <script type="text/javascript" src="script_question.js"></script>
	</head>

	<body>
	
		<h1>Simple StackExchange</h1>
		<h3>What's Your Question?</h3>

		<div class="board">
			
		<!--<form action="question_update.php?no_question=<php echo $no_question ?>" onsubmit="return validateForm()" method="post" name="form" >
			<br>
			<input type="text" placeholder="Name" name="name" class="box" value="<php $name ?>">
			<br>
			<br>
			<input type="text" placeholder="Email" name="email" class="box" value="<php $email ?>">
			<br>
			<br>
			<input type="text" placeholder="Topic" name="topic" class="box" value="<php $topic ?>">
			<br>
			<br>
			<textarea placeholder="Content" name="content" class="box" rows="5" cols="22" value="<php $content ?>"></textarea>
			<br>
			<button type="submit" class="posisipost">Post </button> 
            
		</form> -->
            <?php include ("formedit_replace.php"); ?>
		</div>
        
        
	</body>	

</html>
