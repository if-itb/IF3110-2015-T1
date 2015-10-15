"use strict";
(function(w) {
	var validateRequiredField = function(field, errorMessage) {
		if (field.value == null || field.value == "") {
			field.style.border = "2px solid red";
			var er = document.getElementById('error');
			if (er !== null) {
				er.parentNode.removeChild(er);
			}
			field.parentNode.innerHTML = '<div id="error">' + errorMessage + '</div>' + field.parentNode.innerHTML;
			alert(errorMessage);
			field.focus();
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
		if (!validateRequiredField(theForm.name, "Please insert your name.") ||
			!validateEmailAddress(theForm.email, "Please insert appropriate email address.") ||
			!validateRequiredField(theForm.title, "Please insert question topic.") ||
			!validateRequiredField(theForm.content, "Please explain your question.")) {
				return false;
			}
	}
	window.validateQuestionForm = validateQuestionForm;

	var validateAnswerForm = function(theForm) {
		if (!validateRequiredField(theForm.name, "Please insert name.") ||
			!validateEmailAddress(theForm.email, "Please insert appropriate email address.") ||
			!validateRequiredField(theForm.content, "Please elaborate your answer.")) {
				return false;
			}
	}
	window.validateAnswerForm = validateAnswerForm;
})(window);