// JavaScript Document

function validateQForm() {
	/*Name Validation*/
    var name = document.forms["qForm"]["name"].value;
    if (name == null || name == "") {
        alert("Name must be filled out");
        return false;
    } else if (name.length > 100) {
		alert("Name cannot exceed 100 characters");
		return false;
	}
	/*Email Validation*/
	var email = document.forms["qForm"]["email"].value;
	var re = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
	if (email == null || email == ""){
		alert("Email must be filled out");
		return false;
	} else if (!re.test(email)) {
		alert("Invalid email!");
		return false;
	} else if (email.length > 62) {
		alert("E-mail cannot exceed 62 characters");
		return false;
	}
	/*Topic Validation*/
    var qtopic = document.forms["qForm"]["qtopic"].value;
    if (qtopic == null || qtopic == "") {
        alert("Topic must be filled out");
        return false;
    } else if (qtopic.length > 50) {
		alert("Topic name cannot exceed 50 characters");
		return false;
	}
	
	/*Name Validation*/
    var content = document.forms["qForm"]["content"].value;
    if (content == null || content == "") {
        alert("Content must be filled out");
        return false;
    } else if (content.length > 2000) {
		alert("Content cannot exceed 2000 characters");
		return false;
	}
}

function validateAForm() {
	/*Name Validation*/
    var name = document.forms["qForm"]["name"].value;
    if (name == null || name == "") {
        alert("Name must be filled out");
        return false;
    } else if (name.length > 100) {
		alert("Name cannot exceed 100 characters");
		return false;
	}
	/*Email Validation*/
	var email = document.forms["qForm"]["email"].value;
	var re = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
	if (email == null || email == ""){
		alert("Email must be filled out");
		return false;
	} else if (!re.test(email)) {
		alert("Invalid email!");
		return false;
	} else if (email.length > 62) {
		alert("E-mail cannot exceed 62 characters");
		return false;
	}
	
	/*Name Validation*/
    var content = document.forms["qForm"]["content"].value;
    if (content == null || content == "") {
        alert("Content must be filled out");
        return false;
    } else if (content.length > 2000) {
		alert("Content cannot exceed 2000 characters");
		return false;
	}
}

//Event Listener
var elems = document.getElementsByClassName('delete');
var confirmIt = function (e) {
	if (!confirm('Are you sure you want to delete?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
	elems[i].addEventListener('click', confirmIt, false);
}