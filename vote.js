function voteUpQuestion(rowID) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("numvote_q").innerHTML=parseInt(document.getElementById("numvote_q").innerHTML) + 1;;
		}
	}
	xmlhttp.open("POST","voteUpQuestion.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("id="+rowID);
}

function voteDownQuestion(rowID) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("numvote_q").innerHTML=parseInt(document.getElementById("numvote_q").innerHTML) - 1;
		}
	}
	xmlhttp.open("POST","voteDownQuestion.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("id="+rowID);
}

function voteUpAnswer(rowID) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("numvote_a_"+rowID).innerHTML=parseInt(document.getElementById("numvote_a_"+rowID).innerHTML) + 1;
		}
	}
	xmlhttp.open("POST","voteUpAnswer.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("id="+rowID);
}

function voteDownAnswer(rowID) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("numvote_a_"+rowID).innerHTML=parseInt(document.getElementById("numvote_a_"+rowID).innerHTML) - 1;;
		}
	}
	xmlhttp.open("POST","voteDownAnswer.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("id="+rowID);
}
