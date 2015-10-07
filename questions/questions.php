<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css"/>
	<title>Questions</title>
</head>
<body>
	 <div id="big">Simple StackExchange</div>
	 <div class="medium" id="m1">What's your question?</div>
	 <form name="makequestion" method="post" action="sendquestions.php">
		 <input type="text" name="name" placeholder="Name" class="medium">
		 <input type="email" name="email" placeholder="Email" class="medium">
		 <input type="text" name="question" placeholder="Question" class="medium">
		 <textarea type="text" name="content" placeholder="Content" class="medium" id="content"></textarea> 
		 <input type="submit" value="Post" id="button">
	 </form>
</body>
</html>