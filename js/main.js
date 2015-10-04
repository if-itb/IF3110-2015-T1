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
		if (typeof id === 'undefined') return;

		if (confirm("Are you sure to delete this question?")) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  location.href = "./index.php";
				}
			}
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
		var apos=field.value.indexOf("@");
		var dotpos=field.value.lastIndexOf(".");
		if (apos < 1 || dotpos - apos < 2) {
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

	var validateQuestionForm = function(theForm) {
		if (!validateRequiredField(theForm.name, "Please insert name.") ||
			!validateEmailAddress(theForm.email, "Please insert appropriate email address.") ||
			!validateRequiredField(theForm.title, "Please insert question topic.") ||
			!validateRequiredField(theForm.content, "Please elaborate on question content.")) {
				return false;
			}
	}
	window.validateQuestionForm = validateQuestionForm;

	var validateAnswerForm = function(theForm) {
		if (!validateRequiredField(theForm.name, "Please insert name.") ||
			!validateEmailAddress(theForm.email, "Please insert appropriate email address.") ||
			!validateRequiredField(theForm.content, "Please elaborate on question content.")) {
				return false;
			}
	}
	window.validateAnswerForm = validateAnswerForm;
})(window);