/* Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) */
// File: script.js

// Window pop-up to confirm post deletion
function deleteConfirmation() {
  var isConfirmed = confirm("Do you want to delete this post?");
  if (isConfirmed) {
    // Delete post from database
  } else {

  }
};

// Check whether form is valid or not
// A valid form can not contain empty field and contain a valid email address
function formValidation(){
  var formValues = document.forms[0];
  var isFieldEmpty = false;
  var i = 0;
  // Check whether there is an empty field in the form
  do {
    if (formValues.elements[i].value.length==0) {
      isFieldEmpty = true;
    } else {
      i++;
    }
  } while (!isFieldEmpty && i<formValues.length-1);
  // Check whether email address is valid
  var email = document.getElementById("email").value;
  var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var isEmailNotValid = regex.test(email);
  if (isFieldEmpty || isEmailNotValid) {
    alert("There are empty fields and/or email is not valid.");
  }
};