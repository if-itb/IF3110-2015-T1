/*FORM VALIDATOR AND DELETE CONFIRMATION FUNCTION */

// search bar validator
function validateSearch(){
	var SearchInput = document.forms["SearchBar"]["SearchInput"].value;
	var DefaultRegex = /[^ \t]/i;
	var DefaultTest = DefaultRegex.test(SearchInput);
	if(!DefaultTest){
		alert("Search key must be filled");
		return false;
	}
}

// validate question form
function validateQuestion(){
	var name = document.forms["AskForm"]["name"].value;
	var email = document.forms["AskForm"]["email"].value;
	var topic = document.forms["AskForm"]["topic"].value;
	var content = document.forms["AskForm"]["content"].value;
	var DefaultRegex= /[^ \t]/i;
	// validate name
	var DefaultTest = DefaultRegex.test(name);
	if(!DefaultTest){
		alert("Name must be filled");
		return false;
	}
	// validate email
	var EmailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var EmailTest = EmailRegex.test(email);
	if(email == null || email == "" || !EmailTest){
		alert("Email must be filled correctly");
		return false;
	}
	// validate topic
	DefaultTest = DefaultRegex.test(topic);
	if(!DefaultTest){
		alert("Question Topic must be filled");
		return false;
	}
	//validate content
	DefaultTest = DefaultRegex.test(content);
	if(!DefaultTest){
		alert("Content must be filled");
		return false;
	}
}

//validate answer form
function validateAnswer(){
	var name = document.forms["AnswerForm"]["AnswerName"].value;
	var email = document.forms["AnswerForm"]["AnswerEmail"].value;
	var content = document.forms["AnswerForm"]["AnswerContent"].value;
	var DefaultRegex= /[^ \t]/i;
	// validate name
	var DefaultTest = DefaultRegex.test(name);
	if(!DefaultTest){
		alert("Name must be filled");
		return false;
	}
	// validate email
	var EmailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var EmailTest = EmailRegex.test(email);
	if(email == null || email == "" || !EmailTest){
		alert("Email must be filled correctly");
		return false;
	}
	//validate content
	DefaultTest = DefaultRegex.test(content);
	if(!DefaultTest){
		alert("Content must be filled");
		return false;
	}
}