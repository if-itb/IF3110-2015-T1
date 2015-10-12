<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="questionStyle.css"/>

		<script type="text/javascript" src="ValidasiInput.js"></script>
		<title>Question</title>
	</head>

<body>
<div class="container">
<div  id="header" > <a class="link1" href="home.php"> Simple StackExchange </div> </a>
<div class="header2" id="main2">What's your question?</div>

<!--<h1>Simple StackExchange</h1>-->

<div>
<?php
	include('dataBase.php'); 
	$ID = $_GET["id"]; 
	$sql = "SELECT ID, Vote, Name, Email, Topic, Content FROM questions WHERE ID = $ID";
	$question = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($question)) {
			echo "<form name=ask onsubmit= \"return ValidasiInput()\" action=EditQuestion.php method=post>
	
		
			<input type=text name=name placeholder=Name class=header3 value=" .$row["Name"]. "> 
		
			<input type=text name=email placeholder=Email class=header3 value=" .$row["Email"]. " > 
			
			<input type=text name=topic placeholder=Topic class=header3 value=" .$row["Topic"]. " > 
			
			<textarea type=text name=content placeholder=Content class=header3 id=content value=>" .$row["Content"]. "</textarea> 
		
			<input type=hidden name=id value=" .$row["ID"]. ">
	
			<input type=submit value=Post id=button>
	
			</form>"; 

	}
	mysqli_close($conn);

	?>
	


</div>

</div>