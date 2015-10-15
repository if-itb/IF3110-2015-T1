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
  "topicInput",
  "contentInput"
];

var submitThreadForm = function () {
  for (var i = 0; i < inputId.length; i++) {
    if (!inputFilled(inputId[i])) {
      alert("Field tidak boleh kosong.");
      return;
    }
  }

  var email = document.getElementById("authorEmailInput").value;
  if (validEmailString(email)) {
    document.getElementById("thread-form").submit();
  } else {
    alert("Email is not valid");
  }
};