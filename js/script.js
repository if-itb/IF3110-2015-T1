
function deleteQuestion(id) {
    var a = confirm("Anda yakin ingin menghapus pertanyaan ini?");

    if ( a == true ) {
    	window.location.href = "/delete/question/" + id;
    }
}

function validateAskForm() {
	var name = document.forms["ask"]["name"].value;
	var email = document.forms["ask"]["email"].value;
	var topic = document.forms["ask"]["topic"].value;
	var content = document.forms["ask"]["content"].value;

	if ( name == null || name == "" ) {
		alert("Masukkan Nama");
		return false;
	} else if ( email == null || email == "" ) {
		alert("Masukkan Email");
		return false;
	} else if ( topic == null || topic == "" ) {
		alert("Masukkan Topik");
		return false;
	} else if ( content == null || content == "" ) {
		alert("Masukkan Konten");
		return false;
	} else if ( !validateEmail(email) ) {
		alert("Email tidak valid");
		return false;
	}

	return true;
}

function validateAnswerForm() {
	var name = document.forms["answer"]["name"].value;
	var email = document.forms["answer"]["email"].value;
	var content = document.forms["answer"]["content"].value;

	if ( name == null || name == "" ) {
		alert("Masukkan Nama");
		return false;
	} else if ( email == null || email == "" ) {
		alert("Masukkan Email");
		return false;
	} else if ( content == null || content == "" ) {
		alert("Masukkan Konten");
		return false;
	} else if ( !validateEmail(email) ) {
		alert("Email tidak valid");
		return false;
	}

	return true;
}

function validateEmail(email) {
	var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	return regex.test(email);
}

function voting(id, type, q_a) {
    if (id == "" || id == null || type == "" || type == null) {
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         		var i = 0;

         		if ( type == "up" ) {
         			i = 1;
         		} else if ( type == "down") {
         			i = -1;
         		}

                document.getElementById("vote_count_" + id).innerHTML = parseInt( document.getElementById("vote_count_" + id).innerHTML) + i;
            }
        }

        xmlhttp.open("GET","/vote/" + q_a + "/" + type + "/" + id, true);
        xmlhttp.send();
    }
}