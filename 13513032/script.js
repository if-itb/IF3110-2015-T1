function confirmDeletion(questionid) {
	if (confirm("Are you sure to delete this question?")) {
		window.location.href="index.php?id=" + questionid;
	}
}

function validateAnswerForm(formName, name, content) {
	var nameField = document.forms[formName][name].value;
	var contentField = document.forms[formName][content].value;
	if (nameField == null || contentField == null || nameField == "" || contentField == "") {
		alert("All field must be filled out");
		return false;
	}
}

function validateEmail(email) {
	var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (!regex.test(email)) {
    	alert("Email is invalid");
    }
}

function validateSearchForm(formName, search) {
	var searchField = document.forms[formName][search].value;
	if (searchField == null || searchField == "") {
		alert("Search field must be filled out");
		return false;
	}
}

function validateQuestionForm(formName, name, topic, content) {
	var nameField = document.forms[formName][name].value;
	var topicField = document.forms[formName][topic].value;
	var contentField = document.forms[formName][content].value;
	if (nameField == null || topicField == null || contentField == null || nameField == "" || topicField == "" || contentField == "") {
		alert("All field must be filled out");
		return false;
	}
}