function ValidasiInput()
{
	var Name = document.forms["ask"]["name"].value; 
	var Email = document.forms["ask"]["email"].value; 
	var Topic = document.forms["ask"]["topic"].value; 
	var Content = document.forms["ask"]["content"].value; 
	var ID = document.forms["ask"]["id"].value; 

	if ((Name === "") || (Email === "") || (Topic === "") || (Content === ""))
	{
		alert("All fields must be filled out"); 
		return false; 
	}
	else if (!validateEmail(Email))
	{
		alert("Email incorrect"); 
		return false; 
	}

	else
	{
		return true; 
	}
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}