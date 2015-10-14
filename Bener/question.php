<!DOCTYPE html>
<html>
<head>
  	<title>Question</title>
  	<meta charset="UTF-8">

	<style>
	#sse {
	    text-align: center;
	    font-size: 55px;
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
		margin-left: 20em;
	}
	form{
		text-align: center;
	    font-size: 100%;
	    font-family:calibri;
	}
	#line { 
	    display: block;
	    margin-left: 20em;
	    color: #000000;
		background-color: #000000;
		height: 3px;
		font-family:calibri;
	} 
	#ask{
		text-decoration: none;
		color: rgb(255,215,0);
	}
	div.list {
		margin-left:20em;
		color:green;
	}
	</style>

</head>
<body>

<h1 id = "sse">Simple StackExchange</h1>

<form>
  <input type="text" name="question">
  <input type="submit" value="Search">
</form>

<p id = "helping"> Cannot find what you are looking for? <a id = "ask" href="ask.php" ><font color="FFD700">Ask here</font></a></p>

<br>

<p id = "faq"> Recently Asked Questions <p>

<hr id = "line">

<?php include 'connect.php';?>

<div class="list">
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
</div>

</body>
</html>





