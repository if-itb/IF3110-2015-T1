
function validateQuestionForm(formName) {
    if (validateField(formName,'Name')) {
        if (validateField(formName,'Email')) {
            if (validateEmail(formName,'Email')) {
                if (validateField(formName,'Topic')) {
                    if (validateField(formName,'Content')) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function validateAnswerForm(formName) {
    if (validateField(formName,'Name')) {
        if (validateField(formName,'Email')) {
            if (validateEmail(formName,'Email')) {
                if (validateField(formName,'Content')) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function validateField(formName,fieldName) {
    var x = document.forms[formName][fieldName].value;
    if (x == null || x == "") {
        alert("All field must be filled");
        return false;
    } else {
        return true;
    }
}

function validateEmail(formName,fieldName) {
    var x = document.forms[formName][fieldName].value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(x)) {
        alert('Please provide a valid email address');
        return false;
    } else {
        return true;
    }
}