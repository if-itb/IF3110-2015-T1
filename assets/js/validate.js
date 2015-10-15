function isEmptyField(form, field){
	var value = document.forms[form][field].value.trim();
	return value === "";
}

function isValidEmailAddress(email){
	//Use simple regex to validate email address
	return /\w+@\w+\.\w+/.test(email);

}

function validateAskForm(){
	var field = ['asker','email','topic','content'];
	
	//Check whether there exist blank field
	for(i in field)
		if(isEmptyField("askForm", i)){
			alert("All field is required");
			return false;
		}

	var email = document.forms["askForm"]["email"].value.trim();
	if(!isValidEmailAddress(email)){
		alert("Email address is not valid. Must be of the form xxx@yyy.zzz. Example: stack@exchange.com");
		return false;
	}
		
}

function validateAnswerForm(){
	var field = ['answerer','email','content'];
	
	//Check whether there exist blank field
	for(i in field)
		if(isEmptyField("answerForm", i)){
			alert("All field is required");
			return false;
		}

	var email = document.forms["answerForm"]["email"].value.trim();
	if(!isValidEmailAddress(email)){
		alert("Email address is not valid. Must be of the form xxx@yyy.zzz. Example: stack@exchange.com");
		return false;
	}
}