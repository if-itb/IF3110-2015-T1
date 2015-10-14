/*javascript function*/

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

//question form validator
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

//answer form validator
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

// confirm delete a question
function confirmDelete(){
	return confirm("Are you sure want to delete the question ?");
}

/*AJAX FUNCTION for votes */

/*GET LIST OF VOTE BUTTONS */
//get upvote buttons
var upvoteButtons = document.getElementsByClassName("upvote");
for(var i = 0; i < upvoteButtons.length; i++){
	upvoteButtons[i].onclick = function(){
		upvote(this.getAttribute("data-type"),this.getAttribute("data-id"));
	}
}

//get downvote buttons
var downvoteButtons = document.getElementsByClassName("downvote");
for(var i = 0; i < downvoteButtons.length; i++){
	downvoteButtons[i].onclick = function(){
		downvote(this.getAttribute("data-type"),this.getAttribute("data-id"));
	}
}

//upvote function
function upvote(type,id){
	var xmlhttp= new XMLHttpRequest();
	var numVotes = parseInt(document.getElementById(type+id).innerHTML);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById(type+id).innerHTML = numVotes + 1;
		}
	}
	xmlhttp.open("GET","upvote.php?type=" + type + "&id=" + id, true);
	xmlhttp.send();
}

//downvote function
function downvote(type,id){
	var xmlhttp= new XMLHttpRequest();
	var numVotes = parseInt(document.getElementById(type+id).innerHTML);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById(type+id).innerHTML = numVotes - 1;
		}
	}
	xmlhttp.open("GET","downvote.php?type=" + type + "&id=" + id, true);
	xmlhttp.send();
}