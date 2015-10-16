
function votingup(qid, idnya) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("votecountnum").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "voting.php?qid=" + qid + "&idnya=" + idnya, true);
        xmlhttp.send();
}

function votingans(qid, idnya) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("votecountans").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "voting.php?qid=" + qid + "&idnya=" + idnya, true);
        xmlhttp.send();
}

function hapusquestion() {
    confirm("Yakin mau didelete?");
}

function seredirect() {
        window.location.href = "index.php"
        
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateAnsForm() {
    var val_name = document.forms["form2"]["Name"].value;
    var val_email = document.forms["form2"]["email"].value;
    var val_content = document.forms["form2"]["content"].value;
    
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

function validateForm() {
    var val_name = document.forms["form1"]["Name"].value;
    var val_email = document.forms["form1"]["email"].value;
    var val_topic = document.forms["form1"]["topic"].value;
    var val_content = document.forms["form1"]["content"].value;
    
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
