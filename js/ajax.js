function getXmlHttpRequest() {
    var xmlHttpObj;
    if (window.XMLHttpRequest) {
        xmlHttpObj = new XMLHttpRequest( );
    } else {
        try {
            xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttpObj = new
                ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                xmlHttpObj = false;
            }
        }
    }
    return xmlHttpObj;
}

function showComment(id) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var content = document.getElementById('content').value;
    var formdata = new FormData();
    formdata.set('id', id);
    formdata.set('name', name);
    formdata.set('email', email);
    formdata.set('content', content);
    var xmlhttp;
    if (!xmlhttp)
        xmlhttp = getXmlHttpRequest();
    if (!xmlhttp)
        return;
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("ajax_answer").innerHTML = xmlhttp.responseText;;
            document.getElementById('name').value = "";
            document.getElementById('email').value = "";
            document.getElementById('content').value = "";
        }
    }
    xmlhttp.open("POST","backend/add_answer.php",true);
	xmlhttp.send(formdata);
}
function upvoteQuestion(id){
    var xmlhttp;
    if (!xmlhttp)
        xmlhttp = getXmlHttpRequest();
    if (!xmlhttp)
        return;
    var formdata = new FormData();
    formdata.set('id', id);
    formdata.set('vote', 1);
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("votes").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","backend/ajax_vote_question.php",true);
    xmlhttp.send(formdata);
}
function upvoteAnswer(id){
    var xmlhttp;
    if (!xmlhttp)
        xmlhttp = getXmlHttpRequest();
    if (!xmlhttp)
        return;
    var formdata = new FormData();
    formdata.set('id', id);
    formdata.set('vote', 1);
    var elementID = "votes" + id;
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById(elementID).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","backend/ajax_vote_answer.php",true);
    xmlhttp.send(formdata);
}
function downvoteQuestion(id){
    var xmlhttp;
    if (!xmlhttp)
        xmlhttp = getXmlHttpRequest();
    if (!xmlhttp)
        return;
    var formdata = new FormData();
    formdata.set('id', id);
    formdata.set('vote', -1);
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("votes").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","backend/ajax_vote_question.php",true);
    xmlhttp.send(formdata);
}
function downvoteAnswer(id){
    var xmlhttp;
    if (!xmlhttp)
        xmlhttp = getXmlHttpRequest();
    if (!xmlhttp)
        return;
    var formdata = new FormData();
    formdata.set('id', id);
    formdata.set('vote', -1);
    var elementID = "votes" + id;
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById(elementID).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","backend/ajax_vote_answer.php",true);
    xmlhttp.send(formdata);
}
function countAnswer(id){
    var xmlhttp;
    if (!xmlhttp)
        xmlhttp = getXmlHttpRequest();
    if (!xmlhttp)
        return;
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("count").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","backend/ajax_count_answer.php",true);
    xmlhttp.send();
}