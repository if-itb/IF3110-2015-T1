var xhttp;

//Email  Regex Vaidation
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
};

//Javascript Form Validation
function validateQuestionForm(){
	var formName = "question_form";

	var name = document.forms[formName]["name"].value;
	var email = document.forms[formName]["email"].value;
	var topic= document.forms[formName]["topic"].value;
	var content = document.forms[formName]["content"].value;

	if (name == null || name == ""){
	  alert("Name must be filled");
	  return false;
	}
	else if (!validateEmail(email)){
	  alert("Please enter a valid email address");
	  return false;          
	}
	else if (email == null || email == ""){
	  alert("Email must be filled");
	  return false;
	}
	else if (topic == null || topic == ""){
	  alert("Topic must be filled");
	  return false;
	}
	else if (content == null || content == ""){
	  alert("Content must be filled");
	  return false;
	}

	return true;
};

function validateAnswerForm(){
	var formName = "answer_form";

	var name = document.forms[formName]["name"].value;
	var email = document.forms[formName]["email"].value;
	var content = document.forms[formName]["content"].value;

	if (name == null || name == ""){
	  alert("Name must be filled");
	  return false;
	}
	else if (!validateEmail(email)){
	  alert("Please enter a valid email address");
	  return false;          
	}
	else if (email == null || email == ""){
	  alert("Email must be filled");
	  return false;
	}
	else if (topic == null || topic == ""){
	  alert("Topic must be filled");
	  return false;
	}

	return true;
};

function initXMLHTTPRequest(){
	if (window.XMLHttpRequest) {
		//Code for (Chrome, IE7+, Firefox, Safari, and Opera
	    xhttp = new XMLHttpRequest();
	} 
	else {
	    // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
};

function vote(id,is_question,is_voteup){
	initXMLHTTPRequest();
	xhttp.onreadystatechange = function(){
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	    	
	    	if (is_question){
		      document.getElementById("q_vote").innerHTML = xhttp.responseText;		      	    		
	    	}
	    	else{
		      document.getElementById("a_vote").innerHTML = xhttp.responseText;
	    	}

	    }
	};
	xhttp.open("GET","vote.php?id="+id+"&q="+is_question+"&v="+is_voteup,true);
	xhttp.send();
};