<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css" type="text/css">

    <title>Simple StackExchange</title>
</head>
<body>
    <div id="header">
        <p id="logo">Simple StackExchange</p>
    </div>

    <div id="content" style="width:80%;margin:auto">
            <p id="content-title">What's your question?</p>
            <hr style="width:90%">
            <form id="question" method="post" action=""> 
               <input type="text" name="Name" placeholder="Name" value="<?php echo $name;?>">
               <input type="text" name="Email" placeholder="Email" value="<?php echo $email;?>">
               <input type="text" name="Question Topic" placeholder="Question Topic" value="<?php echo $website;?>">
               <textarea name="Content" placeholder="Content" rows="5" cols="40"><?php echo $comment;?></textarea>
               <input id="submit" type="submit" name="submit" value="Post"> 
            </form>
    </div>



</body>
</html>
