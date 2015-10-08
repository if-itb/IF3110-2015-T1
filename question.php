<!DOCTYPE html>
<html>
<title>Coppeng Exchange</title>
<body>
<h1>Coppeng Exchange</h1>
<br>

<h2>Apa pertanyaan anda ?</h2> <hr>
<form action = 'post.php' method = 'POST' >
	Nama <br>
	<input type = 'text' name = 'Nama' maxlength = '60'></input>
	<br>
	Email <br>
	<input type = 'text' name = 'Email' maxlength = '60'></input>
	<br>
	Topik <br>
	<input type = 'text' name = 'Topik' maxlength = '140'></input>
	<br>
	Konten <br>
	<textarea rows = '10' cols = '20' name = 'Konten'></textarea>
	<br>
	<input type = 'submit' value = 'Kirim'>
</form>
</body>
</html>