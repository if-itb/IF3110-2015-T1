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
	<form name="ask" onsubmit="return ValidasiInput()" action="InsertQuestion.php" method="post">
	
		
			<input type="text" name="name" placeholder="Name" class="header3" > 
		
	
	
		
			<input type="text" name="email" placeholder="Email" class="header3" > 
		
	
	
		
			<input type="text" name="topic" placeholder="Topic" class="header3" > 
		
	
	
		
			<textarea type="text" name="content" placeholder="Content" class="header3" id="content"></textarea> 
		
			<!--<input type="hidden" name="id">-->
	
			<button id="button"  type="submit"> Post </button>
		<!--<input type="submit" value="Post" id="button">-->
	
	</form>
	<!--<input type="submit" value="Post" id="button">-->
	<!--a href="#"><div id="button">Post</div></a>-->
</div>

</div>




</body>
</html>