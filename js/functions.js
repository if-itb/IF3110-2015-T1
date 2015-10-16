function validateAnswer() {
	var a_name = document.forms["a-form"]["a_name"].value;
	var a_email = document.forms["a-form"]["a_email"].value;
	var a_content = document.getElementById("a_content").value;
	if (a_name == null || a_name == "") {
        alert("Please fill in your name.");
        return false;
    } else if (a_email == null || a_email == "") {
        alert("Please fill in your email.");
        return false;
    } else if (a_content == null || a_content == "") {
    	alert("Please fill in the content.");
    	return false;
	} else if (!validateEmail(a_email)) {
		alert("Email address not valid");
		return false;
	}
}
	
function validateQuestion() {
    var q_name = document.forms["q-form"]["q_name"].value;
    var q_email = document.forms["q-form"]["q_email"].value;
    var q_topic = document.forms["q-form"]["q_topic"].value;
    var q_content = document.getElementById("q_content").value;
    if (q_name == null || q_name == "") {
        alert("Please fill in your name.");
        return false;
    } else if (q_email == null || q_email == "") {
        alert("Please fill in your email.");
        return false;
    } else if (q_topic == null || q_topic =="") {
        alert("Please fill in the topic.");
        return false;
    } else if (q_content == null || q_content == "") {
        alert("Please fill in the content.");
        return false;
    } else if (!validateEmail(q_email)) {
        alert("Email address not valid");
        return false;
    }
}

function validateEmail(email) {
	var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	return re.test(email);
}

function vote(id, change, db) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (db=="questions") { //question
                document.getElementById("qvotes-"+id).innerHTML = xhttp.responseText;
            } else { //answer
                document.getElementById("avotes-"+id).innerHTML = xhttp.responseText;
            }
        }
    }
    xhttp.open("GET", "vote.php?id="+id+"&vote="+change+"&db="+db, true);
    xhttp.send();
} 