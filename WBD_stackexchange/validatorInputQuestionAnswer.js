/**
 * Created by Marco Orlando on 10/10/2015.
 */

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateFormQuestion(){
    var x = document.forms["myForm"]["name"].value;
    if (x==null || x==""){
        alert("Name must be filled");
        return false;
    }

    var y = document.forms["myForm"]["email"].value;
    if (y==null || y==""){
        alert("Email must be filled");
        return false;
    } else if (!validateEmail(y)){
        alert("Email is not a valid");
        return false;
    }


    var a = document.forms["myForm"]["questionTopic"].value;
    if (a==null || a==""){
        alert("Topic must be filled");
        return false;
    }

    var b = document.forms["myForm"]["questionContent"].value;
    if (b==null || b==""){
        alert("Content must be filled");
        return false;
    }
}




function validateFormAnswer(){
    var x = document.forms["myForm"]["name"].value;
    if (x==null || x==""){
        alert("Name must be filled");
        return false;
    }

    var y = document.forms["myForm"]["email"].value;
    if (y==null || y==""){
        alert("Email must be filled");
        return false;
    } else if (!validateEmail(y)){
        alert("Email is not a valid");
        return false;
    }

    var b = document.forms["myForm"]["questionContent"].value;
    if (b==null || b==""){
        alert("Content must be filled");
        return false;
    }
}