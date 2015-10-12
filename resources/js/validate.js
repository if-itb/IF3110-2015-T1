function confirmDelete(string){
    if (confirm("apakah anda mau mendelete pertanyaan ini ? ")) {
        document.location = "delete.php?id="+string;
    }
}
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function validateQForm() {
	var v;
    var w = document.forms["QForm"]["name"].value;
    var x = document.forms["QForm"]["email"].value;
    var y = document.forms["QForm"]["topic"].value;
  	var z = document.forms["QForm"]["content"].value;
    if (w == null || w == "") {
        document.getElementById("nameErr").innerHTML = "*nama kosong";
        v= false;
    }
    else{
        document.getElementById("nameErr").innerHTML = "*";
    }
    if (x == null || x == "" || !validateEmail(x)){
    	document.getElementById("emailErr").innerHTML = "*email salah";
        v= false;
   }
   else{
        document.getElementById("emailErr").innerHTML = "*";

    }
    if (y == null || y == "") {
        document.getElementById("topicErr").innerHTML = "*topik kosong";
        v= false;
    }
    else{
        document.getElementById("topicErr").innerHTML = "*";
    }
    if (z == null || z == "") {
        document.getElementById("contentErr").innerHTML = "*konten kosong";
        v= false;
    }
    else{
        document.getElementById("contentErr").innerHTML = "*";
    }
    return v;
}

function validateAForm() {
	var v;
    var x = document.forms["AForm"]["name"].value;
    var y = document.forms["AForm"]["email"].value;
  	var z = document.forms["AForm"]["content"].value;
    if (x == null || x == "") {
        document.getElementById("nameErr").innerHTML = "*nama kosong";
        v= false;
    }
    else{
        document.getElementById("nameErr").innerHTML = "*";
    }
    if (y == null || y == "" || !validateEmail(y)){
    	document.getElementById("emailErr").innerHTML = "*email salah";
        v= false;
   }
   else{
        document.getElementById("emailErr").innerHTML = "*";
    }
    if (z == null || z == "") {
        document.getElementById("contentErr").innerHTML = "*konten kosong";
        v= false;
    }
    else{
        document.getElementById("contentErr").innerHTML = "*";
    }
    return v;
}
