function edit_alert(str1, str2) {
	if(str1 == "")
		str1 = str2; 
	else {
		str1+= ", ";
		str1+= str2;
	}
	return str1;
}

function validateFormQuestion() {
    var name = document.forms["Form"]["question_name"].value;
    var email = document.forms["Form"]["question_email"].value;
    var topic = document.forms["Form"]["question_topic"].value;
    var content = document.forms["Form"]["question_content"].value;
    var isName, isEmail, isTopic, isContent, falseEmail = false;
    var alert_str = "";
    if (name == null || name == "") {
        isName = true;
        alert_str=edit_alert(alert_str, "Name");
    }

    if (email == null || email == "") {
        isEmail = true;
        alert_str=edit_alert(alert_str, "Email");
    }
    else {
    	if(!validateEmail(email)) {
    		falseEmail=true;
    	}
    }

    if (topic == null || topic == "") {
        isTopic = true;
        alert_str=edit_alert(alert_str, "Topic");
    }

    if (content == null || content == "") {
        isContent = true;
        alert_str=edit_alert(alert_str, "Content");
    }

    if(isName || isEmail || isTopic || isContent || falseEmail) {
    	if(isName || isEmail || isTopic || isContent) {
    		alert(alert_str + " form must be filled out");
    		return false;
    	}
    	else if(falseEmail){
    		alert("Please Enter Correct Email ID")
            document.forms["Form"]["question_email"].focus();
            return false;
    	}
    }
}

function validateFormAnswer() {
    var name = document.forms["Form"]["answer_name"].value;
    var email = document.forms["Form"]["answer_email"].value;
    var content = document.forms["Form"]["answer_content"].value;
    var isName, isEmail, isContent, falseEmail = false;
    var alert_str = "";
    if (name == null || name == "") {
        isName = true;
        alert_str=edit_alert(alert_str, "Name");
    }

    if (email == null || email == "") {
        isEmail = true;
        alert_str=edit_alert(alert_str, "Email");
    }
    else {
    	if(!validateEmail(email)) {
    		falseEmail=true;
    	}
    }
  
    if (content == null || content == "") {
        isContent = true;
        alert_str=edit_alert(alert_str, "Content");
    }

    if(isName || isEmail || isContent || falseEmail) {
    	if(isName || isEmail || isContent) {
    		alert(alert_str + " form must be filled out");
    		return false;
    	}
    	else if(falseEmail){
    		alert("Please Enter Correct Email ID")
            document.forms["Form"]["answer_email"].focus();
            return false;
    	}
    }
}


function validateEmail(emailID) {
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            
            return false;
         }
         else
         	return true;
}

function validateDelete(id) {
	var txt;
    var r = confirm("Do you really want to delete this question?");
    if (r == true) {
    	var location = "del-question.php?del=" + id;
        window.location.href=location;

    } 
}