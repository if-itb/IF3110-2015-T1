<!DOCTYPE html>
<html>
<head>
  	<title>Create</title>
  	<meta charset="UTF-8">

	<style>
	.title {
	    text-align: center;
	    font-size: 350%;
	    font-family:calibri;
	}
	.subtitle {
		margin-left:17.5%;
		text-align: left;
	    font-size: 250%;
	    font-family:calibri;
	}
	.line { 
	    margin-left:17.5%;
	    margin-right: 17.5%;
	    color: #000000;
		background-color: #000000;
		height: 3px;
		font-family:calibri;
	} 
	.column-one{
		margin-left:17.5%;
		width: 7.5%;
		color:black;
		text-align: center;
		float:left;
	}
	.column-two{
		margin-left:none; 
		width: 57.5%;
		color:black;
		text-align: left;
		float:left;
	}
	.row-bottom{
		margin-left:none; 
		margin-right:17.5%;
		width: 65%;
		color:black;
		text-align: right;
		float:right;
	}



	</style>
</head>
<body>

<?php include 'connect.php';?>


<div class="title">Simple StackExchange</div>
<br>

<?php
	$sql = "SELECT vote, topic, content, email FROM Question WHERE question_id = 35";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	echo "<div class=\"subtitle\">" . $row["topic"] . "</div>";
	echo "<div class=\"line\"> <hr> </div>";
	echo "<div class=\"column-one\">" . $row["vote"] . "<br>" . " Votes" . "</div>";
	echo "<div class=\"column-two\">" . $row["content"] . "</div>";
	echo "<div class=\"row-bottom\">" . "asked by " . $row["email"] . " at " . "7/10/1996 08.00" . " | " . "edit" . " | " . "delete" . "</div>";
?>



<br>
<br>
<br>
<br>
<br>
<br>
<div class="line"> <hr> </div>
<br>

<form name="askForm" action="anspost.php" method="post">
	<input type="text" name="name" placeholder="Name" size="100"><br>
	<input type="text" name="email" placeholder="Email" size="100"><br>
	<textarea name="content" rows="5" cols="40" placeholder="Content"></textarea><br>
	<input type="submit" value="Post">
</form>



</body>
</html>
