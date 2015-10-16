/**
 * Created by Marco Orlando on 10/11/2015.
 */


function voteUpdate(questionOrAnswer, questionOrAnswerId, voteUpOrDown){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
       if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            if(questionOrAnswer=='question') {
                document.getElementById("voteQuestion").innerHTML = xmlhttp.responseText;
            }
            else if(questionOrAnswer=='answer'){
                document.getElementById("voteAnswer"+questionOrAnswerId).innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.open("GET","voteUpdate.php?voteUpOrDown="+voteUpOrDown+"&questionOrAnswerId="+questionOrAnswerId+"&questionOrAnswer="+questionOrAnswer,true);
    xmlhttp.send();
}
