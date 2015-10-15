/* Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) */
// File: script.js

// Check whether question form is valid or not
// A valid form can not contain empty field and contain a valid email address
function questionFormValidation(){
  var formValues = document.forms[0];
  var isFieldEmpty = false;
  var numberOfInput = 3;
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