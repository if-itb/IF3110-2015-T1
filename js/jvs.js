function validateField(form) {
    var name = document.getElementById("fname").value;
    var title = document.getElementById("ftitle").value;
    var content = document.getElementById("fcontent").value;    
    if (name=== '' || title==='' || content=== ''  ) {
        if (name==='') form.username.style.border = "2px solid red";
        else  form.username.style.border = "2px solid blue";
        if (title==='') form.title.style.border = "2px solid red";
        else  form.title.style.border = "2px solid blue";
        if (content==='') form.content.style.border = "2px solid red";
        else  form.content.style.border = "2px solid blue";
        document.getElementById("ermsg2").innerHTML = "There is still empty field";
        return false;
    }
    else {
        form.username.style.border = "2px solid blue";
        form.title.style.border = "2px solid blue";
        form.content.style.border = "2px solid blue";
        document.getElementById("ermsg2").innerHTML = "";
        return true;
    }
}

function validateEmail(form) {
   var email = document.getElementById("femail").value;
   var at="@";	var dot=".";var lstr=email.length;
   var lat=email.indexOf(at);var ldot=email.indexOf(dot);
   if (lat<1||lat===lstr||ldot<1||ldot===lstr||ldot-lat<2){
       document.getElementById("ermsg").innerHTML = "* Make sure that your email is valid";
       form.email.style.border = "2px solid red";
       return false;}
    else  {document.getElementById("ermsg").innerHTML = "";form.email.style.border = "2px solid blue";return true;}
    
}
function formValidator(form) {
    var a =validateEmail(form),b=validateField(form);
    if (!a||!b) return false ;
    else  return false;
}