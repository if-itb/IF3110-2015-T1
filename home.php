<!DOCTYPE  html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
</head>

<body>
	<div class="pageheader">
		<h1>Simple StackExchange</h1>
		<br>
	</div>
	<div id="search">
	<form>
		<input id="searchbox" type="text" name="searchQuery"> <input id="submitbutton" type="submit" value="Search"> <br>
	</form>
</div>
	<p>Cannot find what you are looking for? <a href="inputquestion.php">Ask here</a></p>
	<br>
	<h3>Recently Asked Question</h3>
	<div class='questionlist'>
		<hr>
		<?php
			include('ConnectDatabase.php');

			$sql = "SELECT ID, Vote, Name, Email, Topic, Content FROM Questions";
			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)) 
    		{
        		echo "<div class='questionlist'>".$row["Vote"]."     "."2"."    ".$row["Topic"]."</div>"."<br>";
    		}

			mysqli_close($conn);
		?> 
	</div>
</body>

</html>