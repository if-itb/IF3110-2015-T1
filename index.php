<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<center><h1><a href="index.php">Simple StackExchange</a></h1></center>
	</div>
	<div class="content">
		<center><form action="search.php" method="post">
			<input type="text" name="search" size="100" style="height:25px">
			<button type="submit" style="display: inline-block; height:30px">Search</button>
		</form>
		Cannot find what you're looking for? Ask <a href="form.php?idx=1" style="color: #FF8000;">here</a>.
		</center>

		<h2>Recently Asked Questions</h2>
		<?php
			include "function/database.php";
			$conn = connect_database();
			$sql = "SELECT * FROM `question` ORDER BY date_created DESC";
			$result = mysqli_query($conn,$sql);
			show_question($conn, $result);

			mysqli_close($conn);
		?>
	</div>

</body>
</html>