function vote(ID, qa, updown){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                if (qa == 'question') {
                    document.getElementById("qvote").innerHTML = xhttp.responseText;
                } else {
                    document.getElementById("avote"+ID).innerHTML = xhttp.responseText;
                }
            }
        };
        xhttp.open("POST", "./mysql/vote.php", true);
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + ID + "&qa=" + qa + "&ud=" + updown);
    }

