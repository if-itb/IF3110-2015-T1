<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
        <link rel="stylesheet" href="style.css" >
        <script type="text/javascript" src="script.js"></script>
	</head>

	<body>
        <a href="list.php"><h1>Simple StackExchange</h1></a>
		<h3>What's Your Question?</h3>
		<div class="board">	
			<form action="question_insert.php" onsubmit="return validateForm()" method="post" name="form" >
				<br>
				<input type="text" placeholder="Name" name="name" class="box">
				<br>
				<br>
				<input type="text" placeholder="Email" name="email" class="box">
				<br>
				<br>
				<input type="text" placeholder="Topic" name="topic" class="box">
				<br>
				<br>
				<textarea placeholder="Content" name="content" class="box" rows="5" cols="22"></textarea>
				<br>
				<button type="submit" class="posisipost">Post </button>
			</form>
		</div> 
	</body>	
</html>
