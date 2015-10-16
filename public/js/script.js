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