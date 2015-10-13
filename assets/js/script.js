function vote(id,identify,type) {
  var xhttp;    
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if (identify == "question")
        document.getElementById("questvote").innerHTML = xhttp.responseText;
      else {
        console.log(id);
        console.log("ansvote-"+id);
        document.getElementById("ansvote-"+id).innerHTML = xhttp.responseText;
      }
    }
  }
  xhttp.open("GET", "controllers/vote.controller.php?id="+id+"&identify="+identify+"&type="+type, true);
  xhttp.send();
}