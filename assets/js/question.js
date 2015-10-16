function deleteQuestion(questionId){
	if (confirm("Are you sure you want to delete this question?"))
		window.location.href="/tools/question/deletequestion.php?id=" + questionId;
}

function editQuestion(questionId){
	window.location.href="/editquestion.php?id=" + questionId;
}

function upVoteQuestion(questionId){
	//Taken from http://stackoverflow.com/questions/9713058/sending-post-data-with-a-xmlhttprequest
	var http = new XMLHttpRequest();
	var url = "/tools/question/upvotequestion.php";
	var param = "id=" + questionId;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", param.length);
	http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var id = "question"+questionId;
			var element = document.getElementById(id);
			var value = parseInt(element.innerHTML);
			element.innerHTML = "" + (value+1);
		}
	}
	http.send(param);
}

function downVoteQuestion(questionId){
	//Taken from http://stackoverflow.com/questions/9713058/sending-post-data-with-a-xmlhttprequest
	var http = new XMLHttpRequest();
	var url = "/tools/question/downvotequestion.php";
	var param = "id=" + questionId;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", param.length);
	http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var id = "question"+questionId;
			var element = document.getElementById(id);
			var value = parseInt(element.innerHTML);
			element.innerHTML = "" + (value-1);
		}
	}
	http.send(param);
}