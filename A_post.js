function addPost(id){
	var xmlHttp = new XMLHttpRequest();
	var nama = document.getElementById('nama').value;
	var email = document.getElementById('email').value;
	var judul = document.getElementById('judul').value;
	//var tanggal = document.getElementById('tanggal').value; //
	var konten = document.getElementById('konten').value;
	
	if (nama != "" && emailValidation(email) && konten != ""){
		var url = "A_new_post_process.php";
		url = url + "?post_id=" + id;
		url = url + "&nama=" + nama;
		url = url + "&email=" + email;
		url = url + "&judul=" + judul;
		//url = url + "&tanggal=" + tanggal;
		url = url + "&konten=" + konten;
	
	
	xmlHttp.onreadystatechange = function(){
		loaderAppear();
		if(xmlHttp.readyState==4 && xmlHttp.status==200){
			document.getElementById("postList").innerHTML = xmlHttp.responseText;
			document.getElementById('nama').value = "";
			document.getElementById('email').value = "";
			document.getElementById('judul').value = "";
			//document.getElementById('tanggal').value = "";
			document.getElementById('konten').value = "";
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

function votepost(){
	var xmlHttp = new XMLHttpRequest();
	var url = "votepost.php"; //GANTI JADI url ajax votepost.php
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("votes").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
	
	//echo votes; di ajax uppost.php
}



function loadPost(id){
	var xmlHttp = new XMLHttpRequest();
	var url = "A_load_post.php";
	url = url + "?post_id=" + id;
	
	var comment = document.getElementById('postList');
	xmlHttp.onreadystatechange = function(){
		loaderAppear();
		if(xmlHttp.readyState==4 && xmlHttp.status==200){
			document.getElementById("postList").innerHTML = xmlHttp.responseText;
	}
	}
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function loaderAppear(){
document.getElementById("komenList").innerHTML = "<center><img src='assets/img/load.gif'></center>";
}
