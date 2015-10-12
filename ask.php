<!DOCTYPE html>
<html>
<head>
	<title>Ask</title>
	<link rel="stylesheet" href="ask.css">
</head>
<body>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "wbd";
	$id = $_GET['ID'];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT Nama, Email, Topik, Konten FROM pertanyaan WHERE ID='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($id == 0) {
		$name = "";
		$email = "";
		$topic = "";
		$content = "";
	} else {
		$name = $row['Nama'];
		$email = $row['Email'];
		$topic = $row['Topik'];
		$content = $row['Konten'];
	}
?>

	<h1> Simple StackExchange</h1>
	<br>
	<h2> What's your question ? </h2>
	<hr>

	<form action="add_question.php" method="post">
		<input name="nama" class="name" type="text" value="<?php echo $name ?>" placeholder="Name"> <br>
		<input class="email" type="text"  name="email" value="<?php echo $email ?>" placeholder="Email"> <br>
		<input class="topic" type="text" name="topik" value="<?php echo $topic ?>" placeholder="Question Topic"> <br>
		<textarea class="content" type="text" name="konten" placeholder="Content"><?php echo $content ?></textarea><br>
		<input class="question-id" type="hidden" name="id" value="<?php echo $id ?>">
		<input class="submit-button" type="submit" value="Post">
	</form>	

<?php mysqli_close($conn) ?>

</body>
</html>