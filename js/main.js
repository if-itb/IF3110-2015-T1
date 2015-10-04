"use strict";
(function(w) {
	var voteUp = function(id, db) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById(db + "-vote-count-" + id).innerHTML = xhttp.responseText;
			}
		}
		xhttp.open("POST", "./ajax/vote.php", true);
		xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		xhttp.send("action=up&id=" + id + "&db=" + db);
	}
	window.voteUp = voteUp;

	var voteDown = function(id, db) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById(db + "-vote-count-" + id).innerHTML = xhttp.responseText;
			}
		}
		xhttp.open("POST", "./ajax/vote.php", true);
		xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		xhttp.send("action=down&id=" + id + "&db=" + db);
	}
	window.voteDown = voteDown;


	var deleteQuestion = function(id) {
		if (typeof id === 'undefined') return;

		if (confirm("Are you sure to delete this question?")) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  location.href = "./index.php";
				}
			}
			xhttp.open("POST", "./ajax/delete.php", true);
			xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			xhttp.send("id=" + id);
		}
	}
	window.deleteQuestion = deleteQuestion;
})(window);