

function voteQuestion(id){
	if (id==""||id==null){
		return;
	} else {
		if (window.XMLHttpRequest){
		//create XHR
			xmlhttp = new XMLHttpRequest();
		} else {//For IE5,6
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}

		xmlhttp.onreadystatechange= function(){
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
				document.getElementById("num_question_vote").innerHTML = xmlhttp.responseText;
				console.log(xmlhttp.responseText);
			}
	}

	xmlhttp.open("GET","vote.php?idq="+id,true);
	xmlhttp.send();
}

function downVoteQuestion(id){
	if (id==""||id==null){
		return;
	} else {
		if (window.XMLHttpRequest){
		//create XHR
			xmlhttp = new XMLHttpRequest();
		} else {//For IE5,6
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}

		xmlhttp.onreadystatechange= function(){
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
				document.getElementById("num_question_vote").innerHTML = xmlhttp.responseText;
				console.log(xmlhttp.responseText);
			}
	}

	xmlhttp.open("GET","downVote.php?idq="+id,true);
	xmlhttp.send();
}

function voteAns(id){
	if (id==""||id==null){
		return;
	} else {
		if (window.XMLHttpRequest){
		//create XHR
			xmlhttp = new XMLHttpRequest();
		} else {//For IE5,6
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}

		xmlhttp.onreadystatechange= function(){
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
				document.getElementById("num_ans_vote_"+id).innerHTML = xmlhttp.responseText;
				console.log(xmlhttp.responseText);
			}
	}

	xmlhttp.open("GET","voteAns.php?ida="+id,true);
	xmlhttp.send();
}

function downVoteAns(id){
	if (id==""||id==null){
		return;
	} else {
		if (window.XMLHttpRequest){
		//create XHR
			xmlhttp = new XMLHttpRequest();
		} else {//For IE5,6
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}

		xmlhttp.onreadystatechange= function(){
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
				document.getElementById("num_ans_vote_"+id).innerHTML = xmlhttp.responseText;
				console.log(xmlhttp.responseText);
			}
	}

	xmlhttp.open("GET","downVoteAns.php?ida="+id,true);
	xmlhttp.send();
}