<!DOCTYPE html>
<html>
<head>
	<title>Ask</title>
	<link rel="stylesheet" href="ask.css">

	<script>
	function validateForm() {
	    var a = document.forms["question"]["nama"].value;
	    var b = document.forms["question"]["email"].value;
	    var c = document.forms["question"]["topik"].value;
	    var d = document.forms["question"]["konten"].value;
	    if (a == null || a == "") {
	        alert("Nama belum terisi");
	        return false;
    	}
    	if (b == null || b == "") {
	        alert("Email belum terisi");
	        return false;
    	}
    	if (c == null || c == "") {
	        alert("Topik belum terisi");
	        return false;
    	}
    	if (d == null || d == "") {
	        alert("Konten belum terisi");
	        return false;
    	}
    	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    	if (re.test(b) == false){
    		alert("Format Email Salah");
    		return false;
    	}
	}
	</script>
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

	<form action="add_question.php" method="post" name="question" onsubmit="return validateForm()">
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