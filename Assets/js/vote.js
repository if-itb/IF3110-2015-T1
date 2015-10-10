function prepare(){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
};

function VoteUp(bool,id){
    prepare();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            if(bool) {
                document.getElementById("q_vote").innerHTML = xmlhttp.responseText;
            }
            else{
                document.getElementById("vote"+id).innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.open("GET","Data/getVote.php?v=up&id="+id+"&q="+bool,true);
    xmlhttp.send();
};

function VoteDown(bool,id){
    prepare();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            if(bool) {
                document.getElementById("q_vote").innerHTML = xmlhttp.responseText;
            }
            else{
                document.getElementById("vote"+id).innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.open("GET","Data/getVote.php?v=down&id="+id+"&q="+bool,true);
    xmlhttp.send();
};
