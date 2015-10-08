<?php
    if (isset($_GET['id'])){
        $update = true;
        $id = $_GET['id'];
        $username = 'root';
        $password = '';
        $database = 'stackex';
        mysql_connect('localhost', $username, $password);
        @mysql_select_db($database) or die("Unable to Select Database");
        $query = "SELECT * FROM questions WHERE ID = $id";
        $result = mysql_query($query);
        $topic = mysql_result($result, 0,"topic");
        $content = mysql_result($result, 0,"content");
        $author = mysql_result($result, 0,"author");
        $email = mysql_result($result,0,"email");
        mysql_close();
    }
    else{
        $id = 0;
        $update = false;
        $topic = "";
        $content = "";
        $author = "";
        $email = "";
    }
?>

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
            <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
            <input type = "hidden" name = "update" value = "<?php echo $update; ?>">
            <input type = "text" name = "name" placeholder = "Name" value = "<?php echo $author; ?>">
            <input type = "text" name = "email" placeholder = "Email"value = "<?php echo $email; ?>">
            <input type = "text" name = "topic" placeholder ="Question Topic" value = "<?php echo $topic; ?>">
            <textarea name = "content" placeholder = "Content" ><?php echo $content; ?></textarea>
            <input class = "button" id="button_post" type = "submit" value=<?php if($update){echo "Update";}else{echo "Post";}?>>
        </form>
    </div>
    <div id = "footer">

    </div>
</div>
<body>