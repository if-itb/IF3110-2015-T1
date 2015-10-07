<!DOCTYPE html>
<html lang="en">

<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">

    <script>
	function validateForm() {
    	var q_name = document.forms["q_form"]["q_name"].value;
    	var q_email = document.forms["q_form"]["q_email"].value;
    	var q_topic = document.forms["q_form"]["q_topic"].value;
    	var q_content = document.getElementById("q_content").value;
    	if (q_name == null || q_name == "" || q_email == null || q_email == "" || q_topic == null || q_topic == "" || q_content == null || q_content == "") {
        	alert("All fields must be filled out");
        	return false;
    	} else if (!validateEmail(q_email)) {
    		alert("Email address not valid");
    		return false;
    	}
	}
	function validateEmail(email) {
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		return re.test(email);
	}
	</script>
</head>
<body id="question">
	<div class="container">
    <h1>Simple StackExchange</h1>
    <h2>What's your question?</h2>
    <hr>
    <form action="submitquestion.php" method="post" id="q_form" onsubmit="return validateForm()">
        <input type="text" class="form-control" placeholder="Name" name="q_name"><br>
        <input type="text" class="form-control" placeholder="Email" name="q_email"><br>
        <input type="text" class="form-control" placeholder="Question Topic" name="q_topic"><br>
        <textarea id="q_content" name="q_content" placeholder="Content"></textarea><br>
        <button type="submit">Post</button>
    </form>
    </div>
</body>

</html>
