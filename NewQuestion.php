<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>

<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<center>
    <a href="Homepage.php" id="dashboard">Simple StackExchange</a>

    <h4 class="relative1">
        What's your question?
    </h4>
    <hr width="770">

    <script>

        function checkscript() {
            var namesubmitted = document.forms["newquestion"]["Name"].value;
            var emailsubmitted = document.forms["newquestion"]["Email"].value;
            var questiontopicsubmitted = document.forms["newquestion"]["QuestionTopic"].value;
            var contentsubmitted = document.forms["newquestion"]["Content"].value;
            if (namesubmitted=="") {
                // something i s wrong
                alert("field nama tidak boleh kosong");
                return false;
            }else if (emailsubmitted==""){
                alert("field email tidak boleh kosong");
                return false;
            }else if (questiontopicsubmitted==""){
                alert("field question topic tidak boleh kosong");
                return false;
            }else if (contentsubmitted==""){
                alert("field content tidak boleh kosong");
                return false;
            }else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailsubmitted)){
                return true;
            }else{
                alert("format penulisan email salah");
                return false;
            }


            // If the script makes it to here, everything is OK,
            // so you can submit the form
            return true;
        }
    </script>

    <form name="newquestion" action="InputNewQuestion.php" method="post">
        <input id="req1" type="text" name="Name" value="Name" size="100"><br>
        <input type="text" name="Email" value="Email@example.com"size="100"><br>
        <input type="text" name="QuestionTopic" value="Question Topic" size="100"><br>
        <textarea cols="91" rows="4" type="text" name="Content">Content
        </textarea>
        <br><br>
        <input class="textboxposquestion" type="submit" value="post" onclick="return checkscript()">
    </form>



</center>

</body>
</html>