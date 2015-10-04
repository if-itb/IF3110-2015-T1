


//Javascript form Validation
function validateQuestionForm(){
	var name = document.forms["q_form"]["name"].value;
	var email = document.forms["q_form"]["email"].value;
	var topic= document.forms["q_form"]["topic"].value;
	var content = document.forms["q_form"]["content"].value;

	if (name == null || name = ""){
		alert("Name must be filled");
		return false;
	}
	else if (email == null || email = ""){
		alert("email must be filled");
		return false;
	}
	else if (topic == null || topic = ""){
		alert("topic must be filled");
		return false;
	}
	else if (content == null || content = ""){
		alert("content must be filled");
		return false;
	}

	//return true;
}