function validateEmail(email) {
  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  return re.test(email);
}

var askForm = [
  "authorName",
  "authorEmail",
  "topic",
  "content"
];

var answerForm = [
  "authorName",
  "authorEmail",
  "content"
];


function validateAsk() {
  var len = askForm.length;
  for(var i = 0; i < len; i++) {
    var temp = document.getElementById(askForm[i]).value;
    if(temp == "" || temp == null) {
      alert("Form cannot be blank.");
      return false;
    }
  }
  var email = document.getElementById("authorEmail").value;
  if(!validateEmail(email)) {
    alert("Email invalid.");
    return false;
  }
  document.form["ask"].submit();
}

function validateAnswer() {
  var len = askForm.length;
  for(var i = 0; i < len; i++) {
    var temp = document.getElementById(askForm[i]).value;
    if(temp == "" || temp == null) {
      alert("Form cannot be blank.");
      return false;
    }
  }
  var email = document.getElementById("authorEmail").value;
  if(!validateEmail(email)) {
    alert("Email invalid.");
    return false;
  }
  document.form["answer"].submit();
}

function confirmDelete(num) {
  var ret = confirm('Are you sure want to delete?');
  if(ret) {
    var str = "/controller/deleteController.php?id=" + num;
    document.location = str;
  }
}
