<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css"/>
	<title>Questions</title>
</head>
<body>
	 <div id="big">Simple StackExchange</div>
	 <div class="mediumbaru">
	 <div id="m1">What's your question?</div>
	 <form name="makequestion" method="post" action="sendquestions.php" onsubmit="return validateFormQuestion(this);">
		<script type="text/javascript" src="../script/validation.js"></script>
		<input type="text" name="name" placeholder="Name" class="medium">
		<input type="email" name="email" placeholder="Email" class="medium">
		<input type="text" name="question" placeholder="Question Topic" class="medium">
		<textarea type="text" name="content" placeholder="Content" class="medium" id="content"></textarea> 
		<input type="submit" value="Post" id="button">
	 </form></div>
	<script src="../script/validation.js"></script>
</body>
</html>