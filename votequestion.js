function voteup(int) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("ajax").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","voteup.php?id="+int,true);
                xmlhttp.send();
            
        }

function votedown(int) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("ajax").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","votedown.php?id="+int,true);
                xmlhttp.send();
            
        }

function voteupans(int) {
            
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("ajax"+int).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","voteupans.php?id="+int,true);
                xmlhttp.send();
            
        }

function votedownans(int) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("ajax"+int).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","votedownans.php?id="+int,true);
                xmlhttp.send();
            
        }