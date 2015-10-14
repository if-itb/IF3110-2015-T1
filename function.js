/*********************** Vote Question **********************/
/* Vote Up Question */
var votesUpQuestion = document.getElementsByClassName("vote-up-question");
for (var i = 0; i < votesUpQuestion.length; i++){
	votesUpQuestion[i].onclick = function() {
		voteUp_Question(this.getAttribute("data-question-id"));
	}
}
/* Vote Down Question */
var votesDownQuestion = document.getElementsByClassName("vote-down-question");
for (var i = 0; i < votesDownQuestion.length; i++) {
	votesDownQuestion[i].onclick = function() {
		voteDown_Question(this.getAttribute("data-question-id"));
	}
}

/*********************** Vote Answer **********************/
/* Vote Up Answer */
var votesUpAnswer = document.getElementsByClassName("vote-up-answer");
for (var i = 0; i < votesUpAnswer.length; i++) {
	votesUpAnswer[i].onclick = function() {
		voteUp_Answer(this.getAttribute("data-question-id"), this.getAttribute("data-answer-id"));
	}
}
/* Vote Down Answer */
var votesDownAnswer = document.getElementsByClassName("vote-down-answer");
for (var i = 0; i < votesDownAnswer.length; i++) {
	votesDownAnswer[i].onclick = function() {
		voteDown_Answer(this.getAttribute("data-question-id"), this.getAttribute("data-answer-id"));
	}
}

/*********************** Ajax Vote Question **********************/
/* Vote Up Question */
function voteUp_Question(id_question) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_vote_question').innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_vote_question').innerHTML = count+1;
		}
	}
	xmlhttp.open("GET", "/Tubes1/vote-up-question.php?id=" + id_question, true);
	xmlhttp.send();
}
/* Vote Down Question */
function voteDown_Question(id_question) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_vote_question').innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_vote_question').innerHTML = count-1;
		}
	}
	xmlhttp.open("GET", "/Tubes1/vote-down-question.php?id=" + id_question, true);
	xmlhttp.send();
}

/*********************** Ajax Vote Answer **********************/
/* Vote Up Answer */
function voteUp_Answer(id_question, id_answer) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_vote_answer' + id_answer).innerHTML);
	console.log(count);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_vote_answer' + id_answer).innerHTML = count+1;
		}
	}
	xmlhttp.open("GET", "/Tubes1/vote-up-answer.php?id=" + id_question + "&id-ans=" + id_answer, true);
	xmlhttp.send();
}
/* Vote Down Answer */
function voteDown_Answer(id_question, id_answer) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_vote_answer' + id_answer).innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_vote_answer' + id_answer).innerHTML = count-1;
		}
	}
	xmlhttp.open("GET", "/Tubes1/vote-down-answer.php?id=" + id_question + "&id-ans=" + id_answer, true);
	xmlhttp.send();
}


/*********************** Validasi **********************/
/* Validasi Question Form */
function validasi_input() {
	var input_name = document.forms["question_form"]["name"].value;
	var input_topic = document.forms["question_form"]["topic"].value;
	var input_content = document.forms["question_form"]["content"].value;
	var input_email = document.forms["question_form"]["email"].value;
	/*** Regex Email ***/
	var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if ((input_name == null  || input_name == "") || (input_topic == null  || input_topic == "") || (input_content== null  || input_content== "")) {
        alert("Every field must be filled out");
        return false;
    }
    // check email
    if (input_email.match(emailRegex) == null) {
    	alert("Invalid Email");
    	return false;
    }
}
/* Validasi Answer Form */
function validasi_inputAnswer() {
	var input_name = document.forms["question_form"]["name"].value;
	var input_content = document.forms["question_form"]["content"].value;
	var input_email = document.forms["question_form"]["email"].value;
	/*** Regex Email ***/
	var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if ((input_name == null  || input_name == "") ||  (input_content== null  || input_content== "")) {
        alert("Every field must be filled out");
        return false;
    }
    // check email
    if (input_email.match(emailRegex) == null) {
    	alert("Invalid Email");
    	return false;
    }
}