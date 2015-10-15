/*********************** Vote Question **********************/
/* Vote Up Question */
var votesUpQuestion = document.getElementsByClassName("vote-question-up");
for (var i = 0; i < votesUpQuestion.length; i++){
	votesUpQuestion[i].onclick = function() {
		voteUp_Question(this.getAttribute("id-question"));
	}
}
/* Vote Down Question */
var votesDownQuestion = document.getElementsByClassName("vote-question-down");
for (var i = 0; i < votesDownQuestion.length; i++) {
	votesDownQuestion[i].onclick = function() {
		voteDown_Question(this.getAttribute("id-question"));
	}
}

/*********************** Vote Answer **********************/
/* Vote Up Answer */
var votesUpAnswer = document.getElementsByClassName("vote-answer-up");
for (var i = 0; i < votesUpAnswer.length; i++) {
	votesUpAnswer[i].onclick = function() {
		voteUp_Answer(this.getAttribute("id-question"), this.getAttribute("id-answer"));
	}
}
/* Vote Down Answer */
var votesDownAnswer = document.getElementsByClassName("vote-answer-down");
for (var i = 0; i < votesDownAnswer.length; i++) {
	votesDownAnswer[i].onclick = function() {
		voteDown_Answer(this.getAttribute("id-question"), this.getAttribute("id-answer"));
	}
}

/*********************** Ajax Vote Question **********************/
/* Vote Up Question */
function voteUp_Question(id_question) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_question').innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_question').innerHTML = count+1;
		}
	}
	xmlhttp.open("GET", "/WBD/vote-question-up.php?id=" + id_question, true);
	xmlhttp.send();
}
/* Vote Down Question */
function voteDown_Question(id_question) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_question').innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_question').innerHTML = count-1;
		}
	}
	xmlhttp.open("GET", "/WBD/vote-question-down.php?id=" + id_question, true);
	xmlhttp.send();
}

/*********************** Ajax Vote Answer **********************/
/* Vote Up Answer */
function voteUp_Answer(id_question, id_answer) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_answer' + id_answer).innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_answer' + id_answer).innerHTML = count+1;
		}
	}
	xmlhttp.open("GET", "/WBD/vote-answer-up.php?id=" + id_question + "&answer_id=" + id_answer, true);
	xmlhttp.send();
}
/* Vote Down Answer */
function voteDown_Answer(id_question, id_answer) {
	var xmlhttp = new XMLHttpRequest();
	var count = parseInt(document.getElementById('count_answer' + id_answer).innerHTML);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('count_answer' + id_answer).innerHTML = count-1;
		}
	}
	xmlhttp.open("GET", "/WBD/vote-answer-down.php?id=" + id_question + "&answer_id=" + id_answer, true);
	xmlhttp.send();
}
