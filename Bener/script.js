    function deleteconfirm(s){
    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
    	document.location =  "delete_question.php?question_id=" + s;
    }
    return del;
    }

    function editconfirm(s){
    var edit=confirm("Are you sure you want to edit this record?");
    if (edit==true){
    	document.location =  "ask.php?question_id=" + s;
    }
    return edit;
    }

    function goToQuestion(s){

    document.location =  "answer.php?question_id=" + s;
    return true;
    }

    function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
    }

    function validateForm() {
        var formName = "askForm";
        var name = document.forms[formName]["name"].value;
        var email = document.forms[formName]["email"].value;
        var topic = document.forms[formName]["topic"].value;
        var content = document.forms[formName]["content"].value;

        if (name == null || name == "" || email == null || email == "" || topic == null || topic == "" || content == null || content == "") {
            alert("All field must be filled out");
            return false;
        }

        if(!validateEmail(email)){
            alert("Email format is not recognized");
            return false;
        }
    }







    function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}