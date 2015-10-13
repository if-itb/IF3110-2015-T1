// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: validateinput.js
// Keterangan	: Berisi javascript untuk validasi input question dan answer,
//				  serta email. Selain itu juga termasuk disini kode AJAX untuk
//				  Vote

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateAskinput()
{
	var Name = 	document.forms["ask"]["name"].value;
	var Email = document.forms["ask"]["email"].value;
	var Topic = document.forms["ask"]["topic"].value;
	var Content = document.forms["ask"]["content"].value;

	if ((Name === null) || (Email === null) || (Topic === null) || (Content === null) || (Name === "") || (Email === "") || (Topic === "") || (Content === ""))
	{
		alert("All fields must be filled out!");
		return false;
	}
	
	if(!validateEmail(document.getElementById("email").value))
	{
		alert('Please enter a valid email address.');
		return false;
	}	
}

function validateAnswerinput()
{
	var Name = 	document.forms["answerform"]["name"].value;
	var Email = document.forms["answerform"]["email"].value;
	var Content = document.forms["answerform"]["content"].value;

	if ((Name === null) || (Email === null) || (Content === null) || (Name === "") || (Email === "") || (Content === ""))
	{
		alert("All fields must be filled out!");
		return false;
	}
	
	if(!validateEmail(document.getElementById("email").value))
	{
		alert('Please enter a valid email address.');
		return false;
	}	
}

function vote(id, type, act)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById(type+"-"+id).innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "vote.php?id="+id+"&type="+type+"&act="+act, true);
  xhttp.send();
} 