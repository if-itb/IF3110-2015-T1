function validateRequiredInput(){
	var x = document.getElementsByClassName("requiredInput");
	for (var i=0;i<x.length;++i){
		if (x[i].value.length==0)
		{
			alert("Please Fill All Required Field ");
			return false;
		}
	}
	return true;
}

function validateEmailInputFormat(){
	var x = document.getElementsByClassName("emailInput");
	for (var i=0;i<x.length;++i){
		if (!x[i].value.length==0 && !isInEmailFormat(x[i].value))
		{
			alert("Please insert a valid email address.\n\n for more info refer to  RFC 822.");
			return false;
		}
	}
	return true;
}

function isInEmailFormat(email){
	var re = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/;	//regex taken from http://badsyntax.co/post/javascript-email-validation-rfc822
	return re.test(email);
}

function validateForm()
{
	return validateRequiredInput() && validateEmailInputFormat();
}
