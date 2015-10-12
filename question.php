<html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/validate.js"></script>
	<script src="js/vote.js"></script>
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StackExchange";

$qid = $_GET["qid"];

//Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Cek koneksi
if (!$conn) {
	die("Connection failed : ". mysqli_connect_error());
}

$sqlQ = "SELECT qid, nama, email, topic, votes, content, datetime FROM question WHERE qid='$qid'";
$resultQ = mysqli_query($conn, $sqlQ);

if (mysqli_num_rows($resultQ)>0) {
	while ($row = mysqli_fetch_assoc($resultQ)) {
?>
<h1><a href="home.php">Simple StackExchange</a></h1>
<br>
<h2><?php echo $row["topic"]?></h2>
<hr>
<table>
	<tr>
		<td class="VotesQA">
			<a onclick="VotesQUp(<?php echo $row["qid"] ?>,0)"><img src="img/vote-up.png"></a><br>
			<div id="VotesQ"><?php echo $row["votes"]?></div>
			<a onclick="VotesQDown(<?php echo $row["qid"] ?>,0)"><img src="img/vote-down.png"></a>
		</td>
		<td>
			<?php echo $row["content"]?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td class="Asker">
			asked by <?php echo $row["email"]?> at <?php echo $row["datetime"] ?> | 
			<a class="gold" href="edit.php?qid=<?php echo $row["qid"] ?>">
				edit
			</a> | 
			<a class="red" href="delete.php?qid=<?php echo $row["qid"] ?> " onclick="return confirm('Apakah kamu yakin?')" >
				delete
			</a>
		</td>
	</tr>
</table>
<?php
	}
} else {
	
}

$sqlA = "SELECT aid,nama,email,content,votes,datetime FROM answer WHERE qid='$qid' ORDER BY votes DESC";
$sqlVotes = "SELECT count(*) FROM answer WHERE qid='$qid'";
$resultA = mysqli_query($conn,$sqlA);
$resultVotes = mysqli_query($conn,$sqlVotes);

if (mysqli_num_rows($resultVotes)>0) {
	while ($row = mysqli_fetch_assoc($resultVotes)) {
		$votescount = $row["count(*)"];
	}
} else {
	
}
?>
<br>
<h2><?php echo $votescount ?> Answer<?php if ($votescount != 1) echo "s"; ?></h2>
<hr>
<?php
if (mysqli_num_rows($resultA)>0) {
	while ($row = mysqli_fetch_assoc($resultA)) {
?>

<table>
	<tr>
		<td class="VotesQA">
			<a onclick="VotesAUp(0,<?php echo $row["aid"] ?>)"><img src="img/vote-up.png"></a><br>
			<div id="<?php echo $row["aid"] ?>"><?php echo $row["votes"] ?></div>
			<a onclick="VotesADown(0,<?php echo $row["aid"] ?>)"><img src="img/vote-down.png"></a>
		</td>
		<td>
			<?php echo $row["content"]?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td class="Answerer">answered by <?php echo $row["email"]?> at <?php echo $row["datetime"]?></td>
	</tr>
</table>
<hr>

<?php
	}
} else {
	
}

mysqli_close($conn);
?>
<h2>Your Answer</h2>
<form name="answerForm" action="answer.php" method="post" onsubmit="return validateAnswerForm()">
	<input name="qid" type="hidden" value="<?php echo $qid ?>">
	<input name="name" class="text" type="text" placeholder="Name" size="130"><br>
	<input name="email" class="text" type="text" placeholder="Email" size="130"><br>
	<textarea name="content" id="question" placeholder="Content"></textarea>
	<input class="button" type="submit" value="Post"><br>
</form>
</body>

</html>