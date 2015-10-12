function validate_delete() {
	return confirm("Hapus pertanyaan?");
}

function ValidateEmail(inputText)  
{  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(inputText.match(mailformat)) {
		return true;
	}
	else {  
		alert("You have entered an invalid email address!");
		return false;  
	} 
}

function validateForm() {
    var form = [document.forms["question_form"]["name"].value, document.forms["question_form"]["email"].value, document.forms["question_form"]["topic"].value, document.forms["question_form"]["content"].value];
    for (index = 0; index < form.length; ++index) {
    	if(index==1) {
    		return ValidateEmail(form[index]);
    	}
	    if (form[index] == null || form[index] == "") {
	    	alert("Form must be all filled out");
	        return false;    
	    }
    }
    return true;
}

function Update_Vote(up,question,id) {
	var ajaxRequest = new XMLHttpRequest();
	ajaxRequest.open("POST", "function/vote.php?up="+up+"&question="+question+"&id="+id,true);
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
			var ajaxDisplay;
			if(question==1) ajaxDisplay = document.getElementById('vote_question');
			else ajaxDisplay = document.getElementById('vote_answer');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	ajaxRequest.send(null);
}