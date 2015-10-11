function validateForm(){
	var a = document.forms["qForm"]["name"].value;
	var b = document.forms["qForm"]["email"].value;
	var c = document.forms["qForm"]["qtopic"].value;
	var d = document.forms["qForm"]["content"].value;
	
	var x="";
	if(a==null || a==""){
		x+="Name tidak boleh kosong\n";
	}
	if(b==null || b==""){
		x+="Email tidak boleh kosong\n";
	}else{
		if(!validateEmail(b)){
			x+="Email harus sesuai dengan format\n"
		}
	}
	if(c==null || c==""){
		x+="Question Topic tidak boleh kosong\n";
	}
	if(d==null || d==""){
		x+="Content tidak boleh kosong\n";
	}
	if (x!=""){
		alert(x);
		return false;
	}
}

function validateAnswerForm(){
	var a = document.forms["aForm"]["name"].value;
	var b = document.forms["aForm"]["email"].value;
	var c = document.forms["aForm"]["content"].value;
	
	var x="";
	if(a==null || a==""){
		x+="Name tidak boleh kosong\n";
	}
	if(b==null || b==""){
		x+="Email tidak boleh kosong\n";
	}else{
		if(!validateEmail(b)){
			x+="Email harus sesuai dengan format\n"
		}
	}
	if(c==null || c==""){
		x+="Content tidak boleh kosong\n";
	}
	if (x!=""){
		alert(x);
		return false;
	}
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}