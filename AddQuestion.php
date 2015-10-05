<!DOCTYPE html>
<html>
<head>
    <script type = "text/javascript">
        function validateEmail(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            return re.test(email);
        }
        function validateForm(){
            var x = document.forms["q_form"]["name"].value;
            var y = document.forms["q_form"]["email"].value;
            var z = document.forms["q_form"]["topic"].value;
            var a = document.forms["q_form"]["content"].value;
            if(x==null || x==''){
                alert("Name must be filled");
                return false;
            }
            if(y==null || y==''){
                alert("Email must be filled");
                return false;
            }else if(!validateEmail(y)){
                alert("Email is not a valid email");
                return false;
            }
            if(z==null || z==''){
                alert("Topic must be filled");
                return false;
            }
            if(a==null || a==''){
                alert("Content must be filled");
                return false;
            }
        }
    </script>
    <link rel ="stylesheet" type="text/css" href="Index.css">
    <title>Simple StackExchange</title>

</head>

<body>
<div id = "container">
    <div id  = "header">
        <span id  = "logo"> Simple StackExchange </span>
    </div>
    <div id = "content">
        <h2>What's Your Question?</h2>
        <form name = "q_form" action="adding.php" onsubmit="return validateForm()" method = "post">
            <input type = "text" name = "name" placeholder = "Name"/>
            <input type = "text" name = "email" placeholder = "Email"/>
            <input type = "text" name = "topic" placeholder ="Question Topic"/>
            <textarea name = "content" placeholder = "Content"></textarea>
            <input class = "button" id="button_post" type = "submit" value="Post"/>
        </form>
    </div>
    <div id = "footer">

    </div>
</div>
<body>