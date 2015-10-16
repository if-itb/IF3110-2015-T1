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

function postAnswer(id) {
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
            temp = document.getElementById("ajax_answer").innerHTML
            document.getElementById("ajax_answer").innerHTML = temp + "\n" + xmlhttp.responseText;;
            document.getElementById('name').value = "";
            document.getElementById('email').value = "";
            document.getElementById('content').value = "";
        }
    }
    xmlhttp.open("POST","backend/post-answer.php",true);
	xmlhttp.send(formdata);
}