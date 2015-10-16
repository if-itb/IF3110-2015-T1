function validateFormAnswer(form) {
	//check name
	var input = form.name.value;
	if(input==null || input=="") {
		alert("Name must be filled out");
		return false;
	}
	//check content
   	input = form.content.value;
	if(input==null || input=="") {
		alert("Content must be filled out");
		return false;
	}
	//check email
	input = form.email.value;
   	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   	return re.test(input);
}

function validateFormQuestion(form) {
	//check name
	var input = form.name.value;
	if(input==null || input=="") {
		alert("Name must be filled out");
		return false;
	}
    //check topic 
    input = form.question.value;
    if(input==null || input=="") {
		alert("Topic must be filled out");
		return false;
	}
	//check content
    input = form.content.value;
	if(input==null || input=="") {
		alert("Content must be filled out");
		return false;
	}
	//check email
	input = form.email.value;
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(input);
}

function vote(type,question_no,answer_no,updown) {
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState==4 && xmlhttp.status==200) {
			if(type=="question") 
				document.getElementById("qvote").innerHTML = xmlhttp.responseText;
			else
				document.getElementById("avote"+answer_no).innerHTML = xmlhttp.responseText;
		}
	}
	var str = "vote.php?type="+type+"&question_no="+question_no+"&answer_no="+answer_no+"&updown="+updown;
	xmlhttp.open("GET",str,true);
	xmlhttp.send();
}