function validateDelete() {
	var result = confirm("Want to delete?");
	if (result) {
		return true;
	} else {
		return false;
	}
    
}

function validateAnsForm() {
	var name = document.forms["answerForm"]["name"].value;
	var email = document.forms["answerForm"]["email"].value;
	var content = document.forms["answerForm"]["content"].value;

	if (name == null || name == "") {
		alert("Did you forget to insert your name?");
		return false;
	} else if (email == null || email == "") {
		alert("Hey, what's your email?");
		return false;
	} else if (content == null || content == "") {
		alert("So what is/are your question?");
		return false;
	} else if ( !validateEmail(email) ) {
		alert("Your email is invalid");
		return false;
	}
	return true;
}

function validateForm(){
	var name = document.forms["questForm"]["name"].value;
	var email = document.forms["questForm"]["email"].value;
	var topic = document.forms["questForm"]["topic"].value;
	var content = document.forms["questForm"]["content"].value;

	if (name == null || name == "") {
		alert("Did you forget to insert your name?");
		return false;
	} else if (email == null || email == "") {
		alert("Hey, what's your email?");
		return false;
	} else if (topic == null || topic == "") {
		alert("What is the topic of your question?");
		return false;
	} else if (content == null || content == "") {
		alert("So what is/are your question?");
		return false;
	} else if ( !validateEmail(email) ) {
		alert("Your email is invalid");
		return false;
	}
	return true;
}

function validateEmail(email) {
	var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return regex.test(email);
}