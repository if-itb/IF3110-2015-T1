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

function vote(id, vType, conType){
	/*if (id == "" || id == null || type == "" || type == null) {
		return;
	} else {
		*/ if (window.XMLHttpRequest)  {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var i = 0;
			if (vType == "vUp") {
				i = 1;
			} else if (vType == "vDown") {
				i = -1;
			}
	    if (conType == "question") {
	    	document.getElementById("voteCount_q").innerHTML = xmlhttp.responseText;
	    } else if (conType = "answer") {
	    	document.getElementById("voteCount_a"+id).innerHTML = xmlhttp.responseText;
	    }	
	    }

	  }
	  xmlhttp.open("GET", "vote.php?id=" + id + "&vType=" + vType + "&conType=" + conType, true);
	  xmlhttp.send();
}