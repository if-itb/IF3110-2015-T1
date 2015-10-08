function validateForms(){
	var forms = document.forms;
	for(var i = 0; i < forms.length; i++){
		for(var j = 0; j < forms[i].elements.length; j++){
			if(forms[i][j].value == null || forms[i][j].value == ""){
				alert("Please fill out the entire form");
				return false;
			}
			if(forms[i][j].name == "email"){
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    		if(!re.test(forms[i][j].value)){
    			alert("Please use the correct email format\nexample: user@email.com");
    			forms[i][j].focus();
    			return false;
    		}
			}
		}
	}
}