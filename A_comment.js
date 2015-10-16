function addComment(id){
	var xmlHttp = new XMLHttpRequest();
	var nama = document.getElementById('nama').value;
	var email = document.getElementById('email').value;
	var komen = document.getElementById('komen').value;
	
	if (nama != "" && emailValidation(email) && komen != ""){
		var url = "A_add_comment.php";
		url = url + "?post_id=" + id;
		url = url + "&nama=" + nama;
		url = url + "&email=" + email;
		url = url + "&komen=" + komen;
	
	
	xmlHttp.onreadystatechange = function(){
		loaderAppear();
		if(xmlHttp.readyState==4 && xmlHttp.status==200){
			document.getElementById("komenList").innerHTML = xmlHttp.responseText;
			document.getElementById('nama').value = "";
			document.getElementById('email').value = "";
			document.getElementById('komen').value = "";
			loadComment(id);
		}
	}
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	}
	
	else { alert("Form belum benar atau masih kosong.");
}
}

function emailValidation(email){
 var pat = /[\w.-]+@[\w.-]+\.\w+/g;
 var res = pat.test(email);
 if (res){
	return true;
 }
 else{return false;}
}


function votecomment(){
	var xmlHttp = new XMLHttpRequest();
	var url = "votecomment.php"; //GANTI JADI url ajax votepost.php
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("votes").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
	
	//echo votes; di ajax uppost.php
}


function loadComment(id){
	var xmlHttp = new XMLHttpRequest();
	var url = "A_load_comment.php";
	url = url + "?post_id=" + id;
	
	var comment = document.getElementById('komenList');
	xmlHttp.onreadystatechange = function(){
		loaderAppear();
		if(xmlHttp.readyState==4 && xmlHttp.status==200){
			document.getElementById("komenList").innerHTML = xmlHttp.responseText;
	}
	}
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function loaderAppear(){
document.getElementById("komenList").innerHTML = "<center><img src='assets/img/load.gif'></center>";
}