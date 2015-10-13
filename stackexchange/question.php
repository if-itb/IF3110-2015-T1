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

<table class ="question">
	<tr>
    	<td colspan = 2> The question topic goes here </td>
    </tr>
    <tr>
    	<td rowspan = 2 class="td-vote-answer"> votes </td>
        <td id="detail">Question detail<!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.--> </td>
    </tr>
    <tr>
    	<td colspan="2"> Asked by .... </td>
    </tr>
</table>

<table>

</table>

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