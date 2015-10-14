function confirmDelete() {
	return confirm('Do you really want to dete the question?');
}


function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}

function validateQuestionForm() {
	var name = document.forms["question_form"]["name"].value;
	var email = document.forms["question_form"]["email"].value;
	var topic = document.forms["question_form"]["topic"].value;
	var content = document.forms["question_form"]["question"].value;
	var response = "";

	if (name == null || name == ""){
		response += "Name must be filled out!\n\n";
	}

	if (email == null || email == ""){
		response += "Email must be filled out!\n\n";
	} else {
		if (!validateEmail(email)){
			response += "Email address is NOT valid!\n\n";
		}
	}

	if (topic == null || topic == ""){
		response += "Topic must be filled out!\n\n";
	}
	
	if (content == null || content == ""){
		response += "Content must be filled out!\n\n";
	}
	
	if (response != ""){
		alert(response);
		return false;
	}
}

function validateAnswerForm() {
	var name = document.forms["answer_form"]["name"].value;
	var email = document.forms["answer_form"]["email"].value;
	var content = document.forms["answer_form"]["answer"].value;
	var response = "";

	if (name == null || name == ""){
		response += "Name must be filled out!\n\n";
	}

	if (email == null || email == ""){
		response += "Email must be filled out!\n\n";
	} else {
		if (!validateEmail(email)){
			response += "Email address is NOT valid!\n\n";
		}
	}
	
	if (content == null || content == ""){
		response += "Content must be filled out!\n\n";
	}
	
	if (response != ""){
		alert(response);
		return false;
	}
}