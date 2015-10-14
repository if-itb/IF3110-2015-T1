function vote(val, qid) {
	if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
	} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById(qid).getElementsByClassName("vote")[0].getElementsByClassName("vote-count")[0].innerHTML = xmlhttp.responseText;
			}
	}
	xmlhttp.open("GET","controllers/questions_controller.php/?action=vote&vote="+val+"&qid="+qid,true);
	xmlhttp.send();
}