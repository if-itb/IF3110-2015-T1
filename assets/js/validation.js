function validateAskForm() {
    var name = document.forms["ask"]["name"].value;
    var email = document.forms["ask"]["email"].value;
    var topic = document.forms["ask"]["topic"].value;
    var content = document.forms["ask"]["content"].value;

    if (name == null || name == "") {
        alert("Name must be filled out.");
        return false;
    } else if (email == null || email == "") {
        alert("Email must be filled out.");
        return false;
    } else if (!validateEmail(email)) {
        alert("Invalid email address.");
        return false;
    }else if (topic == null || topic == "") {
        alert("Question topic must be filled out.");
        return false;
    } else if (content == null || content == "") {
        alert("Question content must be filled out.");
        return false;
    }
}

function validateAnswerForm() {
    var name = document.forms["answer"]["name"].value;
    var email = document.forms["answer"]["email"].value;
    var content = document.forms["answer"]["content"].value;

    if (name == null || name == "") {
        alert("Name must be filled out.");
        return false;
    } else if (email == null || email == "") {
        alert("Email must be filled out.");
        return false;
    } else if (!validateEmail(email)) {
        alert("Invalid email address.");
        return false;
    } else if (content == null || content == "") {
        alert("Question content must be filled out.");
        return false;
    }
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}