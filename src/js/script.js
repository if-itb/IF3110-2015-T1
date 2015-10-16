function validateEmail(email) {
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return filter.test(email);
}

function validateQuestionForm() {
	var a = document.forms["QuestionForm"]["name"].value;
	var b = document.forms["QuestionForm"]["email"].value;
	var c = document.forms["QuestionForm"]["topic"].value;
	var d = document.forms["QuestionForm"]["content"].value;
	var msg = "The following must be filled correctly and not empty:\n";
	var foundError = false;
	
	if (a == null || a == "") {
		msg += "Name\n";
		foundError = true;
	}
	
	if (c == null || c == "") {
		msg += "Topic\n";
		foundError = true;
	}
	
	if (d == null || d == "") {
		msg += "Content\n";
		foundError = true;
	}
	
	if (b == null || b == "") {
		msg += "Email\n";
		foundError = true;
	}
	else {
		if (!validateEmail(b)) {
			msg += "Email address format is not valid";
			foundError = true;
		}
	}
	
	if (foundError) {
		alert(msg);
		return false;
	}
}

function validateAnswerForm() {
	var a = document.forms["AnswerForm"]["name"].value;
	var b = document.forms["AnswerForm"]["email"].value;
	var d = document.forms["AnswerForm"]["content"].value;
	var msg = "The following must be filled correctly and not empty:\n";
	var foundError = false;
	
	if (a == null || a == "") {
		msg += "Name\n";
		foundError = true;
	}
	
	if (d == null || d == "") {
		msg += "Content\n";
		foundError = true;
	}
	
	if (b == null || b == "") {
		msg += "Email\n";
		foundError = true;
	}
	else {
		if (!validateEmail(b)) {
			msg += "Email address format is not valid";
			foundError = true;
		}
	}
	
	if (foundError) {
		alert(msg);
		return false;
	}
}

function confirmDelete() {
	var c = confirm("Are you sure to delete?");
	return c;
}

function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}
