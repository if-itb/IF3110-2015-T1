function validateinput()
{
	var Name = 	document.forms["ask"]["name"].value;
	var Email = document.forms["ask"]["email"].value;
	var Topic = document.forms["ask"]["topic"].value;
	var Content = document.getElementById("content").value;

	if ((Name == null) || (Email == null) || (Topic == null) || (Content == null) || (Name == "") || (Email == "") || (Topic == "") || (Content == ""))
	{
		alert("All fields must be filled out!");
		return false;
	}	
}