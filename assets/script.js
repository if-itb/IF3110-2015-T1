
function checkName(txtName){
	//nama
	
	if(txtName.length<=0){
		alert("Nama tidak boleh kosong");
		return false;
	} else {
		return true;
	}
}

function checkEmail(txtEmail){
	//email
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
	} else {
		return true;
	}
}

function checkContent(txtContent){
	//content
	if(txtContent.length<=0){
		alert("Content tidak boleh kosong");
		return false;
	} else {
		return true;
	}
}

function checkTopic(txtTopic){
	//content
	if(txtTopic.length<=0){
		alert("Topic tidak boleh kosong");
		return false;
	} else {
		return true;
	}
}

function chkValidityAnswer(){
	var txtName = document.getElementById('name').value;
	var valid = checkName(txtName);
	
	if(valid){//checkEmail
		var txtEmail = document.getElementById('email').value;
		valid = checkEmail(txtEmail);
	}

	if(valid){//checkContent
		var txtContent = document.getElementById('content').value;
		valid = checkContent(txtContent);
	}
	if(!valid) return false;
}

function chkValidityQuestion(){
				
	var txtName = document.getElementById('name').value;
	var valid = checkName(txtName);
	
	if(valid){//checkEmail
		var txtEmail = document.getElementById('email').value;
		valid = checkEmail(txtEmail);
	}
	
	if(valid){//checkTopic
		var txtTopic = document.getElementById('topic').value;
		valid = checkTopic(txtTopic);
	}

	if(valid){//checkContent
		var txtContent = document.getElementById('content').value;
		valid = checkContent(txtContent);
	}
	if(!valid) return false;
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


function delQuestion(id,isList) {
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
				if(isList){
					document.getElementById("question-"+id).innerHTML="";
				} else {
					document.getElementById("view-question").innerHTML="Question Deleted. Go to <a href='index.php'>home</a>";
				}
			}
		}
		xmlhttp.open("POST","functions.php?del=" + id,true);
		xmlhttp.send();
    } else {
        //don't delete question
    }
}