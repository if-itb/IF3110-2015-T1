<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>stackEXchange | Question</title>
        <meta name="description" content="Simple StackExchange">
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body>
        <h1>stackEXchange</h1>
        
        <h2>What's Your Question?</h2>
        <div id="askbar">
            <form method="post" action="index.php" name="formnanya"><input type="text" name="Name" placeholder="nama" class="inputask" id="asknama">
            <input type="text" name="email" placeholder="email" class="inputask" id="emailask">
            <input type="text" name="topic" placeholder="Question Topic" class="inputask">
            <textarea rows="4" columns="30" type="text" name="content" placeholder="content" class="inputask" ></textarea>
            <input type="hidden" name="id" value="NULL">
            <input type="submit" name="submit" value="Post" onclick="return validateEmail()"></form>
        </div>
    </body>
    
    
    </html>