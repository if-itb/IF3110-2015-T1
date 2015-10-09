/* @Author	: Ignatius Alriana Haryadi Moel
 * File		: validate.js
 */

 function validateForm(){

 	var fName = document.forms["ask-form"]["Name"].value;
 	var fEmail = document.forms["ask-form"]["Email"].value;
 	var fTopic = document.forms["ask-form"]["Topic"].value;
 	var fcomment = document.forms["ask-form"]["Content"].value;

 	// String allert
 	var s="";

    if (fName == null || fName == "") {
        s+="Name cannot be empty\n";
    }
    if (fEmail == null || fEmail == "") {
        s+="Email cannot be empty\n";
    } else {
    	if(!validateEmail(fEmail)){
    		s+="Email not valid\n";
    	}
    }
    if (fTopic == null || fTopic == "") {
        s+="Topic cannot be empty\n";
    }
    if (fcomment == null || fcomment == "") {
        s+="Content cannot be empty\n";
    }

    if(s!="") {
    	alert(s);
    	return false;
    }

 }

 function validateAns(){

    var fName = document.forms["ask-ans"]["Name"].value;
    var fEmail = document.forms["ask-ans"]["Email"].value;
    var fcomment = document.forms["ask-ans"]["Content"].value;

    // String allert
    var s="";

    if (fName == null || fName == "") {
        s+="Name cannot be empty\n";
    }
    if (fEmail == null || fEmail == "") {
        s+="Email cannot be empty\n";
    } else {
        if(!validateEmail(fEmail)){
            s+="Email not valid\n";
        }
    }
    if (fcomment == null || fcomment == "") {
        s+="Content cannot be empty\n";
    }

    if(s!="") {
        alert(s);
        return false;
    }

 }

 function validateEmail(fEmail){
    var filter =/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    return filter.test(fEmail);
 }
