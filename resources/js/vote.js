function voteq(str) {
    if (str == "") {
        document.getElementById("voteq").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("voteq").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","voteq.php?id="+str,true);
        xmlhttp.send();
    }
}function voteqm(str) {
    if (str == "") {
        document.getElementById("voteq").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("voteq").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","voteqm.php?id="+str,true);
        xmlhttp.send();
    }
}
function votea(str) {
    if (str == "") {
        document.getElementById("votea"+str).innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("votea"+str).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","votea.php?id="+str,true);
        xmlhttp.send();
    }
}
function voteam(str) {
    if (str == "") {
        document.getElementById("votea"+str).innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("votea"+str).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","voteam.php?id="+str,true);
        xmlhttp.send();
    }
}