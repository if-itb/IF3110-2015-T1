"use strict";
(function(w) {
	var voteUp = function(id, db) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById(db + "-vote-count-" + id).innerHTML = xhttp.responseText;
			}
		}
		xhttp.open("POST", "./ajax/vote.php", true);
		xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		xhttp.send("action=up&id=" + id + "&db=" + db);
	}
	window.voteUp = voteUp;

	var voteDown = function(id, db) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById(db + "-vote-count-" + id).innerHTML = xhttp.responseText;
			}
		}
		xhttp.open("POST", "./ajax/vote.php", true);
		xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		xhttp.send("action=down&id=" + id + "&db=" + db);
	}
	window.voteDown = voteDown;
	
	var deleteQuestion = function(id) {
		

		if (confirm("Are you sure you want to delete this question?")) {
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "./ajax/delete.php", true);
			xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			xhttp.send("id=" + id);
		}
	}
	window.deleteQuestion = deleteQuestion;
	
	var validateRequiredField = function(field, errorMessage) {
		if (field.value == null || field.value == "") {
			field.style.border = "1px solid red";
			var er = document.getElementById('error');
			if (er !== null) {
				er.parentNode.removeChild(er);
			}
			field.parentNode.innerHTML = '<div id="error">' + errorMessage + '</div>' + field.parentNode.innerHTML;
			return false;
		} else {
			field.style.border = "";
		}
		return true;
	}

	var validateEmailAddress = function(field, errorMessage) {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (!re.test(field.value)) {
			field.style.border = "1px solid red";
			var er = document.getElementById('error');
			if (er !== null) {
				er.parentNode.removeChild(er);
			}
			field.parentNode.innerHTML = '<div id="error">' + errorMessage + '</div>' + field.parentNode.innerHTML;
			return false;
		} else {
			field.style.border = "";
		}
		return true;
	}

	var validateQuestionForm = function(Form) {
		if (!validateRequiredField(Form.name, "Please insert name.") ||
			!validateEmailAddress(Form.email, "Please insert appropriate email address.") ||
			!validateRequiredField(Form.title, "Please insert question topic.") ||
			!validateRequiredField(Form.content, "Please insert content.")) {
				return false;
			}
	}
	window.validateQuestionForm = validateQuestionForm;

	var validateAnswerForm = function(Form) {
		if (!validateRequiredField(Form.name, "Please insert name.") ||
			!validateEmailAddress(Form.email, "Please insert appropriate email address.") ||
			!validateRequiredField(Form.content, "Please insert content.")) {
				return false;
			}
	}
	window.validateAnswerForm = validateAnswerForm; 
	
})(window);