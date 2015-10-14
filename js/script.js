

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