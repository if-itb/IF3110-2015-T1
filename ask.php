<!DOCTYPE html>
<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Simple StackExcahange | Ask</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/validate.js"></script>
	</head>

	<body>
		<a href="index.php"><h1>Simple StackExchange</h1></a>
		<h2>What's your question?</h2>
		<div class="garis"></div>
		<form action="addQuestion.php" method="post" name="ask-form">
			<input type="text" name="Name" class="form-field" placeholder="Name"></input>
			<br>
			<input type="text" name="Email" class="form-field" id="Email" placeholder="Email"></input>
			<br>
			<input type="text" name="Topic" class="form-field" placeholder="Question Topic"></input>
			<br>
			<textarea name="Content" placeholder="Content" class="form-textarea"></textarea>
			<br>
			<div align="right">
				<input type="submit" value="Post" onclick="return validateForm()" action="addQuestion.php">
			</div>
		</form>
	
	</body>
</html> 
