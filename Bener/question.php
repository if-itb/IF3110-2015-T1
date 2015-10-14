<!DOCTYPE html>
<html>
<head>
  	<title>Question</title>
  	<meta charset="UTF-8">

	<style>
	.title {
	    text-align: center;
	    font-size: 350%;
	    font-family:calibri;
	}
	#helping {
		text-align: center;
	    font-size: 100%;
	    font-family:calibri;
	}
	#faq {
		text-align: left;
		font-size: 100%;
		font-family:calibri;
		margin-left: 17.5%;
	}
	form{
		text-align: center;
	    font-size: 100%;
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
	#ask{
		text-decoration: none;
		color: rgb(255,215,0);
	}
	.column-one{
		margin-left:17.5%;
		width: 7.5%;
		color:black;
		text-align: center;
		float:left;
	}
	.column-two{
		width: 7.5%;
		color:black;
		text-align: center;
		float:left;
	}
	.column-three{
		margin-left:2.5%; 
		width: 30%;
		color:black;
		text-align: left;
		float:left;
	}
	.column-four{
		width: 17.5%;
		color:black;
		text-align: right;
		float:left;
	}

	
	</style>

</head>
<body>

<div class="title">Simple StackExchange</div>

<form>
  <input type="text" name="question">
  <input type="submit" value="Search">
</form>

<p id = "helping"> Cannot find what you are looking for? <a id = "ask" href="ask.php" ><font color="FFD700">Ask here</font></a></p>

<p id = "faq"> Recently Asked Questions <p>

<div class="line"> <hr> </div>



<?php include 'connect.php';?>

<?php
	$sql = "SELECT vote, topic, content, name FROM Question";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	echo "<div class=\"column-one\">" . $row["vote"] . "<br>" . " Votes" . "</div>";
	    	echo "<div class=\"column-two\">" . $row["vote"] . "<br>" . " Answers" . "</div>";
	    	echo "<div class=\"column-three\">" . $row["topic"] . "<br>" . $row["content"] . "</div>";
	    	echo "<div class=\"column-four\">" . $row["name"] . "<br>" . " Name" . "</div>";
	    	echo "<br>";
	    	echo "<br>";
	    	echo "<div class=\"line\"> <hr> </div>";

	    }
	} else {
	    echo "0 results";
	}
	?>



</body>
</html>





