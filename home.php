<html>

<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

<h1>Simple StackExchange</h1><br>
<div class="searchbar">
	<input id="searchbar" type="text" size="113"> <input id="searchbutton" type="button" value="Search"><br>
	<p id="searchbar">Cannot find what you are looking for? <b><a href="ask.html">Ask here</a></b></p>
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

$sql = "SELECT qid, nama, topic, votes FROM question ORDER BY datetime DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
?>
		<table>
		<tr>
		<td class="Votes" rowspan="2"><b><?php echo $row["votes"] ?><br>Votes</b></td>
		<td class="Answers" rowspan="2"><b>0<br>Answers</b></td>
		<td><?php echo $row["topic"] ?></td></tr>
		<tr><td class="Asker"><b>asked by <strong class="blue"><?php echo $row["nama"] ?></strong> | <form class="edit" action="edit.php" method="post"><input type="hidden" name="qid" value="<?php echo $row["qid"] ?>"><input id="edit" type="submit" class="subedit" value="edit"></form> | <form class="edit" action="edit.php" method="post"><input type="hidden" name="qid" value="<?php echo $row["qid"] ?>"><input id="delete" type="submit" class="subedit" value="delete"></form>
		</tr></table><hr>
<?php
	}
} else {
	
}

mysqli_close($conn);
?>

</body>
</html>