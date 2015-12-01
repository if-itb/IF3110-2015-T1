/* Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author  : Irene Wiliudarsan (13513002)
File    : script.js */

// Check whether search form is valid or not
// A valid form can not contain empty field and containt a valid email address
function searchFormValidation() {
  var searchValue = document.forms["search-form"].elements["search-key"].value;
  if (searchValue.length == 0 || searchValue == null) {
    alert("Searh key is not valid.")
    return false;
  } else {
    return true;
  }
}

// Check whether question form is valid or not
// A valid form can not contain empty field and contain a valid email address
function questionFormValidation(){
  var formValues = document.forms[0];
  var isFieldEmpty = false;
  var numberOfInput = 3;
  var i = 0;
  // Check whether there is an empty field in the form
  do {
    if (formValues.elements[i].value.length == 0 || formValues.elements[i].value == null) {
      isFieldEmpty = true;
    } else {
      i++;
    }
  } while (!isFieldEmpty && i<numberOfInput);
  // Check whether email address is valid
  var email = formValues.elements["answer-email"].value;
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var isEmailValid = regex.test(email);
  if (isFieldEmpty) {
    alert("There are empty fields. Please complete this form.");
    return false;
  } else if (!isEmailValid) {
    alert("Email is not valid.");
    return false;
  } else {
    return true;
  }
};

// Check whether answer form is valid or not
// A valid form can not contain empty field and contain a valid email address
function answerFormValidation(){
  var formValues = document.forms[0];
  var isFieldEmpty = false;
  var numberOfInput = 4;
  var i = 0;
  // Check whether there is an empty field in the form
  do {
    if (formValues.elements[i].value.length==0 || formValues.elements[i].value == null) {
      isFieldEmpty = true;
    } else {
      i++;
    }
  } while (!isFieldEmpty && i<numberOfInput);
  // Check whether email address is valid
  var email = formValues.elements["question-email"].value;
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var isEmailValid = regex.test(email);
  if (isFieldEmpty) {
    alert("There are empty fields. Please complete this form.");
    formValues.elements[i].focus();
    return false;
  } else if (!isEmailValid) {
    alert("Email is not valid.");
    formValues.elements["question-email"].focus();
    return false;
  } else {
    return true;
  }
};

// Update votes using AJAX
function updateVote(isQuestion, id, voteFactor) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if (isQuestion) {
        document.getElementById("question-" + id).innerHTML = xmlhttp.responseText;
      } else {
        document.getElementById("answer-" + id).innerHTML = xmlhttp.responseText;
      }
    }
  }
  var url = "update-vote.php?";
  if (isQuestion) {
    url += "id_question=";
  } else {
    url += "id_answer=";
  }
  url += id + "&vote_factor=" + voteFactor;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}