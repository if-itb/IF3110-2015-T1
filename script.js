
//Email  Regex Vaidation
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
};

//Javascript Form Validation
function validateQuestionForm(){
	var formName = "question_form";

	var name = document.forms[formName]["name"].value;
	var email = document.forms[formName]["email"].value;
	var topic= document.forms[formName]["topic"].value;
	var content = document.forms[formName]["content"].value;

	if (name == null || name == ""){
	  alert("Name must be filled");
	  return false;
	}
	else if (!validateEmail(email)){
	  alert("Please enter a valid email address");
	  return false;          
	}
	else if (email == null || email == ""){
	  alert("Email must be filled");
	  return false;
	}
	else if (topic == null || topic == ""){
	  alert("Topic must be filled");
	  return false;
	}
	else if (content == null || content == ""){
	  alert("Content must be filled");
	  return false;
	}

	return true;
};