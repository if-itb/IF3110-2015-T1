function confirmDeletion(questionid) {
	if (confirm("Are you sure to delete this question?")) {
		window.location.href="index.php?id=" + questionid;
	}
}

function validateAnswerForm(formName, name, email, content) {
	var nameField = document.forms[formName][name].value;
	var emailField = document.getElementById(email);
	var contentField = document.forms[formName][content].value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (nameField == null || contentField == null || nameField == "" || contentField == "") {
		alert("All field must be filled out");
		return false;
	} else if (!filter.test(emailField.value)) {
		alert("Email is invalid");
		return false;
	}
}

function validateSearchForm(formName, search) {
	var searchField = document.forms[formName][search].value;
	if (searchField == null || searchField == "") {
		alert("Search field must be filled out");
		return false;
	}
}

function validateQuestionForm(formName, name, email, topic, content) {
	var nameField = document.forms[formName][name].value;
	var emailField = document.getElementById(email);
	var topicField = document.forms[formName][topic].value;
	var contentField = document.forms[formName][content].value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (nameField == null || topicField == null || contentField == null || nameField == "" || topicField == "" || contentField == "") {
		alert("All field must be filled out");
		return false;
	} else if (!filter.test(emailField.value)) {
		alert("Email is invalid");
		return false;
	}
}

function voteAnswerDown(answerid) {
	var xhttp;
	if (window.XMLHttpRequest) {	// Untuk modern browsers
		xhttp = new XMLHttpRequest();
	} else {	// Untuk IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("answerVote").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "voteAnswerDown.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("aid="+answerid);
}

function voteAnswerUp(answerid) {
	var xhttp;
	if (window.XMLHttpRequest) {	// Untuk modern browsers
		xhttp = new XMLHttpRequest();
	} else {	// Untuk IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("answerVote").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "voteAnswerUp.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("aid="+answerid);
}

function voteQuestionDown(questionid) {
	var xhttp;
	if (window.XMLHttpRequest) {	// Untuk modern browsers
		xhttp = new XMLHttpRequest();
	} else {	// Untuk IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("questionVote").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "voteQuestionDown.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+questionid);
}

function voteQuestionUp(questionid) {
	var xhttp;
	if (window.XMLHttpRequest) {	// Untuk modern browsers
		xhttp = new XMLHttpRequest();
	} else {	// Untuk IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("questionVote").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "voteQuestionUp.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+questionid);
}