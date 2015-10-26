// Top page on page load
document.body.scrollTop = document.documentElement.scrollTop = 0;

// Delete confirmation
function confirmToDelete() {
	return confirm('Are you sure to delete this question?');
}

// Thread vote
function threadVoteUp(path, threadId) {
	var xhttp = new XMLHttpRequest();
	var url = path + "?controller=thread&action=upvote";
	var params = "params=" + threadId; 
	
	xhttp.open('POST', url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4) {
      if (xhttp.status == 200) {
      	var element = document.getElementById("votes");
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote + 1);
      }
    }
	}

	xhttp.send(params);
}

function threadVoteDown(path, threadId) {
	var xhttp = new XMLHttpRequest();
	var url = path + "?controller=thread&action=downvote";
	var params = "params=" + threadId; 
	
	xhttp.open('POST', url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4) {
      if (xhttp.status == 200) {
      	var element = document.getElementById("votes");
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote - 1);
      }
    }
	}

	xhttp.send(params);
}

// Answer vote
function answerVoteUp(path, answerId) {
	var xhttp = new XMLHttpRequest();
	var url = path + "?controller=answer&action=upvote";
	var params = "params=" + answerId; 
	
	xhttp.open('POST', url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4) {
      if (xhttp.status == 200) {
      	var element = document.getElementById("answer" + answerId);
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote + 1);
      }
    }
	}

	xhttp.send(params);
}

function answerVoteDown(path, answerId) {
	var xhttp = new XMLHttpRequest();
	var url = path + "?controller=answer&action=downvote";
	var params = "params=" + answerId; 
	
	xhttp.open('POST', url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4) {
      if (xhttp.status == 200) {
      	var element = document.getElementById("answer" + answerId);
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote - 1);
      }
    }
	}

	xhttp.send(params);
}

// Email Validation
function validateEmail(email) {
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regex.test(email);
}

// Submit Validation
function fieldFilled(id) {
	var element = document.getElementById(id);

	return element.value.trim() !== "";
}

var threadField = ["user_name", "user_email", "thread_topic", "thread_content"];
var answerField = ["user_name", "user_email", "answer_content"];

function fieldValidation(fields) {
	for (var i = 0; i < fields.length; i++) {
    if (!fieldFilled(fields[i])) {
      alert("You must fill all field.");
      return false;
    }
  }

  var email = document.getElementById("user_email").value;
  if (validateEmail(email)) {
    return true;
  } else {
    alert("Email is not valid");
    return false;
  }
}

// Submit Thread Validation
function submitAnswer() {
	if (fieldValidation(answerField))
		return true;
	return false;
}

// Submit Answer Validation
function submitThread() {
	if (fieldValidation(threadField))
		return true;
	return false;
}