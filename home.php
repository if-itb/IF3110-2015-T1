<html>

<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/delete.js"></script>
</head>
<body>

<h1>Simple StackExchange</h1><br>
<div class="searchbar">
	<input id="searchbar" type="text" size="113"> <input id="searchbutton" type="button" value="Search"><br>
	<p id="searchbar">Cannot find what you are looking for? <a href="ask.html"><strong class="gold">Ask here</strong></a></p>
</div>

<p id="RecentlyAsked">Recently Asked Questions</p><hr>

<?php
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

$sql = "SELECT qid, nama, topic, votes, content FROM question ORDER BY datetime DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
?>
		<table>
		<tr>
		<td class="Votes" rowspan="2"><b><?php echo $row["votes"] ?><br>Votes</b></td>
		<td class="Answers" rowspan="2"><b>0<br>Answers</b></td>
		<td><p class="topic"><?php echo $row["topic"] ?></p><br><p class="content"><?php echo $row["content"]?></p></td></tr>
		<tr><td class="Asker"><b>asked by <strong class="blue"><?php echo $row["nama"] ?></strong> | <form class="edit" action="edit.php" method="post"><input type="hidden" name="qid" value="<?php echo $row["qid"] ?>"><input type="submit" class="edit" value="edit"></form> | <form class="delete" action="delete.php" method="post"><input type="hidden" name="qid" value="<?php echo $row["qid"] ?>"><input type="submit" class="delete" value="delete"></form>
		</tr></table><hr>
<?php
	}
} else {
	
}

mysqli_close($conn);
?>

</body>
</html>