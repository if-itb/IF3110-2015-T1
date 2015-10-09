<!--/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 4:09 PM
 */

-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Simple StackExchange</title>
    <script>
        function validateEmail(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            return re.test(email);
        }

        function validateForm(){
            var x = document.forms["myForm"]["name"].value;
            if (x==null || x==""){
                alert("Name must be filled");
                return false;
            }

            var y = document.forms["myForm"]["email"].value;
            if (y==null || y==""){
                alert("Name must be filled");
                return false;
            } else if (!validateEmail(y)){
                alert("Email is not a valid");
                return false;
            }


            var a = document.forms["myForm"]["topic"].value;
            if (a==null || a==""){
                alert("Topic must be filled");
                return false;
            }

            var b = document.forms["myForm"]["content"].value;
            if (b==null || b==""){
                alert("Content must be filled");
                return false;
            }
        }
    </script>
</head>

<body>
    <div id="container">
        <div id="head">
            <span id="Judul">Simple StackExchange</span>
            <h2>What's your question?</h2>
        </div>


        <div id="body">
            <form action="addQuestionToDB.php" method="post" onsubmit="return validateForm()">
                <input type="text" name="name" placeholder="Name"><br>
                <input type="text" name="email" placeholder="Email"><br>
                <input type="text" name="questionTopic" placeholder="Question Topic"><br>
                <textarea name="questionContent" placeholder="Content"></textarea><br>
                <input type="submit">
            </form>
        </div>

    </div>

</body>
</html>