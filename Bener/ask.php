<!DOCTYPE html>
<html>
<head>
  	<title>Create</title>
  	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href='style.css'/>

<script>
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateForm() {
    var formName = "askForm";
    var name = document.forms[formName]["name"].value;
    var email = document.forms[formName]["email"].value;
    var topic = document.forms[formName]["topic"].value;
    var content = document.forms[formName]["content"].value;

    if (name == null || name == "" || email == null || email == "" || topic == null || topic == "" || content == null || content == "") {
        alert("All field must be filled out");
        return false;
    }

    if(!validateEmail(email)){
    	alert("Email format is not recognized");
        return false;
    }
}
</script>

</head>
<body>

<div class="title">Simple StackExchange</div>
<div class="subtitle">What's your question?</div>
<div class="line"> <hr> </div>
<br>
<form name="askForm" action="askpost.php" onsubmit="return validateForm()" method="post">
	<input type="text" name="name" placeholder="Name" size="130%"><br>
	<input type="text" name="email" placeholder="Email" size="130%"><br>
	<input type="text" name="topic" placeholder="Question Topic" size="130%"><br>
	<textarea name="content" rows="5" cols="128%" placeholder="Content"></textarea><br>
	<input type="submit" value="Submit">
</form>


</body>
</html>


