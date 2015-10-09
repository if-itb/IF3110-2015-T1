function afterVote(xhttp, updateFieldId){
	if (xhttp.readyState == 4 && xhttp.status == 200) {
		var a = document.getElementById(updateFieldId);
		a.innerHTML = xhttp.responseText;
	}else if (xhttp.status>=400){
		alert("xhttp.status = " + xhttp.status + xhttp.responseText);
	}
}

function upVoteAnswer( qid, aid, updateFieldId){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){afterVote(xhttp,updateFieldId);}
	xhttp.open("POST", "vote.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("qid="+qid+"&aid="+aid+"&up=true");

}

function downVoteAnswer( qid, aid, updateFieldId){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){afterVote(xhttp,updateFieldId);}
	xhttp.open("POST", "vote.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("qid="+qid+"&aid="+aid+"&up=false");


}

function upVoteQuestion( qid, updateFieldId){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){afterVote(xhttp,updateFieldId);}

	xhttp.open("POST", "vote.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("qid="+qid+"&up=true");

}

function downVoteQuestion( qid, updateFieldId){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){afterVote(xhttp,updateFieldId);}
	xhttp.open("POST", "vote.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("qid="+qid+"&up=false");


}
