<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Stack Exchange</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<h1> Simple Stack Exchange </h1>
<div id="container">
<b> What's your question? </b>

<form class="ask" action="ask.php" method="post">
	<input type="text" name="name" placeholder="Name" required>
	<p></p><input type="text" name="email" placeholder="Email" required>
    <p></p><input type="text" name="topic" placeholder="Question Topic" required />
    <p></p><textarea name="content" placeholder="Content" required="required"></textarea>
	<p></p><button type="submit"> Post </button>
</form>

</div>
</body>
</html>