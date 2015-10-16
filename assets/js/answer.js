function upVoteAnswer(answerId){
	//Taken from http://stackoverflow.com/questions/9713058/sending-post-data-with-a-xmlhttprequest
	var http = new XMLHttpRequest();
	var url = "/tools/answer/upvoteanswer.php";
	var param = "id=" + answerId;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", param.length);
	http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var id = "answer"+answerId;
			var element = document.getElementById(id);
			var value = parseInt(element.innerHTML);
			element.innerHTML = "" + (value+1);
		}
	}
	http.send(param);
}

function downVoteAnswer(answerId){
	//Taken from http://stackoverflow.com/questions/9713058/sending-post-data-with-a-xmlhttprequest
	var http = new XMLHttpRequest();
	var url = "/tools/answer/downvoteanswer.php";
	var param = "id=" + answerId;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", param.length);
	http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var id = "answer"+answerId;
			var element = document.getElementById(id);
			var value = parseInt(element.innerHTML);
			element.innerHTML = "" + (value-1);
		}
	}
	http.send(param);
}