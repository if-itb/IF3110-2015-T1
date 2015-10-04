/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validateQuestionForm(formName) { // Can be optimized, I think?
    if (validateField(formName,'Name')) {
        if (validateField(formName,'Email')) {
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



