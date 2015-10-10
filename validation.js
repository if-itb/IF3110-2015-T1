function isNotValid(x) {
	return x==null || x=="" ;
}

function isEmailvalid(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateForm() {
	var name = document.forms["inputForm"]["asker_name"].value;
	var email = document.forms["inputForm"]["asker_email"].value;
	var topic = document.forms["inputForm"]["question_topic"].value;
	var content = document.forms["inputForm"]["content"].value;
	if(isNotValid(name)) {
		alert("Name must be filled out");
		return false;
	} else if(isNotValid(email)) {
		alert("Email must be filled out");
		return false;
	} else if(!isEmailvalid(email)) {
		alert("Email is not valid");
		return false;
	} else if(isNotValid(topic)) {
		alert("Question Topic must be filled out");
		return false;
	} else if(isNotValid(content)) {
		alert("Content must be filled out");
		return false;
	} 
	return true;
}

function validateAnswerForm() {
	var name = document.forms["answerForm"]["answerer_name"].value;
	var email = document.forms["answerForm"]["answerer_email"].value;
	var content = document.forms["answerForm"]["content"].value;
	if(isNotValid(name)) {
		alert("Name must be filled out");
		return false;
	} else if(isNotValid(email)) {
		alert("Email must be filled out");
		return false;
	} else if(!isEmailvalid(email)) {
		alert("Email is not valid");
		return false;
	} else if(isNotValid(content)) {
		alert("Content must be filled out");
		return false;
	} 
	return true;
}