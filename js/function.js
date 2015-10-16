function validasiDelete(){
	if(confirm("Are you sure delete this question")){
		return true;
	}else{
		return false;
	}
}

function validasiForm(form){
	if(form.nama.value) {
		if(validateEmail(form.email.value)){
			if(form.topikpertanyaan.value){
				if(form.pertanyaan.value){
					return true;
				} else {
					alert("silakan isi pertanyaan anda");
					return false;
				}
			} else {
				alert("Topik must  be filled out");
				return false;
			}
		} else {
			alert("Your email invalid!")
			return false;
		}
	} else {
		alert("Name must be filled out");
		return false;
	}
}

function validasiFormJawaban(form){
	if(form.nama.value) {
		if(validateEmail(form.email.value)){			
			if(form.jawaban.value){
				return true;
			} else {
				alert("silakan isi jawaban anda");
				return false;
			}
		} else {
			alert("Your email invalid!")
			return false;
		}
	} else {
		alert("Name must be filled out");
		return false;
	}
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function vote(str1,str2,str3,str4){
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			if(str2 == "pertanyaan"){
				document.getElementById("vote-pertanyaan").innerHTML = xmlhttp.responseText;
			} else {
				document.getElementById("vote-jawaban-"+str4).innerHTML = xmlhttp.responseText;
			}
			
		}
	}
	/*var location="vote.php?id="+str1+"&type="+str2+"&arah="+str3+"&idjawaban="+st4;
	window.location.href = "showquestion.php";*/
	xmlhttp.open("GET","vote.php?id="+str1+"&type="+str2+"&arah="+str3+"&idjawaban="+str4,true);
	xmlhttp.send();
}