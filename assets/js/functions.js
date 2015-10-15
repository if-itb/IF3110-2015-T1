function vote(val, type, qid, aid, directurl) {
	if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
	} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (type == "question") {
					document.getElementById(qid).getElementsByClassName("vote")[0].getElementsByClassName("vote-count")[0].innerHTML = xmlhttp.responseText;
				} else if (type == "answer") {
					document.getElementById(aid).getElementsByClassName("vote")[0].getElementsByClassName("vote-count")[0].innerHTML = xmlhttp.responseText;
				}
			}
	}
	if (type == "question") {
		xmlhttp.open("GET","controllers/questions_controller.php/?action=vote&vote="+val+"&qid="+qid,true);
	} else if (type == "answer") {
		xmlhttp.open("GET","controllers/answers_controller.php/?action=vote&vote="+val+"&qid="+qid+"&aid="+aid,true);
	}
	xmlhttp.send();
	if(directurl){
		window.location.href = directurl;
	}
}