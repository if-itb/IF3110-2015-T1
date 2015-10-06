<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP PAGE</title>
	<meta charset ="utf-8">
	<link rel = "stylesheet" type = "text/css" href = "styles.css" />
</head>
<body>
	<div id = "header">
		<h1>SIMPLE STACK EXCHANGE</h1>
	</div>
	
<div align ="center">
	<h1>What is your Question?</h1>
	<fieldset style="width:60%" ><legend>Question Form</legend> 
	
	<form method="POST" action="postAns.php">
	<table border="0" align ="left" width="100%">  
		<tr> 
			<td> <input type="text" name="name" placeholder="Name" style="width:90%"></td> 
		</tr> 
		<tr>  
			<td><input type="text" name="email" placeholder="E-mail" style="width:90%"></td> 
		</tr> 
		<tr> 
			<td><input type="text" name="topic" placeholder="Question Topic" style="width:90%"></td>
		</tr> 
		<tr>  
			<td><!--input type="text" name="content" placeholder="Content" style="height:90px;width:90%;align:left;"-->
				<textarea placeholder="Content" rows="5" cols="30" style="width:90%;font-size:20px"></textarea>
			</td> 
		</tr> 
		<tr> 
			<td align ="right"><input id="button" type="submit" name="submit" value="Post" style="width:10%"></td> 
		</tr> 
	</table> 
	</form> 
	</fieldset>

</div>

</body>	
</html>