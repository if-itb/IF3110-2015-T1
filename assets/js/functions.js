function vote(val, type, qid, aid) {
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
					document.getElementById("q-"+qid).getElementsByClassName("vote")[0].innerHTML = xmlhttp.responseText;
				} else if (type == "answer") {
					document.getElementById("a-"+aid).getElementsByClassName("vote")[0].innerHTML = xmlhttp.responseText;
				}
			}
	}
	if (type == "question") {
		xmlhttp.open("GET","controllers/questions_controller.php/?action=vote&vote="+val+"&qid="+qid,true);
	} else if (type == "answer") {
		xmlhttp.open("GET","controllers/answers_controller.php/?action=vote&vote="+val+"&qid="+qid+"&aid="+aid,true);
	}
	xmlhttp.send();
}

function checkForm(type) {
	var authorname = document.getElementById("authorname").value;
	var authoremail = document.getElementById("authoremail").value;
	if(type != 'answer'){
		var topic = document.getElementById("topic").value;
	}
	var content = document.getElementById("content").value;

	if (authorname == '' || authoremail == '' || (topic == '' &&  type != 'answer')|| content == '') {
		alert("Tidak boleh kosong!");
	} else {

		var authornamecheck = document.getElementById("authornamecheck");
		var authoremailcheck = document.getElementById("authoremailcheck");
		if(type != 'answer'){
			var topiccheck = document.getElementById("topiccheck");
		}
		var contentcheck = document.getElementById("contentcheck");
		
		if (authornamecheck.innerHTML == 'Tidak boleh kosong!' || contentcheck.innerHTML == 'Tidak boleh kosong!' || authoremailcheck.innerHTML == 'Invalid email') {
			alert("Isikan dengan data yang valid");
		} else {
			
			document.getElementById("qform").submit();
		}
	}
}

function validate(field, query) {
	var xmlhttp;
	if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else { // for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(field+"check").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "controllers/questions_controller.php/?field=" + field + "&query=" + query, false);
	xmlhttp.send();
}