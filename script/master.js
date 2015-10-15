function confirmDeletion() {
  var result = confirm("Want to delete?");
  if (result) {
    return true;
  } else {
    return false;
  }
}

function validateEmail(email) {
  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  return re.test(email);
}

function validateQuestion(){
  var name=document.forms['questionForm']['name'].value;
  var email=document.forms['questionForm']['email'].value;
  var topic=document.forms['questionForm']['topic'].value;
  var content=document.forms['questionForm']['content'].value;
  var isNameValid=true;
  var isEmailValid=true;
  var isTopicValid=true;
  var isContentValid=true;
  var isValid=true;

  if(name==''){
    document.getElementById('nameErr').innerHTML='Name must be filled out';
    isNameValid=false;
  } else {
    document.getElementById('nameErr').innerHTML='';
  }
  if(email==''){
    document.getElementById('emailErr').innerHTML='Email must be filled out';
    isEmailValid=false;
  } else {
    isEmailValid=validateEmail(email);
    if(!isEmailValid) {
      document.getElementById('emailErr').innerHTML='Email invalid';
    } else {
      document.getElementById('emailErr').innerHTML='';
    }
  }
  if(topic==''){
    document.getElementById('topicErr').innerHTML='Question topic must be filled out';
    isTopicValid=false;
  } else {
    document.getElementById('topicErr').innerHTML='';
  }
  if(content==''){
    document.getElementById('contentErr').innerHTML='Content must be filled out';
    isContentValid=false;
  } else {
    document.getElementById('contentErr').innerHTML='';
  }

  isValid= isNameValid && isEmailValid && isTopicValid && isContentValid;
  return isValid;
}

function validateAnswer(){
  var name=document.forms['answerForm']['name'].value;
  var email=document.forms['answerForm']['email'].value;
  var content=document.forms['answerForm']['content'].value;
  var isNameValid=true;
  var isEmailValid=true;
  var isContentValid=true;
  var isValid=true;

  if(name==''){
    document.getElementById('nameErr').innerHTML='Name must be filled out';
    isNameValid=false;
  } else {
    document.getElementById('nameErr').innerHTML='';
  }
  if(email==''){
    document.getElementById('emailErr').innerHTML='Email must be filled out';
    isEmailValid=false;
  } else {
    isEmailValid=validateEmail(email);
    if(!isEmailValid) {
      document.getElementById('emailErr').innerHTML='Email invalid';
    } else {
      document.getElementById('emailErr').innerHTML='';
    }
  }
  if(content==''){
    document.getElementById('contentErr').innerHTML='Content must be filled out';
    isContentValid=false;
  } else {
    document.getElementById('contentErr').innerHTML='';
  }

  isValid= isNameValid && isEmailValid && isTopicValid && isContentValid;
  return isValid;
}

function vote(obj, id, vote) {
  var http;
  if(window.XMLHttpRequest){
    http = new XMLHttpRequest();
  } else {
    http = new ActiveXObject("Microsoft.XMLHTTP");
  }
  if (obj=='question') {
    var elmtID='questionVote';
    if(vote=='up') {
      var param = "&vote=up&obj=question&id="+id;
    } else {
      var param = "&vote=down&obj=question&id="+id;
    }
  } else {
    var elmtID='answerVote-'+id;
    if(vote=='up') {
      var param = "&vote=up&obj=answer&id="+id;
    } else {
      var param = "&vote=down&obj=answer&id="+id;
    }
  }
  http.onreadystatechange = function() {
    if (http.readyState == 4 && http.status == 200) {
        document.getElementById(elmtID).innerHTML = http.responseText;
    }
  }
  http.open("POST", "vote.php", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  http.setRequestHeader("Content-length", param.length);
  http.send(param);
}
