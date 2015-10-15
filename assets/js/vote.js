function changeQuestionVote(id, dvote) {
  var xmlhttp;
  if(window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  }
  else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("vote").innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET", "?action=vote_question&id=" + id + "&dvote=" + dvote, true);
  xmlhttp.send();
}
function changeAnswerVote(q_id, id, dvote) {
  var xmlhttp;
  if(window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  }
  else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("vote-"+id).innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET", "?action=vote_answer&q_id="+q_id+"&id=" + id + "&dvote=" + dvote, true);
  xmlhttp.send();
}