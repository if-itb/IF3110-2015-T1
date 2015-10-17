function validateemail(email){
	var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function validateFormNew() {
    var a = document.forms["new"]["name"].value;
    var b = document.forms["new"]["email"].value;
    var c = document.forms["new"]["topic"].value;
    var d = document.forms["new"]["content"].value;
    var alert = "";
    if (a == null || a == "")
        alert += "Name must be filled out; ";
    if (b == null || b == "")
        alert += "Email must be filled out; ";
    else if(!validateemail(b))
    	alert += "Wrong email format; ";
    if (c == null || c == "")
        alert += "Topic must be filled out; ";
    if (d == null || d == "") 
        alert += "Content must be filled out";
    if(alert != ""){
	    confirm(alert);
     	return false;
     }
}
function validateFormEdit() {
    var c = document.forms["edit"]["topic"].value;
    var d = document.forms["edit"]["content"].value;
    var alert = "";
    if (c == null || c == "")
        alert += "Topic must be filled out; ";
    if (d == null || d == "") 
        alert += "Content must be filled out";
    if(alert != ""){
	    confirm(alert);
     	return false;
     }
}
function validateFormAnswer() {
    var a = document.forms["answer"]["name"].value;
    var b = document.forms["answer"]["email"].value;
    var d = document.forms["answer"]["content"].value;
    var alert = "";
    if (a == null || a == "")
        alert += "Name must be filled out; ";
    if (b == null || b == "")
        alert += "Email must be filled out; ";
    else if(!validateemail(b))
    	alert += "Wrong email format; ";
    if (d == null || d == "") 
        alert += "Content must be filled out";
    if(alert != ""){
	    confirm(alert);
     	return false;
     }
}