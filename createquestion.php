<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="createquestionstyles.css">
    <title>Simple Stack Exchange</title>
</head>
<body>
    <h1>Simple StackExchange</h1>
    <br/>
    <br/>
    <div class="title">
        <h2>What's your question?</h2>
        <hr> <br/>
    </div>
    <script type="text/javascript" src="validate.js"></script>
    <form name="createquestion" action="insertquestion.php" onsubmit="return validateForm()" method="post">
        <div class="formfield">
            <input type="text" name="username" placeholder="Name"> <br/>
            <input type="text" name="useremail" placeholder="Email"> <br/>
            <input type="text" name="qtopic" placeholder="Question Topic"> <br/>
            <textarea name="qcontent" placeholder="Content"></textarea> <br/>
        </div>
        <input type="submit" value="Post" id="postbutton"> <br/>
    </form>
</body>
</html>

