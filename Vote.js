function getVote(idbutton) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  var is_Up, id, is_Q;
  
  if(idbutton.charAt(0)=='Q'){
	is_Q = true;
	idbutton = idbutton.replace("Q","");
  } else {
	is_Q = false;
	idbutton = idbutton.replace("A","");
  }
  if(idbutton.charAt(0)=='U'){
	is_Up = true;
	idbutton = idbutton.replace("U","");
  } else {
	is_Up = false
	idbutton = idbutton.replace("D","");
  }   
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		if(is_Q){
			document.getElementById("Q"+idbutton).innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("A"+idbutton).innerHTML=xmlhttp.responseText;
		}
    }
  }
  
  xmlhttp.open("GET","Vote.php?id="+idbutton+"&Q="+is_Q+"&U="+is_Up,true);
  //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}