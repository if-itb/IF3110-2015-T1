 function validateQuestionForm() {
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (document.forms["createquestion"]["createname"].value == null || document.forms["createquestion"]["createname"].value == "" ||
            document.forms["createquestion"]["createemail"].value == null || document.forms["createquestion"]["createemail"].value == "" ||
            document.forms["createquestion"]["createtopic"].value == null || document.forms["createquestion"]["createtopic"].value == "" ||
            document.forms["createquestion"]["createcontent"].value == null || document.forms["createquestion"]["createcontent"].value == "") {
            alert("All required fields must be filled out");
            return false;
        }
        else if(!re.test(document.forms["createquestion"]["createemail"].value)){
            alert("Incorrect email address");
            return false;
        }
    }
function validateAnswerForm(){
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (document.forms["createquestion"]["createname"].value == null || document.forms["createquestion"]["createname"].value == "" ||
            document.forms["createquestion"]["createemail"].value == null || document.forms["createquestion"]["createemail"].value == "" ||
            document.forms["createquestion"]["createcontent"].value == null || document.forms["createquestion"]["createcontent"].value == "") {
            alert("All required fields must be filled out");
            return false;
        }
        else if(!re.test(document.forms["createquestion"]["createemail"].value)){
            alert("Incorrect email address");
            return false;
        }    
}