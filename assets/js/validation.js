function validateEmail(email) {
  var regex = /^[A-Z0-9._%+-]*[A-Z0-9]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,7}$/i;
  return regex.test(email);
}

function validateForm() {
  var form = document.forms["form"];
  var len = form.elements.length;
  for(var i = 0; i<len; i++) {
    var elm = form[i];
    var str = elm.value.trim();
    elm.value = str;
    elm.focus();
    if(str.length == 0) {
      var name = elm.name;
      alert(name.toUpperCase()+" must be filled out");
      return false;
    }
    if(elm.name=="email") {
      if(!validateEmail(elm.value)) {
        alert("EMAIL doesn't valid");
        elm.focus();
        return false;
      }
    }
  }
}

function removeQuestion(id) {
  if(confirm("Are you sure want to remove this question?")) {
    document.location = "?action=remove&id="+id;
  }
}