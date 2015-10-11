function confirmDelete() {
	return confirm("Are you sure to delete this question ?");
}

function incrementQuestionVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById('questionVote').innerHTML = xhttp.responseText;
		}
    }
	xhttp.open("GET", "vote.php?move=up&target=questionVote&id=" + id, true);
	xhttp.send();
}

function decrementQuestionVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById('questionVote').innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?move=down&target=questionVote&id=" + id, true);
	xhttp.send();
}

function incrementAnswerVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			var target = 'answerVote' + id; 
			document.getElementById(target).innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?move=up&target=answerVote&id=" + id, true);
	xhttp.send();
}

function decrementAnswerVote(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			var target = 'answerVote' + id;
			document.getElementById(target).innerHTML = xhttp.responseText;
		}
    }
	xhttp.open("GET", "vote.php?move=down&target=answerVote&id=" + id, true);
	xhttp.send();
}

function test(s) {
	alert(s);
}