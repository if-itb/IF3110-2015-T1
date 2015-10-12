function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateAskinput()
{
	var Name = 	document.forms["ask"]["name"].value;
	var Email = document.forms["ask"]["email"].value;
	var Topic = document.forms["ask"]["topic"].value;
	var Content = document.forms["ask"]["content"].value;

	if ((Name === null) || (Email === null) || (Topic === null) || (Content === null) || (Name === "") || (Email === "") || (Topic === "") || (Content === ""))
	{
		alert("All fields must be filled out!");
		return false;
	}
	
	if(!validateEmail(document.getElementById("email").value))
	{
		alert('Please enter a valid email address.');
		return false;
	}	
}

function validateAnswerinput()
{
	var Name = 	document.forms["answerform"]["name"].value;
	var Email = document.forms["answerform"]["email"].value;
	var Content = document.forms["answerform"]["content"].value;

	if ((Name === null) || (Email === null) || (Content === null) || (Name === "") || (Email === "") || (Content === ""))
	{
		alert("All fields must be filled out!");
		return false;
	}
	
	if(!validateEmail(document.getElementById("email").value))
	{
		alert('Please enter a valid email address.');
		return false;
	}	
}