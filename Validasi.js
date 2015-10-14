function validateQ() {
    var name = document.forms["question"]["Name"].value;
    var email = document.forms["question"]["Email"].value;
    var topic = document.forms["question"]["Topic"].value;
    var content = document.forms["question"]["Content"].value;
	var email_Pattern = /^(\".*\"|[A-Za-z]\w*)@(\[\d{1,3}(\.\d{1,3}){3}]|[A-Za-z]\w*(\.[A-Za-z]\w*)+)$/
    var EmailmatchArray = email.match(email_Pattern);
    if ((name == null || name == "") || (email == null || email == "") || (topic == null || topic == "") || (content == null || content == "")) {
        alert("All field must be filled out");
        return false;
    } else if(EmailmatchArray == null){
        alert("Your email address is incorrect. Please try again.");
        return false;
	}
}

function validateA() {
    var name = document.forms["answer"]["Name"].value;
    var email = document.forms["answer"]["Email"].value;
    var content = document.forms["answer"]["Content"].value;
	var email_Pattern = /^(\".*\"|[A-Za-z]\w*)@(\[\d{1,3}(\.\d{1,3}){3}]|[A-Za-z]\w*(\.[A-Za-z]\w*)+)$/
    var EmailmatchArray = email.match(email_Pattern);
    if ((name == null || name == "") || (email == null || email == "") || (content == null || content == "")) {
        alert("All field must be filled out");
        return false;
    } else if(EmailmatchArray == null){
        alert("Your email address is incorrect. Please try again.");
        return false;
	}
}

function confirm_delete(){
	var a = confirm("Are you sure want to delete the question?")
	if (a){
		return true;
	}else{
		return false;
	}
}