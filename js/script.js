function voteupquestion(id) {
	var vote = parseInt(document.getElementById("votequestion").innerHTML) + 1;
	document.getElementById("votequestion").innerHTML = vote;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readystate == 4 && xmlhttp.status == 200){
			document.getElementById("votequestion").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "votequestion.php?id="+id+"&vote="+vote, true);
	xmlhttp.send();	
}

function votedownquestion(id) {
	var vote = parseInt(document.getElementById("votequestion").innerHTML) - 1;
	document.getElementById("votequestion").innerHTML = vote;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "votequestion.php?id="+id+"&vote="+vote, true);
	xmlhttp.send();	
}

function voteupanswer(id, qid) {
	var vote = parseInt(document.getElementById("voteanswer"+id).innerHTML) + 1;
	document.getElementById("voteanswer"+id).innerHTML = vote;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "voteanswer.php?id="+id+"&vote="+vote+"&qid="+qid, true);
	xmlhttp.send();	
}

function votedownanswer(id,qid) {
	var vote = parseInt(document.getElementById("voteanswer"+id).innerHTML) - 1;
	document.getElementById("voteanswer"+id).innerHTML = vote;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readystate == 4 && xmlhttp.status == 200){
			document.getElementById("votequestion").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "voteanswer.php?id="+id+"&vote="+vote+"&qid="+qid, true);
	xmlhttp.send();	
}


function validatequestion(){
	var reg = /\w*@\w*\.\w*/;
		if(document.getElementById("topic").value == "" || document.getElementById("name").value == "" || document.getElementById("content").value == "" || document.getElementById("email").value == ""){
			alert("Isi terlebih dahulu seluruh kolom.");
			return false;
	} else {
		if (reg.exec(document.getElementById("email").value) == null){
			console.log(reg.exec(document.getElementById("email")));
			alert("Format email salah.");
			return false;
		} else
		return true;
	}
}

function validateanswer(){
	var reg = /\w*@\w*\.\w*/;
		if(document.getElementById("name").value == "" || document.getElementById("content").value == "" || document.getElementById("email").value == ""){
			alert("Isi terlebih dahulu seluruh kolom.");
			return false;
	} else {
		if (reg.exec(document.getElementById("email").value) == null){
			console.log(reg.exec(document.getElementById("email")));
			alert("Format email salah.");
			return false;
		} else
		return true;
	}
}

function validatedelete(){
	return confirm("Hapus pertanyaan?");
}