function validateEmail(mail) {
  var reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if (reg.test(mail)) {
    return true;
  } else {
    alert("Wrong email format");
    return false;
  }
}

function validateForm() {
  if (null === document.getElementById('topic')) {
    var topic = 'dummy';
  } else {
    var topic = document.myform.topic.value;
  }

  var name = document.myform.name.value;
  var email = document.myform.email.value;
  var content = document.myform.content.value;
  if (name == '') {
    alert('Username cannot be empty')
    return false;
  }
  else if (email == '') {
    alert('Email cannot be empty')
    return false;
  }
  else if (topic == '') {
    alert('Topic cannot be empty')
    return false;
  }
  else if (content == '') {
    alert('Content cannot be empty')
    return false;
  }
  else return validateEmail(email);
}