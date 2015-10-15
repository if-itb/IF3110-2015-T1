var inputFilled = function (id) {
  var element = document.getElementById(id);

  return element.value.trim() !== "";
};

var validEmailString = function (str) {
  var atPosition = str.indexOf("@");
  if (atPosition == -1) {
    return false;
  }

  if (((str.indexOf("@", atPosition+1) != -1) || (str.indexOf(".", atPosition+1) == -1)) && (str[str.length - 1] != '.')) {
    return false;
  }

  return true;
};

var inputId = [
  "authorInput",
  "authorEmailInput",
  "contentInput"
];

var submitAnswerForm = function () {
  for (var i = 0; i < inputId.length; i++) {
    if (!inputFilled(inputId[i])) {
      alert("Field tidak boleh kosong.");
      return;
    }
  }

  var email = document.getElementById("authorEmailInput").value;
  if (validEmailString(email)) {
    document.getElementById("answer-form").submit();
  } else {
    alert("Email is not valid");
  }
};

var upvoteThread = function(id) {
  var http = new XMLHttpRequest();
  var url = "/thread/upvote.php";
  var params = "id=" + id;
  http.open("POST", url, true);

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4) {
      if (http.status == 200) {
        console.log("ok");

        var element = document.getElementById("question-vote");
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote + 1);
      } else {
        alert("an error occured");
      }
    }
  };
  http.send(params);
};

var downvoteThread = function(id) {
  var http = new XMLHttpRequest();
  var url = "/thread/downvote.php";
  var params = "id=" + id;
  http.open("POST", url, true);

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4) {
      if (http.status == 200) {
        console.log("ok");

        var element = document.getElementById("question-vote");
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote - 1);
      } else {
        alert("an error occured");
      }
    }
  };
  http.send(params);
};

var upvoteAnswer = function(id) {
  var http = new XMLHttpRequest();
  var url = "/answer/upvote.php";
  var params = "id=" + id;
  http.open("POST", url, true);

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4) {
      if (http.status == 200) {
        console.log("ok");

        var element = document.getElementById("answer-vote-" + id);
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote + 1);
      } else {
        alert("an error occured");
      }
    }
  };
  http.send(params);
};

var downvoteAnswer = function(id) {
  var http = new XMLHttpRequest();
  var url = "/answer/downvote.php";
  var params = "id=" + id;
  http.open("POST", url, true);

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4) {
      if (http.status == 200) {
        console.log("ok");

        var element = document.getElementById("answer-vote-" + id);
        var vote = parseInt(element.innerHTML);
        element.innerHTML = "" + (vote - 1);
      } else {
        alert("an error occured");
      }
    }
  };
  http.send(params);
};