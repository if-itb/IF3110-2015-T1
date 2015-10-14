function validateQuestionForm() {
	
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var topic = document.getElementById('topic').value;
	var content = document.getElementById('content').value;
	var pattern = "^\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,3}$"; 
	if (name == null || name == "") {
		alert("Please insert your name!");
		return false;
	}
	if (!email.match(pattern)) {
		alert("Please correct your email!");
		return false;
	}
	if (topic == null || topic == "") {
		alert("Please insert the topic!");
		return false;
	}
	if (content == null || content == "") {
		alert("Please insert your question!");
		return false;
	}
	return true;
}

function validateAnswerForm() {

	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var content = document.getElementById('content').value;
	var pattern = "^\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,3}$"; 
	if (name == null || name == "") {
		alert("Please insert your name!");
		return false;
	}
	if (!email.match(pattern)) {
		alert("Please correct your email!");
		return false;
	}
	if (content == null || content == "") {
		alert("Please insert your answer!");
		return false;
	}
	return true;
}

function validateDelete(){
	var result = confirm("Are you sure you want to delete?");
	if(result){
		return true;
	}
	else{
		return false;
	}
}

function voteUpdating(id, table, value) {
  	if (id == "" || table == "" || value == null) {
	    return;
	} else { 
	    if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	    } else {
	        // code for IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }

	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	        	if (table == "question")
	            	document.getElementById("questions-vote").innerHTML = parseInt(document.getElementById("questions-vote").innerHTML) + value;
	            else
	            	document.getElementById("answers-vote-"+id).innerHTML = parseInt(document.getElementById("answers-vote-"+id).innerHTML) + value;
	        }
	    }

	    xmlhttp.open("GET","vote.php?id="+id+"&table="+table+"&value="+value,true);
	    xmlhttp.send();
	}
}