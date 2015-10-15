/*function validateForm() {
    var val_name = document.forms["form"]["name"].value;
    var val_email = document.forms["form"]["email"].value;
    var val_content = document.forms["form"]["content"].value;
    
    if (val_name === null || val_name === "") 
    {
        alert("Fill Name !");
        return false;
    }
   
    if (val_email === null || val_email === "") 
    {
        alert("Fill Email !");
         return false;
    }

    if (val_content === null || val_content === "")
    {
         alert("Fill Content !");
         return false;
    }
             
    return true;

}*/

function deleteConfirm(no_question) 
{
    if (confirm("Are you sure want to delete this question?")) {
        document.location = "question_delete.php?no_question=" + no_question;
    }
}

function validateForm() {
    var val_name = document.forms["form"]["name"].value;
    var val_email = document.forms["form"]["email"].value;
    var val_topic = document.forms["form"]["topic"].value;
    var val_content = document.forms["form"]["content"].value;
    
    if (val_name === null || val_name === "") 
    {
        alert("Fill Name !");
        return false;
    }
   
    if (val_email === null || val_email === "") 
    {
        alert("Fill Email !");
         return false;
    }
    else
    {
        if (!validateEmail(val_email))
        {
            alert("Email Invalid !")
            return false;
        }
    }

    if (val_topic === null || val_topic === "") 
    {
        alert("Fill Question Topic !");
        return false;
    }
    
    if (val_content === null || val_content === "")
    {
         alert("Fill Content !");
         return false;
    }
             
    return true;

}
    
function validateEmail(val_email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(val_email);
}

function validateAnswer() {
    var val_name = document.forms["form"]["name"].value;
    var val_email = document.forms["form"]["email"].value;
    var val_content = document.forms["form"]["content"].value;
    
    if (val_name === null || val_name === "") 
    {
        alert("Fill Name !");
        return false;
    }
   
    if (val_email === null || val_email === "") 
    {
        alert("Fill Email !");
         return false;
    }
    else
    {
        if (!validateEmail(val_email))
        {
            alert("Email Invalid !")
            return false;
        }
    }

    if (val_content === null || val_content === "")
    {
         alert("Fill Content !");
         return false;
    }
             
    return true;

}


function editVote(id) 
{
  var xhttp;

    if (id.indexOf("question") > -1)
    {
        var kind = "question";
        id = id.replace("question_","");
    }
    else if (id.indexOf("answer") > -1)
    {
        var kind = "answer";
        id = id.replace("answer_","");
    }
    
        
    if (id.indexOf("up") > -1)
    {
        id = id.replace("up","");
        var isUp = true;
    }
    else if (id.indexOf("down") > -1)
    {
        id = id.replace("down","");
        var isUp = false;
    }
    else
        var isUp = null;
     
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (xhttp.readyState == 4 && xhttp.status == 200) 
    {
        console.log(xhttp.responseText);
        if (isUp)
        {
            i = 1;
        }
        else
        {
            i = -1;
        }
        console.log(xhttp.responseText);
        if(xhttp.responseText == "yes")
        {
            document.getElementById(kind+id).innerHTML = parseInt(document.getElementById(kind+id).innerHTML) + i;
           // document.getElementById(id).innerHTML = xmlhttp.responseText;
        }
        else
        {
            document.getElementById(kind+id).innerHTML = parseInt(document.getElementById(kind+id).innerHTML) + i;
        }
    }
  }
  xhttp.open("GET", "vote.php?kind="+kind+"+&id="+id+"&isUp="+isUp, true);
  xhttp.send();   
}

