/**
 * Created by sorlawan on 04/10/15.
 */

function validateForm(inputs){
    var valid = true;
    for(var i=0;i<arguments.length;i++)
    {
        if(arguments[i].id==="email"){
            if(arguments[i].value.trim()==='') {
                addErrorClass(arguments[i]);
                valid &=false;
            }
            else
            {
                var emailValid = validateEmail(arguments[i].value);
                if(!emailValid) {
                    valid &=false;
                    addErrorClass(arguments[i]);
                }
                else
                {
                    removeErrorClass(arguments[i]);
                }
            }
        }
        else if (arguments[i].value.trim()==="")
        {
            addErrorClass(arguments[i]);
            valid &=false;
        }
        else
        {
            removeErrorClass(arguments[i]);
        }
    }
    return valid;
}


function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function addErrorClass(c) {
    var cClass= c.className;
    if(cClass.indexOf('error')===-1){ //Belum ada class error
        c.className+=" error";
    }
}

function removeErrorClass(c) {
    c.className = c.className.replace(/error/,'');
}