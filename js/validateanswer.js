function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function validateForm() {
    var x = document.forms["addAnswer"]["Name"].value;
    var y = document.forms["addAnswer"]["Email"].value;
    var z = document.forms["addAnswer"]["Content"].value;
    if (x == null || x == "" ) {
        alert("Name must be filled out");
        return false;
    }
	if (y == null || y == "") {
        alert("Email must be filled out");
        return false;
    }
	if(!validateEmail(y)){
		alert("Email format is wrong");
        return false;
	}
	if (z == null || z == "") {
        alert("Content must be filled out");
        return false;
    }
	
}