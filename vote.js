

function vote(idButton) {

  if (window.XMLHttpRequest) {
    xmlhttp= new XMLHttpRequest(); 
  } else {
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP"); 

  }
  
  var Up,quest; 

  if(idButton.charAt(0)=='Q')
  {
    quest = true; 
    idButton = idButton.replace("Q", ""); 
  }
  else { 
    quest = false; 
    idButton = idButton.replace("A", ""); 
  }

  if(idButton.charAt(0) == 'U')
  {
    Up = true; 
    idButton = idButton.replace("U", ""); 
  }
  else { 
    Up = false; 
    idButton = idButton.replace("D", ""); 
  }

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if(quest) {
        document.getElementById("Q" + idButton).innerHTML = xmlhttp.responseText;
      } else { 
        document.getElementById("A" + idButton).innerHTML = xmlhttp.responseText;
      }
    
    }
  }
  xmlhttp.open("GET", "vote.php?id="+idButton+"&Q="+quest+"&U="+Up, true);
  xmlhttp.send();
}