function validateQuestionForm() {
	if (validateName() && validateEmail() && validateTopic()) {
		return true;
	}
	else {
		return false;
	}
}

function validateAnswerForm() {
	if (validateName() && validateEmail()) {
		return true;
	}
	else {
		return false;
	}
}

function nameValidating() {
	var name = document.getElementById('name').value;
	if (name == null || name == "") {
		alert("Please insert your name!");
		return false;
	}
	return true;
}

function emailValidating() {
	var email = document.getElementById('email').value;
	var pattern = "^\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,3}$"; 
	if (!email.match(pattern)) {
		alert("Please correct your email!");
		return false;
	}
	return true;
}

function topicValidating() {
	var topic = document.getElementById('topic').value;
	if (topic == null || topic == "") {
		alert("Please define your question topic!");
		return false;
	}
	return true;
}

function validateDelete(){
	var result = confirm("Are you sure you want to delete?");
	if(result){
		return true;
	}
	else{
		return false;
	}
}

function voteUpdating(int) {
  	if (window.XMLHttpRequest) {
    	xmlhttp=new XMLHttpRequest();
  	} else {
   		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange = function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		document.getElementById("vote").innerHTML = xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","vote.php?vote="+int,true);
  	xmlhttp.send();
}