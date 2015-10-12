<html>
	<head>
		<title>
			Simple StackExchange
		</title>
		<link rel="stylesheet" href="css/main.css">
		<script src="js/delete.js"></script>
	</head>
	
	<body>

		<h1>
			Simple StackExchange
		</h1>
		<br>
		<div class="searchbar">
			<form id="searchform" action="search.php?go" method="post">
				<input id="searchbar" type="text" name="name">
				<input id="searchbutton" type="submit" name="submit" value="Search"><br>
			</form>
			<p id="searchbar">
				Cannot find what you are looking for?
				<a class="gold" href="ask.html">
					Ask here
				</a>
			</p>
		</div>

		<p id="RecentlyAsked">
			Recently Asked Questions
		</p>
		<hr>

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

		$sql = "SELECT qid, nama, topic, votes, content, answers FROM question ORDER BY datetime DESC";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_assoc($result)) {
		?>
		
		<table>
			<tr>
				<td class="Votes" rowspan="2">
					<b>
						<?php echo $row["votes"] ?>
						<br>
						Votes
					</b>
				</td>
				<td class="Answers" rowspan="2">
					<b>
						<?php echo $row["answers"] ?>
						<br>
						Answers
					</b>
				</td>
				<td>
					<p class="topic">
						<a href="question.php?qid=<?php echo $row["qid"]?>">
							<?php echo $row["topic"] ?>
						</a>
					</p>
					<p class="content">
						<?php echo $row["content"]?>
					</p>
					<br>
				</td>
			</tr>
			<tr>
				<td class="Asker">
					asked by
					<p class="blue">
						<?php echo $row["nama"] ?>
					</p> | 
					<a class="gold" href="edit.php?qid=<?php echo $row["qid"] ?>">
						edit
					</a> | 
					<a class="red" href="delete.php?qid=<?php echo $row["qid"] ?> " onclick="return confirm('Apakah kamu yakin?')" >
						delete
					</a>
				</td>
			</tr>
		</table>
		<hr>
		
		<?php
			}
		} else {
	
		}

		mysqli_close($conn);
		?>

	</body>
</html>