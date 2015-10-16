<!DOCTYPE html>
<html>
<title>Search Result</title>
<head>
<link rel="stylesheet" type="text/css" href="wbd.css">
<h1><a href = "wbd.php">Simple Stack Exchange</a></h1><br>
<p id="recently">Search Result</p>
<body>
<?php
	$link = mysqli_connect("127.0.0.1","root","","wbd");
	if (!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = "SELECT * FROM question WHERE questiontopic LIKE '%$_POST[SearchBox]%' OR (content LIKE '%$_POST[SearchBox]%')";
		$retval = mysqli_query($link,$sql);
		if ($retval->num_rows > 0){
			while ($row = $retval->fetch_assoc()){
				$sql4 = "SELECT COUNT(answer.IDAns) AS JumlahJawaban FROM answer WHERE answer.IDQ=" . $row['IDQ'];
				$retval4 = mysqli_query($link,$sql4);
				echo "<div id='searchresult'>";
				echo "<table>";
				echo "<hr>";
				echo "<tr>";
				echo "<td class = 'td1'> " .$row['Vote'] ."<br>Votes</td>";
				if ($row2 = $retval4->fetch_assoc()){
					$temp = $row2['JumlahJawaban'];
				}
				echo "<td class = 'td1'> " .$temp . "<br>Answers</td>";
				echo "<td id = 'td2'> <a href = 'answer.php?id=" . $row['IDQ'] . "' style = 'color:black'>" . $row['QuestionTopic'] . "</a><br><br>" .$row['Content'] . "</td>";
				echo "<td id = 'td3'> <p id='huruf2'>asked by 
				<span style='color:blue'>" . $row['Nama'] . "</span> | 
				<a href = 'wbd2.php?id=" .$row ['IDQ']. "' style = 'color:yellow'> edit </a> | 
				<a href = 'wbd.php?id=" .$row ['IDQ'] . "&rule=delete' style = 'color:red'> delete </a></p></td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
			}
		}
		
	}
	mysqli_close($link);
?>
</body>
</html>