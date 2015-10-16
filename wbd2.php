<!DOCTYPE html>
<html>
<title>Ask your Question</title>
<head>
<link rel="stylesheet" type="text/css" href="wbd.css">
<script>
function validateField() {
	var x = document.forms["AskQ"]["name"].value;
	if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
	var y = document.forms["AskQ"]["email"].value;
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
	var z = document.forms["AskQ"]["questiontopic"].value;
	if (z == null || z == "") {
        alert("Topic must be filled out");
        return false;
    }
	var a = document.forms["AskQ"]["content"].value;
	if (a == null || a == "") {
        alert("Content must be filled out");
        return false;
    };
}
</script>
</head>
<body>
<h1><a href = "wbd.php">Simple Stack Exchange</a></h1>
<div id="container">
	<p id="p2">What's your question?</p>
</div>
<br>
<?php if(!isset($_GET["id"])){
	echo "<form name='AskQ' action = 'wbd.php' method='post' onsubmit='return validateField()'>";
		echo "<input id='name' type='text' name='name' class='widthask' placeholder='Name'><br>";
		echo "<input id='email' type='text' name='email' class='widthask' placeholder='Email'><br>";
		echo "<input id='questiontopic' type='text' name='questiontopic' class='widthask' placeholder='Question Topic'><br>";
		echo "<textarea id='content' rows='10' cols='66' name='content' placeholder='Content'></textarea><br>";
		echo "<input id='PostButton' type='submit' value='Post'>";
	echo "</form>";
	} else {
		echo "<form name='AskQ' action = 'wbd.php?id=" . $_GET["id"] . "&rule=edit' method='post' onsubmit = 'return validateField()'>";
		echo "<input id='name' type='text' name='name' class='widthask' placeholder='Name'><br>";
		echo "<input id='email' type='text' name='email' class='widthask' placeholder='Email'><br>";
		echo "<input id='questiontopic' type='text' name='questiontopic' class='widthask' placeholder='Question Topic'><br>";
		echo "<textarea id='content' rows='10' cols='66' name='content' placeholder='Content'></textarea><br>";
		echo "<input id='PostButton' type='submit' value='Post'>";
		echo "</form>";
	} 
?>
</body>
</html>