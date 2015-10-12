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