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

function voteQuestion(state){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		ajaxRequest = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('question_vote');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	
	var question_id = document.getElementsByName('id')[0].value;
	var queryString = "?q_id=" + question_id ;

	if (state == 'upvote'){
		queryString += "&vote=up";
	} else {
		queryString += "&vote=down";
	}

	ajaxRequest.open("GET", "question.php" + queryString, true);
	ajaxRequest.send(null); 
}

function voteAnswer(state, a_id){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		ajaxRequest = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById(a_id);
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	
	var queryString = "?a_id=" + a_id ;

	if (state == 'upvote'){
		queryString += "&vote=up";
	} else {
		queryString += "&vote=down";
	}

	ajaxRequest.open("GET", "question.php" + queryString, true);
	ajaxRequest.send(null); 
}