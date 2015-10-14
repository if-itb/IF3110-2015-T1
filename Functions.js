function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}

function validateQuestionForm() {
	var x = document.forms["QuestionForm"]["name"].value;
	if (x == null || x == "") {
		alert("Name must be filled out");
		return false;
	}
	x = document.forms["QuestionForm"]["email"].value;
	if (x == null || x == "") {
		alert("Email must be filled out");
		return false;
	}
	else if (!validateEmail(x)) {
		alert("Please enter correct email address");
		return false;
	}
	x = document.forms["QuestionForm"]["topic"].value;
	if (x == null || x == "") {
		alert("Topic must be filled out");
		return false;
	}
	x = document.forms["QuestionForm"]["content"].value;
	if (x == null || x == "") {
		alert("Content must be filled out");
		return false;
	}
}

function validateAnswerForm() {
	var x = document.forms["AnswerForm"]["name"].value;
	if (x == null || x == "") {
		alert("Name must be filled out");
		return false;
	}
	x = document.forms["AnswerForm"]["email"].value;
	if (x == null || x == "") {
		alert("Email must be filled out");
		return false;
	}
	else if (!validateEmail(x)) {
		alert("Please enter correct email address");
		return false;
	}
	x = document.forms["AnswerForm"]["content"].value;
	if (x == null || x == "") {
		alert("Content must be filled out");
		return false;
	}
}

function addQuestionVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("vote").innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("POST", "AddQuestionVote.php?id=" + id, true);
	xhttp.send();
}

function substractQuestionVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("vote").innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("POST", "SubstractQuestionVote.php?id=" + id, true);
	xhttp.send();
}

function addAnswerVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("answerVote" + id).innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("POST", "AddAnswerVote.php?id=" + id, true);
	xhttp.send();
}

function substractAnswerVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("answerVote" + id).innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("POST", "SubstractAnswerVote.php?id=" + id, true);
	xhttp.send();
}