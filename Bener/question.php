<!DOCTYPE html>
<html>
<head>
  	<title>List</title>
  	<meta charset="UTF-8">

	<style>
	#sse {
	    text-align: center;
	    font-size: 55px;
	}
	#helping {
		text-align: center;
	    font-size: 100%;
	}
	#faq {
		text-align: center;
		font-size: 100%;
	}
	form{
		text-align: center;
	    font-size: 100%;
	}
	#meow { 
	    display: block;
	    margin-top: 0.5em;
	    margin-bottom: 0.5em;
	    margin-left: 20em;
	    margin-right: auto;
	    color: #000000;
		background-color: #000000;
		height: 3px;
	} 
	#ask{
		text-decoration: none;
		color: rgb(255,215,0);
	}
	</style>
</head>
<body>

<h1 id = "sse">Simple StackExchange</h1>

<form>
  <input type="text" name="question">
  <input type="submit" value="Submit">
</form>

<p id = "helping"> Cannot find what you are looking for? <a id = "ask" href="ask.php" ><font color="FFD700">Ask here</font></a></p>

<br>

<p id = "faq"> Recently Asked Questions <p><br>

<hr id = "meow">

<?php include 'connect.php';?>



<?php
$sql = "SELECT vote, topic, name FROM Question";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	echo $row["vote"] . " votes";
    	echo ", " . $row["vote"] . " Answers";
    	echo ", " . $row["topic"] . " Topic";
    	echo ", " . $row["name"] . " Name";
    	echo "<br>";
    }
} else {
    echo "0 results";
}
?>



</body>
</html>





