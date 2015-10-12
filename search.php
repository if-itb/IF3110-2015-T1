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
			<a href="home.php">
				Simple StackExchange
			</a>
		</h1>
		<br>
		<div class="searchbar">
			<form id="searchform" action="search.php?go" method="post">
				<input id="searchbar" type="text" name="name" value="<?php echo $_POST["name"] ?>">
				<input id="searchbutton" type="submit" name="submit" value="Search"><br>
			</form>
			<p id="searchbar">
				Cannot find what you are looking for?
				<a class="gold" href="ask.html">
					Ask here
				</a>
			</p>
		</div>
		
		<p id="SearchResults">
			Search Results
		</p>
		<hr>
	
		<?php
		if (isset($_POST["submit"])) {
			if (isset($_GET["go"])) {
				if (preg_match("/[A-Z | a-z]+/", $_POST["name"])) {
					$name = $_POST["name"];
					
					//Membuat koneksi ke database
					$conn = mysqli_connect("localhost", "root", "", "StackExchange") or die ("Cannot connect to database");
					
					//Mencari ke database
					$sql = "SELECT qid, nama, topic, votes, content, answers FROM question WHERE topic LIKE '%".$name."%' OR content LIKE '%".$name."%'";	
					
					$result = mysqli_query($conn,$sql);
					
					if (mysqli_num_rows($result) > 0) {
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
						//Tidak ada record
					}
				} else {
					//Query tidak mengandung huruf
				}
			} else {
				//Tidak ada query
			}
		}
		?>
		
	</body>
</html>