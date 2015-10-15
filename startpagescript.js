function validateEmail(email){
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}

function voteQuestion(id){
	if (id==""||id==null){
		return;
	} else{
		//create XHR
		xmlhttp = new XMLHttpRequest();
	} else{//For IE5,6
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState == 4) && (xmlhttp.status == 200){
			document.getElementById("num_question_vote").innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET","vote.php?idq="+id,true);
	xmlhttp.send();
}