function validateAskForm() {
	var name = document.forms["askForm"]["name"].value;
	var email = document.forms["askForm"]["email"].value;
	var topic = document.forms["askForm"]["topic"].value;
	var content = document.forms["askForm"]["content"].value;
	var emailformat = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	if (name == null || name == "") {
		alert("Kolom nama harus diisi");
		return false;
	} else {
		if (email == null || email == "") {
			alert("Kolom email harus diisi");
			return false;
		} else {
			if (topic == null || topic == "") {
				alert("Kolom topik harus diisi");
				return false;
			} else {
				if (content == null || content == "") {
					alert("Kolom konten harus diisi");
					return false;
				} else {
					if (emailformat.test(email) == false) {
						alert("Format penulisan email salah");
						return false;
					}
				}
			}
		}
	}
}

function validateEditForm() {
	var name = document.forms["editForm"]["name"].value;
	var email = document.forms["editForm"]["email"].value;
	var topic = document.forms["editForm"]["topic"].value;
	var content = document.forms["editForm"]["content"].value;
	var emailformat = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	if (name == null || name == "") {
		alert("Kolom nama harus diisi");
		return false;
	} else {
		if (email == null || email == "") {
			alert("Kolom email harus diisi");
			return false;
		} else {
			if (topic == null || topic == "") {
				alert("Kolom topik harus diisi");
				return false;
			} else {
				if (content == null || content == "") {
					alert("Kolom konten harus diisi");
					return false;
				} else {
					if (emailformat.test(email) == false) {
						alert("Format penulisan email salah");
						return false;
					}
				}
			}
		}
	}
}

function validateAnswerForm() {
	var name = document.forms["answerForm"]["name"].value;
	var email = document.forms["answerForm"]["email"].value;
	var content = document.forms["answerForm"]["content"].value;
	var emailformat = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	if (name == null || name == "") {
		alert("Kolom nama harus diisi");
		return false;
	} else {
		if (email == null || email == "") {
			alert("Kolom email harus diisi");
			return false;
		} else {
			if (content == null || content == "") {
				alert("Kolom konten harus diisi");
				return false;
			} else {
				if (emailformat.test(email) == false) {
					alert("Format penulisan email salah");
					return false;
				}
			}
		}
	}
}