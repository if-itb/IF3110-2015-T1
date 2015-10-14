	function validateAns()
	{
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if ((document.forms["answerForm"]["name"].value == null) || (document.forms["answerForm"]["name"].value == ""))
		{
			alert ("Name cannot be empty");
			return false;
		}
		if ((document.forms["answerForm"]["email"].value == null) || (document.forms["answerForm"]["email"].value == ""))
		{
			alert ("Email cannot be empty");
			return false;
		}
		if ((document.forms["answerForm"]["answer"].value == null) || (document.forms["answerForm"]["answer"].value == ""))
		{
			alert ("Answer cannot be empty");
			return false;
		}
		else
		{
			if (!re.test(document.forms["answerForm"]["email"].value))
			{
				alert ("Invalid email");
				return false;
			}
		}
	}

	function validateQue()
	{
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if ((document.forms["questionForm"]["name"].value == null) || (document.forms["questionForm"]["name"].value == ""))
		{
			alert ("Name cannot be empty");
			return false;
		}
		if ((document.forms["questionForm"]["email"].value == null) || (document.forms["questionForm"]["email"].value == ""))
		{
			alert ("Email cannot be empty");
			return false;
		}
		if ((document.forms["questionForm"]["topic"].value == null) || (document.forms["questionForm"]["topic"].value == ""))
		{
			alert ("Topic cannot be empty");
			return false;
		}
		if ((document.forms["questionForm"]["question"].value == null) || (document.forms["questionForm"]["question"].value == ""))
		{
			alert ("Question cannot be empty");
			return false;
		}
		else
		{
			if (!re.test(document.forms["questionForm"]["email"].value))
			{
				alert ("Invalid email");
				return false;
			}
		}
	}
	
	function upVoteAns(int)
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
								  {
									if ((xhttp.readyState==4) && (xhttp.status==200))
									{
										document.getElementById("ajaxAnswer"+int).innerHTML = xhttp.responseText;
									}	
								  }
		xhttp.open("GET","upVoteAnswer.php?id="+int, true);
		xhttp.send();
	}
	
	function downVoteAns(int)
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
								  {
									if ((xhttp.readyState==4) && (xhttp.status==200))
									{
										document.getElementById("ajaxAnswer"+int).innerHTML = xhttp.responseText;
									}	
								  }
		xhttp.open("GET","downVoteAnswer.php?id="+int, true);
		xhttp.send();		
	}
	
	function upVoteQue(int)
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
								  {
									if ((xhttp.readyState==4) && (xhttp.status==200))
									{
										document.getElementById("ajaxQuestion"+int).innerHTML = xhttp.responseText;
									}	
								  }
		xhttp.open("GET","upVoteQuestion.php?id="+int, true);
		xhttp.send();	
	}
	
	function downVoteQue(int)
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
								  {
									if ((xhttp.readyState==4) && (xhttp.status==200))
									{
										document.getElementById("ajaxQuestion"+int).innerHTML = xhttp.responseText;
									}	
								  }
		xhttp.open("GET","downVoteQuestion.php?id="+int, true);
		xhttp.send();		
	}