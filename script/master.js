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
    document.getElementById('name').setAttribute('placeholder','Name must be filled out');
    document.getElementById('name').style.borderColor='red';
    isNameValid=false;
  } else {
    document.getElementById('name').setAttribute('placeholder','Name');
    document.getElementById('name').style.borderColor='green';
  }
  if(email==''){
    document.getElementById('email').setAttribute('placeholder','Email must be filled out');
    document.getElementById('email').style.borderColor='red';
    isEmailValid=false;
  } else {
    isEmailValid=validateEmail(email);
    if(!isEmailValid) {
      alert('Email Invalid');
      document.getElementById('email').style.borderColor='red';
    } else {
      document.getElementById('email').setAttribute('placeholder','Email');
      document.getElementById('email').style.borderColor='green';
    }
  }
  if(topic==''){
    document.getElementById('topic').setAttribute('placeholder','Question topic must be filled out');
    document.getElementById('topic').style.borderColor='red';
    isTopicValid=false;
  } else {
    document.getElementById('topic').setAttribute('placeholder','Question topic');
    document.getElementById('topic').style.borderColor='green';
  }
  if(content==''){
    document.getElementById('content').setAttribute('placeholder','Content must be filled out');
    document.getElementById('content').style.borderColor='red';
    isContentValid=false;
  } else {
    document.getElementById('content').setAttribute('placeholder','Content');
    document.getElementById('content').style.borderColor='green';
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
    document.getElementById('name').setAttribute('placeholder','Name must be filled out');
    document.getElementById('name').style.borderColor='red';
    isNameValid=false;
  } else {
    document.getElementById('name').setAttribute('placeholder','Name');
    document.getElementById('name').style.borderColor='green';
  }
  if(email==''){
    document.getElementById('email').setAttribute('placeholder','Email must be filled out');
    document.getElementById('email').style.borderColor='red';
    isEmailValid=false;
  } else {
    isEmailValid=validateEmail(email);
    if(!isEmailValid) {
      alert('Email Invalid');
      document.getElementById('email').style.borderColor='red';
    } else {
      document.getElementById('email').setAttribute('placeholder','Email');
      document.getElementById('email').style.borderColor='green';
    }
  }
  if(content==''){
    document.getElementById('content').setAttribute('placeholder','Content must be filled out');
    document.getElementById('content').style.borderColor='red';
    isContentValid=false;
  } else {
    document.getElementById('content').setAttribute('placeholder','Content');
    document.getElementById('content').style.borderColor='green';
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
