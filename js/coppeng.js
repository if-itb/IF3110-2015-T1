function getVote(category, id, val) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			strid = "vote" + category + id;
			document.getElementById(strid).innerHTML = xmlhttp.responseText;
		}
	}
	str = "vote.php?c=" + category + "&id=" + id + "&val=" + val;
	xmlhttp.open('GET',str,true);
	xmlhttp.send();
}

function delete_question(id) {
	if(confirm('Apakah anda ingin menghapus pertanyaan ini ?')) {
		window.location.href='delete.php?id='+id;
	}
}

function validateQuestion() {
	if( document.myForm.Nama.value == "" )
	 {
		alert( "Nama tidak boleh kosong" );
		document.myForm.Nama.focus() ;
		return false;
	 }
	 
	 if( document.myForm.Email.value == "" )
	 {
		alert( "Email tidak boleh kosong" );
		document.myForm.Email.focus() ;
		return false;
	 }
	 emailID = document.myForm.Email.value;
	atpos = emailID.indexOf("@");
	dotpos = emailID.lastIndexOf(".");

	if (atpos < 1 || ( dotpos - atpos < 2 )) 
	{
		alert("Masukkan Email yang benar.")
		document.myForm.Email.focus() ;
		return false;
	}
	 if( document.myForm.Topik.value == "" )
	 {
		alert( "Topik tidak boleh kosong." );
		document.myForm.Topik.focus() ;
		return false;
	 }
	 if( document.myForm.Konten.value == "" )
	 {
		alert( "Konten pertanyaan tidak boleh kosong." );
		document.myForm.Konten.focus() ;
		return false;
	 }
    return true;    
}

function validateAnswer() {
	if( document.myForm.Nama.value == "" )
	 {
		alert( "Nama tidak boleh kosong" );
		document.myForm.Nama.focus() ;
		return false;
	 }
	 
	 if( document.myForm.Email.value == "" )
	 {
		alert( "Email tidak boleh kosong" );
		document.myForm.Email.focus() ;
		return false;
	 }
	emailID = document.myForm.Email.value;
	atpos = emailID.indexOf("@");
	dotpos = emailID.lastIndexOf(".");

	if (atpos < 1 || ( dotpos - atpos < 2 )) 
	{
		alert("Masukkan Email yang benar.")
		document.myForm.Email.focus() ;
		return false;
	}
	 if( document.myForm.Jawaban.value == "" )
	 {
		alert( "Jawaban tidak boleh kosong." );
		document.myForm.Jawaban.focus() ;
		return false;
	 }
    return true;    
}