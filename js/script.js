/* Nama file 	: script.js */
/* Nama/NIM		: Ahmad Darmawan (13513096) */
/* Deskripsi	: File ini berisi kumpulan script seperti validasi input dan inisialisasi ajax */

function validateEmail(email) {
	/* Fungsi validasi apakah masukan email sesuai format */
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateQuestionInput() {
	/* Fungsi validasi apakah setiap field pada form question telah diisi atau tidak serta memvalidasi masukan email */
	var Name = 	document.forms["fquestion"]["name"].value;
	var Email = document.forms["fquestion"]["email"].value;
	var Topic = document.forms["fquestion"]["topic"].value;
	var Content = document.forms["fquestion"]["content"].value;

	if ((Name === "") || (Email === "") || (Topic === "") || (Content === "") || (Name === null) || (Email === null) || (Topic === null) || (Content === null))
	{
		alert("Fill all fields!");
		return false;
	}
	
	if(!validateEmail(document.getElementById("email").value))
	{
		alert("Your email address seems invalid!");
		return false;
	}	
}

function validateAnswerInput() {
	/* Fungsi validasi apakah setiap field pada form answer telah diisi atau tidak serta memvalidasi masukan email */
	var Name = 	document.forms["fanswer"]["name"].value;
	var Email = document.forms["fanswer"]["email"].value;
	var Content = document.forms["fanswer"]["content"].value;

	if ((Name === "") || (Email === "") || (Content === "") || (Name === null) || (Email === null) || (Content === null))
	{
		alert("Fill all fields!");
		return false;
	}
	
	if(!validateEmail(document.getElementById("email").value))
	{
		alert("Your email address seems invalid!");
		return false;
	}
}

/*AJAX*/
function getVote(id, type, action) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(type+"_"+id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?id="+id+"&type="+type+"&action="+action,true);
  xmlhttp.send();
}