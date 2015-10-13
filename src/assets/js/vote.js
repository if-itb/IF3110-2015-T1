function upvoteQuestion(id) {
  var http = new XMLHttpRequest();
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("voteQuestion").innerHTML = http.responseText; 
    }
  }
  http.open("GET", "/controller/upvoteQuestionController.php?id=" + id);
  http.send();
}

function downvoteQuestion(id) {
  var http = new XMLHttpRequest();
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("voteQuestion").innerHTML = http.responseText; 
    }
  }
  http.open("GET", "/controller/downvoteQuestionController.php?id=" + id);
  http.send();
}

function upvoteAnswer(id) {
  var http = new XMLHttpRequest();
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("voteAnswer" + id).innerHTML = http.responseText; 
    }
  }
  http.open("GET", "/controller/upvoteAnswerController.php?id=" + id);
  http.send();
}

function downvoteAnswer(id) {
  var http = new XMLHttpRequest();
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("voteAnswer" + id).innerHTML = http.responseText; 
    }
  }
  http.open("GET", "/controller/downvoteAnswerController.php?id=" + id);
  http.send();
}