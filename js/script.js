
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