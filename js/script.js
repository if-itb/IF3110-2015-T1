

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

function validateEmail() {
    var status = false;
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
     if (re.test(document.getElementById("emailask"))  == false) {
        alert("Please enter a valid email address.");
     }
     else {
        status = true;
     }
     return status;
}