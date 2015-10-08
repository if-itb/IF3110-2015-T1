<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css">
	<title>Answers</title>
</head>
<body>
	<div id="big">Simple StackExchange</div>
	<div  class="mediumbaru">
	
	<div id=\"m1\">Qeustion</div>
	<div><table class=\"medtab\">
		<tr>
			<td id=\"num\">
				<table>
					<tr><td>▲</td></tr>
					<tr><td>0</td></tr>
					<tr><td>▼</td></tr>
				</table>
			</td>
			<td id=\"anscontent\">Question content</td>
		</tr>
		<tr>
			<td id=\"asker\">asked by mahfuzh74 at Saturday <a href=\"../questions/editquestions.php\">edit</a> | delete</td>
		</tr>
	</table></div> 
	
	<div><table class=\"medtab\">
		<tr>
			<td id=\"num\">
				<table>
					<tr><td>▲</td></tr>
					<tr><td>0</td></tr> 
					<tr><td>▼</td></tr>
				</table>
			</td>
			<td id=\"anscontent\">Answer content</td>
		</tr>
		<tr>
			<td id=\"asker\">answered by Nana at Saturday</td>
		</tr>
	</table></div>
	<div id="m2">Your Answer</div>
	<form name="makequestion" method="post" action="sendanswers.php">
		 <input type="text" name="name" placeholder="Name" class="medium">
		 <input type="email" name="email" placeholder="Email" class="medium">
		 <textarea type="text" name="content" placeholder="Content" class="medium" id="content"></textarea> 
		 <input type="submit" value="Post" id="button">
	 </form>
	 </div>
</body>
</html>