<html>

<head>

</head>

<body>
	<?php
		include "koneksi.php";
		$search = $_POST["search"];
		echo "Showing result from";
		$sql = "SELECT * FROM question WHERE name LIKE '%$search%' "; //query to get the search result
		$result = mysql_query($sql);
		echo "<center>";
		echo "<h2> Hasil Searching </h2>";
		echo "<table border='1' cellpadding='5' cellspacing='8'>";
		echo "
			<tr bgcolor='orange'>
			<td>Votes</td>
			<td>Username</td>
			<td>Content </td>
			<td>timestamp</td>
			</tr>";
		while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
			echo "
			<tr>
			<td>".$data['votes']."</td>
			<td>".$data['name']."</td>
			<td>".$data['content']."</td>
			<td>".$data['timestamp']."</td>
			</tr>";
		}
		echo "</table>";
	?>

</body>

</html>