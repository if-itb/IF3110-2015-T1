"use strict";	
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