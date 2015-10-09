"use strict";
(function(w) {
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


})(window);