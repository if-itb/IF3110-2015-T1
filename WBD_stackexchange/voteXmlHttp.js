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
            if(questionOrAnswer=="question") {
                document.getElementById("$vote").innerHTML = xmlhttp.responseText;
            }
            else if(questionOrAnswer=="answer"){
                document.getElementById("vote"+id).innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.open("GET","Data/getVote.php?v=up&id="+id+"&q="+bool,true);
    xmlhttp.send();








}