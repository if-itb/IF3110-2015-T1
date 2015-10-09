<html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
<h1><a href="home.php">Simple StackExchange</a></h1><br>
<h2>What's your question?</h2>
<hr>

<?php 
	$qid = $_GET["qid"];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "StackExchange";

	//Membuat koneksi
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	//Cek koneksi
	if (!$conn) {
		die("Connection failed : ". mysqli_connect_error());
	}

	$sql = "SELECT qid, nama, email, topic, content FROM question WHERE qid='$qid'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
?>

<form action="editdb.php" method="post">
	<input name="qid" type="hidden" value="<?php echo $row["qid"] ?>">
	<input name="name" class="text" type="text" placeholder="Name" size="132" value="<?php echo $row["nama"] ?>"><br>
	<input name="email" class="text" type="text" placeholder="Email" size="132" value="<?php echo $row["email"] ?>"><br>
	<input name="topic" class="text" type="text" placeholder="Question Topic" size="132" value="<?php echo $row["topic"] ?>"><br>
	<textarea name="content" placeholder="Content" rows="5" cols="107"><?php echo $row["content"] ?></textarea>
	<input class="button" type="submit" value="Post"><br>
</form>

<?php
		}
	} else {
		//Tidak ada record
	}
	
?>

</body>
</html>