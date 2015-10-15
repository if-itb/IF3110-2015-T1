var Name = 0;
var Email = 0;
var Topic = 0;
var Content = 0;

function focusName() {
	if (Name == 0){
		document.getElementById("Name").value = "";
		document.getElementById("Name").style.color = "#000000";
		Name = 1;
	}
}

function blurName() {
	var X = document.getElementById("Name").value;
	if (X == "") {
		Name = 0;
		document.getElementById("Name").value = "Name";
		document.getElementById("Name").style.color = "#808080";
	}
	else
		Name = 1;
	document.getElementById("Name").style.border = "1px solid #000000";
}

function focusEmail() {
	if (Email == 0){
		document.getElementById("Email").value = "";
		document.getElementById("Email").style.color = "#000000";
		Email = 1;
	}
}

function blurEmail() {
	var X = document.getElementById("Email").value;
	if (X == "") {
		Email = 0;
		document.getElementById("Email").value = "Email";
		document.getElementById("Email").style.color = "#808080";
	}
	else
		Email = 1;
	document.getElementById("Email").style.border = "1px solid #000000";
}

function focusTopic() {
	if (Topic == 0){
		document.getElementById("Topic").value = "";
		document.getElementById("Topic").style.color = "#000000";
		Topic = 1;
	}
}

function blurTopic() {
	var X = document.getElementById("Topic").value;
	if (X == "") {
		Topic = 0;
		document.getElementById("Topic").value = "Question Topic";
		document.getElementById("Topic").style.color = "#808080";
	}
	else
		Topic = 1;
	document.getElementById("Topic").style.border = "1px solid #000000";
}

function focusContent() {
	if (Content == 0){
		document.getElementById("Content").value = "";
		document.getElementById("Content").style.color = "#000000";
		Content = 1;
	}
}

function blurContent() {
	var X = document.getElementById("Content").value;
	if (X == "") {
		Content = 0;
		document.getElementById("Content").value = "Content";
		document.getElementById("Content").style.color = "#808080";
	}
	else
		Content = 1;
	document.getElementById("Content").style.border = "1px solid #000000";
}

function validateForm() {
	A = document.getElementById("Name").value
	B = document.getElementById("Email").value
	C = document.getElementById("Topic").value
	D = document.getElementById("Content").value
	if ((Name == 0)||(A == "") || (Email == 0)||(B == "") || (Topic == 0)||(C == "") || (Content == 0)||(D == "")) {
		if ((Name == 0)||(A == "")) {
			document.getElementById("Name").style.border = "1px solid #FF0000";
			document.getElementById("Name").value = "Name";
		}
		if ((Email == 0)||(B == "")) {
			document.getElementById("Email").style.border = "1px solid #FF0000";
			document.getElementById("Email").value = "Email";
		}
		if ((Topic == 0)||(C == "")) {
			document.getElementById("Topic").style.border = "1px solid #FF0000";
			document.getElementById("Topic").value = "Topic";
		}
		if ((Content == 0)||(D == "")) {
			document.getElementById("Content").style.border = "1px solid #FF0000";
			document.getElementById("Content").value = "Content";
		}
		return false;
	}else if (!validateEmail(B)){
		document.getElementById("Email").style.border = "1px solid #FF0000";
		return false;
	}
}

function validateAnswerForm() {
	A = document.getElementById("Name").value
	B = document.getElementById("Email").value
	D = document.getElementById("Content").value
	if ((Name == 0)||(A == "") || (Email == 0)||(B == "") || (Content == 0)||(D == "")) {
		if ((Name == 0)||(A == "")) {
			document.getElementById("Name").style.border = "1px solid #FF0000";
			document.getElementById("Name").value = "Name";
		}
		if ((Email == 0)||(B == "")) {
			document.getElementById("Email").style.border = "1px solid #FF0000";
			document.getElementById("Email").value = "Email";
		}
		if ((Content == 0)||(D == "")) {
			document.getElementById("Content").style.border = "1px solid #FF0000";
			document.getElementById("Content").value = "Content";
		}
		return false;
	}else if (!validateEmail(B)){
		document.getElementById("Email").style.border = "1px solid #FF0000";
		return false;
	}
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function voteUp(id)
{
	var xmlhttp;
	var vote = parseInt(document.getElementById("Vote").innerHTML);
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("Vote").innerHTML = vote + 1;
		}
	}
	xmlhttp.open("GET","voteup.php?id="+id,true);
	//xmlhttp.setrequestheader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}
		
function voteDown(id)
{
	var xmlhttp;
	var vote = parseInt(document.getElementById("Vote").innerHTML);
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("Vote").innerHTML = vote - 1;
		}
	}
	xmlhttp.open("GET","votedown.php?id="+id,true);
	//xmlhttp.setrequestheader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}
		
function voteUpA(id)
{
	var xmlhttp;
	var voteid = "VoteA" + id;
	var vote = parseInt(document.getElementById(voteid).innerHTML);
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById(voteid).innerHTML = vote + 1;
		}
	}
	xmlhttp.open("GET","voteupanswer.php?id="+id,true);
	//xmlhttp.setrequestheader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}

function voteDownA(id)
{
	var xmlhttp;
	var voteid = "VoteA" + id;
	var vote = parseInt(document.getElementById(voteid).innerHTML);
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById(voteid).innerHTML = vote - 1;
		}
	}
	xmlhttp.open("GET","votedownanswer.php?id="+id,true);
	//xmlhttp.setrequestheader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}
