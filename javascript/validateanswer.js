function validateEmail(inputText)  
{  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	return mailformat.test(inputText); 
}

function validateForm() {
    var a = document.forms["question"]["Name"].value;
	var b = document.forms["question"]["Email"].value;
	var c = document.forms["question"]["Content"].value;
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
        alert("Content must be filled out");
        return false;
    }
}