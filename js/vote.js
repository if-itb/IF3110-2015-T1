function VoteQuestionUp(id) {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("vote-q").innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","function/votequestion_up.php?id="+id,true);
  xmlhttp.send();
}

function VoteQuestionDown(id) {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("vote-q").innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","function/votequestion_down.php?id="+id,true);
  xmlhttp.send();
}

function VoteAnswerUp(id_ans) {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("vote-"+id_ans).innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","function/voteanswer_up.php?id_ans="+id_ans,true);
  xmlhttp.send();
}

function VoteAnswerDown(id_ans) {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("vote-"+id_ans).innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","function/voteanswer_down.php?id_ans="+id_ans,true);
  xmlhttp.send();
}