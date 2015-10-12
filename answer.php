<!DOCTYPE html>
<html>
<title>Answer(s)</title>
<head>
<link rel="stylesheet" type="text/css" href="wbd.css">
<script>
function validateAnswerField() {
	var x = document.forms["ReplyQ"]["nama"].value;
	if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
	var y = document.forms["ReplyQ"]["alamat"].value;
	if (y == null || y == "") {
        alert("Email must be filled out");
        return false;
    } else {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (!re.test(y)){
			alert("Email invalid!");
			return false;
		}
	}
	var z = document.forms["ReplyQ"]["jawaban"].value;
	if (z == null || z == "") {
        alert("Answer must be filled out");
		
        return false;
    }
}
	
	function voteupQ(int){
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("jumlahvote").innerHTML=xmlhttp.responseText;
			}
		  }
		  xmlhttp.open("GET","voteupQ.php?id="+int,true);
		  xmlhttp.send();
	}
	
	function votedownQ(int){
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		  }
		  xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("jumlahvote").innerHTML=xmlhttp.responseText;
			}
		  }
		  xmlhttp.open("GET","votedownQ.php?id="+int,true);
		  xmlhttp.send();
	}
	
	function voteupAns(int){
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("jumlahvoteAns"+int).innerHTML=xmlhttp.responseText;
			}
		  }
		  xmlhttp.open("GET","voteupAns.php?id="+int,true);
		  xmlhttp.send();
	}
	
	function votedownAns(int){
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("jumlahvoteAns"+int).innerHTML=xmlhttp.responseText;
			}
		  }
		  xmlhttp.open("GET","votedownAns.php?id="+int,true);
		  xmlhttp.send();
	}
</script>
</head>
<body>
<h1><a href = "wbd.php">Simple Stack Exchange</a></h1><br>
<?php
	$id = $_GET["id"];
	$link = mysqli_connect("127.0.0.1","root","","wbd");
	if (!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	/*Retrieve live answer*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = "INSERT INTO answer(IDQ, Nama, Email, Answer, Vote) VALUES ('$id', '$_POST[nama]','$_POST[alamat]','$_POST[jawaban]',0)";
		if(!mysqli_query($link,$sql)){
			echo "Input data failed";
		}
	}
	
	$sql = "SELECT * FROM QUESTION WHERE IDQ =". $id;
	$retval = mysqli_query($link,$sql);
	if(!$retval){
		throw new My_Db_Exception ('Database error: ' . mysql_error());
	}
	if ($row = $retval->fetch_assoc()){
		echo "<div id = 'container'>";
		echo "<p id='p2'>Topic : " .$row['QuestionTopic'] . "</p>";
		echo "</div>";
		echo "<div id='isipertanyaan'>";
	echo "<table>";
		echo "<tr>";
			echo "<td id='td5'><img src='up-arrow-icon.png' width='25px' height='25px' onclick='voteupQ(".$row['IDQ'].")'> <p id='jumlahvote'>" . $row['Vote'] ."</p> <img src='down-arrow-icon.png' width='25px' height='25px' onclick='votedownQ(".$row['IDQ'].")'></td>";
			echo "<td id='td6'><p id='pertanyaan'>" . $row['Content'] . "</p><td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td></td>";
			echo "<td id='td7'>asked by <span style='color:blue'>" . $row['Nama'] . "</span> | <a href = 'wbd2.php?id=" .$row ['IDQ']. "' style = 'color:yellow'> edit </a> | 
		<a href = 'wbd.php?id=" .$row ['IDQ'] . "&rule=delete' style = 'color:red'> delete </a></p></td>";	
		echo "</tr>";
	echo "</table>";
	echo "</div>";
	}
	
	$sql2 = "SELECT answer.IDAns, answer.Nama, answer.Email, answer.Answer, answer.Vote FROM answer WHERE answer.IDQ =" .$id;
	$sql3 = "SELECT COUNT(answer.IDAns) AS JumlahJawaban FROM answer WHERE answer.IDQ =" .$id;
	$retval2 = mysqli_query($link,$sql2);
	$retval3 = mysqli_query($link,$sql3);
	if(!$retval2){
		throw new My_Db_Exception('Database error: ' . mysql_error());
	}
	if(!$retval3){
		throw new My_Db_Exception('Database error: ' . mysql_error());
	}
	if($row = $retval3->fetch_assoc()){
		echo "<div id = 'container'>";
		if ($row["JumlahJawaban"] == 0){
			echo "<p id='p2'>No Answer</p>";
		} else if ($row["JumlahJawaban"] == 1){
			echo "<p id='p2'>1 Answer</p>";
		} else {
			echo "<p id='p2'>" .$row['JumlahJawaban'] . " Answers</p>";
		}
		echo "</div>";
	}
	while ($row = $retval2->fetch_assoc()){
		echo "<div id='isipertanyaan'>";
		echo "<table>";
		echo "<tr>";
		echo "<td id='td5'><img src='up-arrow-icon.png' width='25px' height='25px' onclick = 'voteupAns(".$row['IDAns'].")'> <p id='jumlahvoteAns".$row['IDAns']."' class='fontvote'>" . $row['Vote'] ."</p> <img src='down-arrow-icon.png' width='25px' height='25px' onclick='votedownAns(".$row['IDAns'].")'></td>";
		echo "<td id='td6'><p id='pertanyaan'>" . $row['Answer'] . "</p></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td></td>";
		echo "<td id='td7'>answered by <span style='color:blue'>" . $row['Nama'] . "</span>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		echo "<div id='container'>";
			echo "<p id='p2'></p>";
		echo "</div>";
	}

	echo "<div id='container'>";
		echo "<p id='p10'>Your Answer</p>";
	echo"</div>";
echo "<br>";
echo "<form name='ReplyQ' action = 'answer.php?id=" . $id . "'method='post' onsubmit = 'return validateAnswerField()'>";
	echo "<input id='name' type='text' name='nama' class='widthask' placeholder='Name'><br>";
	echo "<input id='email' type='text' name='alamat' class='widthask' placeholder='Email'><br>";
	echo "<textarea id='content' rows='10' cols='66' name='jawaban' placeholder='Content'></textarea><br>";
	echo "<input id='PostButton'type='submit' value='Post'>";
echo "</form>";
?>
</body>
</html>