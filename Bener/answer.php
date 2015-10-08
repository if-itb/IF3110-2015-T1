<!DOCTYPE html>
<html>
<head>
  	<title>Create</title>
  	<meta charset="UTF-8">

	<style>
	h1 {
	    text-align: center;
	    font-size: 55px;
	}
	p {
		text-align: center;
	    font-size: 200%;
	}
	hr { 
	    display: block;
	    margin-top: 0.5em;
	    margin-bottom: 0.5em;
	    margin-left: auto;
	    margin-right: auto;
	    color: #000000;
		background-color: #000000;
		height: 3px;
	}
	</style>
</head>
<body>

<?php include 'connect.php';?>
	
<?php
$name = $_POST["name"];
$email = $_POST["email"];
$topic = $_POST["topic"];
$content = $_POST["content"];

$sql = "INSERT INTO Question (name, email, topic, content)
VALUES ('$name', '$email', '$topic', '$content')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>


<h1>Simple StackExchange</h1>
<p>The question topic goes here</p>
<hr>
<br>
<p>Answer</p>
<hr>


</body>
</html>
