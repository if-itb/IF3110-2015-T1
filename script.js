function validateEmail(email) {
	var filter= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
	return filter.test(email);
}



function validate_question_form() {
    var x = document.forms["question_form"]["name"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["question_form"]["email"].value;
    if (x == null || x == "") {
        alert("Email must be filled out");
        return false;
    }
    else if (! validateEmail(x)){
    	alert("Please enter correct email address ");
        return false;
    }
    var x = document.forms["question_form"]["question_topic"].value;
    if (x == null || x == "") {
        alert("Question Topic must be filled out");
        return false;
    }
    var x = document.forms["question_form"]["content"].value;
    if (x == null || x == "") {
        alert("Question Content must be filled out");
        return false;
    }

}

function validate_answer_form() {
    var x = document.forms["answer_form"]["name"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["answer_form"]["email"].value;
    if (x == null || x == "") {
        alert("Email must be filled out");
        return false;
    }
    else if (! validateEmail(x)){
    	alert("Please enter correct email address ");
        return false;
    }
    var x = document.forms["answer_form"]["content"].value;
    if (x == null || x == "") {
        alert("Question Content must be filled out");
        return false;
    }

}
function confirmDelete() {
	var delete = confirm("Are you sure want to delete this question ?");
	if (! delete) {
		return false;
	}
}

function add_question_vote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if(xhttp.status == 200) {
				document.getElementById("total_votes2").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open("POST", "add_question_vote.php?id=" + id, true);
	xhttp.send();
}

function substract_question_vote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				document.getElementById("total_votes2").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open("POST", "delete_question_vote.php?id=" + id, true);
	xhttp.send();
}

function add_answer_vote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if(xhttp.status == 200) {
				document.getElementById("total_votes3" + id).innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open("POST", "add_answer_vote.php?id=" + id, true);
	xhttp.send();
}

function substractAnswerVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if(xhttp.status == 200) {
				document.getElementById("total_votes3" + id).innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open("POST", "substract_answer_vote.php?id=" + id, true);
	xhttp.send();
}
