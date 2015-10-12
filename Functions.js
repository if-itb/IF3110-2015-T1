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