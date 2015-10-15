function validateEmail(inputText)  
{  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	return mailformat.test(inputText); 
}

function validateForm() {
    var a = document.forms["edit"]["Name"].value;
	var b = document.forms["edit"]["Email"].value;
	var c = document.forms["edit"]["Topik"].value;
	var d = document.forms["edit"]["Content"].value;
    if (a == null || a == "") {
        alert("Name must be filled out");
        return false;
    }
	if (b == null || b == "") {
        alert("Email must be filled out");
        return false;
    }
	if (!validateEmail(b))
	{
		alert('Please enter a valid email address.');
		return false;
	}
	if (c == null || c == "") {
        alert("Question Topik must be filled out");
        return false;
    }
	if (d == null || d == "") {
        alert("Content must be filled out");
        return false;
    }
}