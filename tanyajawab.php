<html>
<head>
	<h1 align="center"><a href="home.html">Simple Stack Exchange<a></h1>
	<link rel="stylesheet" href="test.css">
</head>

<body>
	<h1>The questions goes here</h1>
	<hr>
	<?php
		include "koneksi.php";
		if ($koneksi) {
			//mysql_select_db("stackexchange");
			echo "Berhasil koneksi";
			$pertanyaan= "SELECT * FROM question";
			$hasil=mysql_query($koneksi, $pertanyaan);
			$row=mysql_fetch_row($hasil);
			if ($row) {
				echo "berhasil";
				do {
					list($votes, $name, $email, $topic, $content)=$row;
					echo "Votes:", $votes;
					echo "</br>";
					echo "Content:", $content;
					echo "Timestamp:", $timestamp;
				} while ($row= mysql_fetch_row($hasil) );
			mysql_close($koneksi);
			} else {
				echo "Tidak ada";
				echo "</br>";
			}
		}
	?>
	<h1>The Answer goes here</h1>
	<hr>

	<h1>Your Answer</h1>
	<div align="center">
		<script>
		function validateForm() {
		    var name = document.getElementById("name").value;
		    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		    if (name == "" || email == "" || content == "") {
		        alert("All field must be filled out");
		        return false;
		    } else 
		    if (re.test(question.email.value)==false ){
		    	alert ("Invalid Email Address");
		    	return false;
		    } else {
		    	return true;
		    }
		}
		</script>
		<form id="question" action="home.html" onsubmit="return validateForm()" method="post">
			Nama <input id="name" type="text" name="name"></br>
			Email <input id="email" type="text" name="email"></br>
			Content <input id="content" type="text" name="content"></br>
			<input type="submit" value="Submit">
		</form>
	</div>
</body>

</html>
