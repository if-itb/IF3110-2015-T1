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
        document.getElementById("ermsg2").innerHTML = "* There is still empty field";
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
        document.getElementById("ermsg2").innerHTML = "* There is still empty field";
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
function validateField2(form) {
    var name = document.getElementById("fname").value;
   
    var content = document.getElementById("fcontent").value;    
    if (name=== '' || content=== ''  ) {
        if (name==='') form.username.style.border = "2px solid red";
        else  form.username.style.border = "2px solid blue";       
        if (content==='') form.content.style.border = "2px solid red";
        else  form.content.style.border = "2px solid blue";
        document.getElementById("ermsg2").innerHTML = "* There is still empty field";
        return false;
    }
    else {
        form.username.style.border = "2px solid blue";        
        form.content.style.border = "2px solid blue";
        document.getElementById("ermsg2").innerHTML = "";
        return true;
    }
}
function validateEmail(form) {
   var email = document.getElementById("femail").value;
   var at="@";	var dot=".";var lstr=email.length;
   var lat=email.indexOf(at);var ldot=email.lastIndexOf(dot);
   if (lat<1||lat===lstr||ldot<1||ldot===lstr||ldot-lat<2){
       document.getElementById("ermsg").innerHTML = "* Make sure that your email is valid";
       form.email.style.border = "2px solid red";
       return false;}
    else  {document.getElementById("ermsg").innerHTML = "";form.email.style.border = "2px solid blue";return true;}
    
}
function formValidator(form) {
    var a =validateEmail(form),b=validateField(form);
    if (!a||!b) return false ;
    else  return true;
}

function answerValidator(form) {
    var a =validateEmail(form),b=validateField2(form);
    if (!a||!b) return false ;
    else  return true;
}

function deleteQuestion(id_q) {
    var c = confirm("Are you sure to delete this question ?");
    var txt ;
    if (c==true) { 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                
               // alert(xmlhttp.responseText);
               location.href="./home.php";
            }
            
        }
        
        xmlhttp.open("POST","delete.php",true);
        xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("id_q="+id_q);

    }
 }

function voteUp(sr,id) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                
                location.reload();
               
            } 
        }
     xmlhttp.open("POST","vote.php",true);
    xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("num=1&sr="+sr+"&id="+id);
 }
 
 
function voteDown(sr,id) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                
               location.reload();
               
            } 
        }
     xmlhttp.open("POST","vote.php",true);
    xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("num=-1&sr="+sr+"&id="+id);
 }
 

