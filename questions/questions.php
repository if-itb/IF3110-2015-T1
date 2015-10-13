<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css"/>
	<title>Questions</title>
	<script type="text/javascript">
	function validateForm() {
		//check name
		var input = document.forms["makequestion"]["name"].value;
		if(input==null || input=="") {
			alert("Name must be filled out");
			return false;
		}
    	//check topic 
    	input = document.forms["makequestion"]["question"].value;
    	if(input==null || input=="") {
			alert("Topic must be filled out");
			return false;
		}
		//check content
    	input = document.forms["makequestion"]["content"].value;
		if(input==null || input=="") {
			alert("Content must be filled out");
			return false;
		}
		//check email
		input = document.forms["makequestion"]["email"].value;
    	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    	return re.test(input);
	}
	</script>
</head>
<body>
	 <div id="big">Simple StackExchange</div>
	 <div class="mediumbaru">
	 <div id="m1">What's your question?</div>
	 <form name="makequestion" method="post" action="sendquestions.php" onsubmit="return validateForm()">
		 <input type="text" name="name" placeholder="Name" class="medium">
		 <input type="email" name="email" placeholder="Email" class="medium">
		 <input type="text" name="question" placeholder="Question Topic" class="medium">
		 <textarea type="text" name="content" placeholder="Content" class="medium" id="content"></textarea> 
		 <input type="submit" value="Post" id="button">
	 </form></div>
</body>
</html>