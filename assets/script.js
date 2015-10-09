
function chkValidity(){

	//nama
	var txtName = document.getElementById('name').value;
	if(txtName.length<=0){
		alert("Nama tidak boleh kosong");
		return false;
	}

	//email
	var txtEmail = document.getElementById('email').value;
	if(txtEmail.length<=0){
		alert("Email tidak boleh kosong");
		return false;
	}
	//validate email format
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var emailValid = re.test(txtEmail);
	if(!emailValid){
		alert("Email tidak valid");
		return false;
	}
	
	//topic
	var txtTopic = document.getElementById('topic').value;
	if(txtTopic.length<=0){
		alert("Topic tidak boleh kosong");
		return false;
	}
	
	//content
	var txtContent = document.getElementById('content').value;
	if(txtContent.length<=0){
		alert("Content tidak boleh kosong");
		return false;
	}
	
	return true;
}

function chkValidityQuestion(){
				
	//nama
	var txtName = document.getElementById('name').value;
	if(txtName.length<=0){
		alert("Nama tidak boleh kosong");
		return false;
	}

	//email
	var txtEmail = document.getElementById('email').value;
	if(txtEmail.length<=0){
		alert("Email tidak boleh kosong");
		return false;
	}
	//validate email format
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var emailValid = re.test(txtEmail);
	if(!emailValid){
		alert("Email tidak valid");
		return false;
	}

	//content
	var txtContent = document.getElementById('content').value;
	if(txtContent.length<=0){
		alert("Content tidak boleh kosong");
		return false;
	}

	return true;
}

function vote(upDown, type, id) {
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if(type == 'q'){	
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4)
			{
				document.getElementById("q-"+id).innerHTML=xmlhttp.responseText;
			}
		}
		if(upDown == 'up'){
			xmlhttp.open("POST","functions.php?f=voteQuestionUp&id=" + id,true);
		} else {
			xmlhttp.open("POST","functions.php?f=voteQuestionDown&id=" + id,true);
		}
		xmlhttp.send();
	} else { //answer
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4)
			{
				document.getElementById("a-"+id).innerHTML=xmlhttp.responseText;
			}
		}
		if(upDown == 'up'){
			xmlhttp.open("POST","functions.php?f=voteAnswerUp&id=" + id,true);
		} else {
			xmlhttp.open("POST","functions.php?f=voteAnswerDown&id=" + id,true);
		}
		xmlhttp.send();
	}
}


function delQuestion(id) {
    var txt;
    var r = confirm("Apakah Anda mau menghapus pertanyaan ini?");
    if (r == true) {
        //delete Question
		var xmlhttp;
		if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		} else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4)
			{
				document.getElementById("question-"+id).innerHTML="";
			}
		}
		xmlhttp.open("POST","functions.php?del=" + id,true);
		xmlhttp.send();
    } else {
        //don't delete question
    }
}