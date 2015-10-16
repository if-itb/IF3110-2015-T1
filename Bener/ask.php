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
<br>
<br>
<br>
<br>
<div class="subtitle">What's your question?</div>
<div class="line"> <hr> </div>
<br>

<?php include 'connect.php';?>

<?php
    if (isset($_GET['question_id'])){
	    $question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);
	    $sql = "SELECT name, email, topic, content FROM Question WHERE question_id = $question_id";
	    $result = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($result);
	    if (mysqli_num_rows($result) > 0) {
	        $name = $row["name"];
	        $email = $row["email"];
	        $topic = $row["topic"];
	        $content = $row["content"];
	    }
	   	else{
        	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	}
    }
    else{
    	$question_id = 0;
        $name = "";
        $email = "";
        $topic = "";
        $content = "";
    }

        echo 
        "<form name=\"askForm\" action=\"askpost.php\" onsubmit=\"return validateForm()\" method=\"post\">
        <input value=\"" . $question_id . "\" type=\"hidden\" name=\"question_id\">
        <input value=\"" . $name . "\" type=\"text\" name=\"name\" placeholder=\"Name\" size=\"130%\"><br>
        <input value=\"" . $email . "\" type=\"text\" name=\"email\" placeholder=\"Email\" size=\"130%\"><br>
        <input value=\"" . $topic . "\" type=\"text\" name=\"topic\" placeholder=\"Question Topic\" size=\"130%\"><br>
        <textarea value=\"" . $content . "\" name=\"content\" rows=\"5\" cols=\"128%\" placeholder=\"Content\"></textarea><br>
        <input type=\"submit\" value=\"Post\">
        </form>";
    

?>

</body>
</html>


