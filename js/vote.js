function VotesQUp(qid,aid) {
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("VotesQ").innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?QID="+qid+"&AID="+aid+"&QA=Q&UpDown=Up",true);
	xhttp.send();
}

function VotesQDown(qid,aid) {
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("VotesQ").innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?QID="+qid+"&AID="+aid+"&QA=Q&UpDown=Down",true);
	xhttp.send();
}

function VotesAUp(qid,aid) {
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById(aid).innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?QID="+qid+"&AID="+aid+"&QA=A&UpDown=Up",true);
	xhttp.send();
}

function VotesADown(qid,aid) {
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById(aid).innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?QID="+qid+"&AID="+aid+"&QA=A&UpDown=Down",true);
	xhttp.send();
}