var httpRequest = new XMLHttpRequest();

function sendAjax(params, success) {
	serialize = function(object) {
		var result = [];
		for(var prop in object)
			if (object.hasOwnProperty(prop)) {
				result.push(encodeURIComponent(prop) + "=" + encodeURIComponent(object[prop]));
			}
		return result.join("&");
	}

	var url = params.url;
	var method = params.method;
	var data = serialize(params.data);
	httpRequest.open(method, url, true);

	httpRequest.onreadystatechange = success;

	httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	httpRequest.setRequestHeader("Content-length", params.length);
	httpRequest.setRequestHeader("Connection", "close");

	httpRequest.send(data);
}

function vote(element, up) {
	setElement = function() {
		console.log(httpRequest.responseText);
		var response = JSON.parse(httpRequest.responseText);
		var counterNode = element.parentNode.getElementsByTagName('SPAN')[0];
		counterNode.textContent = response.votes;
	}
	if (element.hasAttribute('question-id')) {
		var id = element.getAttribute('question-id');
		var hostname = 'http://' + window.location.hostname;
		var url = hostname + '/questions/votes';
		console.log(url);
		var params = { 
			'url': url, 
			'method': 'POST',
			'data': { 'id': id, 'up': up }
		};
		sendAjax(params, setElement);
	}
	if (element.hasAttribute('answer-id')) {
		var id = element.getAttribute('answer-id');
		var hostname = 'http://' + window.location.hostname;
		var url = hostname + '/answers/votes';
		var params = { 
			'url': url, 
			'method': 'POST',
			'data': { 'id': id, 'up': up }
		};
		sendAjax(params, setElement);
	}
}

document.addEventListener("DOMContentLoaded", function(event) { 
	var elements  = document.getElementsByClassName('voteup');
	var size = elements.length;
	for (var i = 0; i < size; ++i) {
		var element = elements[i];
		element.addEventListener("click", function(event) {
			vote(event.target, true);
		});
	}
});

document.addEventListener("DOMContentLoaded", function(event) {
	var elements  = document.getElementsByClassName('votedown');
	var size = elements.length;
	for (var i = 0; i < size; ++i) {
		var element = elements[i];
		element.addEventListener("click", function(event) {
			vote(event.target, false);
		});
	}
});
