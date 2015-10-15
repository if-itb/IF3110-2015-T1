<!--
function confirmPop(x) {
	var t;
    if (confirm("Are you sure?") == true) {
    	switch (x) {
    		case 1:
    			t = "Question posted!";
    			break;
    		case 2:
    			t = "Answer posted!";
    			break;
    		default:
    			t = "Database updated!";
    			break;
    	}
    	document.getElementById("success").innerHTML = t;
        return true;
    } else {
        return false;
    }
}

function like(table,id,x) {
	var xhttp = new XMLHttpRequest();
	console.log(document.getElementById(table+id).innerHTML);
	xhttp.open("GET", "vote.php?table="+table+"&ID="+id+"&x="+x, true);
	xhttp.send();
	document.getElementById(table+id).innerHTML = parseInt(document.getElementById(table+id).innerHTML) + x;
}

function qformValidation() {
	var temp = document.forms["questions"]["name"].value;
	if ((temp == null) || (temp == "")) {
		alert("Name must be filled");
		return false;
	}
	
	temp = document.forms["questions"]["email"].value;
	var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if ((temp == null) || (temp == "")) {
		alert("Email must be filled");
		return false;
	}
	
	var result = pattern.test(temp);
	if (result == null) {
		alert("Email incorrect");
		return false;
	}

	temp = document.forms["questions"]["topic"].value;
	if ((temp == null) || (temp == "")) {
		alert("Topic must be filled");
		return false;
	}
	
	temp = document.forms["questions"]["content"].value;
	if ((temp == null) || (temp == "")) {
		alert("Content must be filled");
		return false;
	}
	return confirmPop(1);
}

function aformValidation() {
	var temp = document.forms["answers"]["name"].value;
	if ((temp == null) || (temp == "")) {
		alert("Name must be filled");
		return false;
	}
	
	temp = document.forms["answers"]["email"].value;
	var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if ((temp == null) || (temp == "")) {
		alert("Email must be filled");
		return false;
	}
	
	var result = pattern.test(temp);
	if (result == null) {
		alert("Email incorrect");
		return false;
	}
	
	temp = document.forms["answers"]["content"].value;
	if ((temp == null) || (temp == "")) {
		alert("Content must be filled");
		return false;
	}
	return confirmPop(2);
}
-->