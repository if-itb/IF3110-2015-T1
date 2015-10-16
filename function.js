function validateAnswerForm() {
    var a = document.forms["answer"]["nama"].value;
    var b = document.forms["answer"]["email"].value;
    var c = document.forms["answer"]["konten"].value;
    if (a == null || a == "") {
        alert("Nama belum terisi");
        return false;
	}
	if (b == null || b == "") {
        alert("Email belum terisi");
        return false;
	}
	if (c == null || c == "") {
        alert("Konten belum terisi");
        return false;
	}
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if (re.test(b) == false){
		alert("Format Email Salah");
		return false;
	}
}

function validateQuestionForm() {
    var a = document.forms["question"]["nama"].value;
    var b = document.forms["question"]["email"].value;
    var c = document.forms["question"]["topik"].value;
    var d = document.forms["question"]["konten"].value;
    if (a == null || a == "") {
        alert("Nama belum terisi");
        return false;
	}
	if (b == null || b == "") {
        alert("Email belum terisi");
        return false;
	}
	if (c == null || c == "") {
        alert("Topik belum terisi");
        return false;
	}
	if (d == null || d == "") {
        alert("Konten belum terisi");
        return false;
	}
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if (re.test(b) == false){
		alert("Format Email Salah");
		return false;
	}
}

function editVote(vote, poin, id) {
	var xmlhttp = new XMLHttpRequest();
	var type;
	if (vote == "pertanyaan") {
		type = "Q";
	} else {
		type = "A"
	}
	xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("votePoin"+type+id).innerHTML = xmlhttp.responseText;
        }
    }
	xmlhttp.open("GET", "vote.php?vote="+vote+"&poin="+poin+"&id="+id, true);
	xmlhttp.send();
}