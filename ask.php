<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>stackEXchange | Question</title>
        <meta name="description" content="Simple StackExchange">
        <link rel="stylesheet" href="style/main.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <h1><a href="index.php">stackEXchange</a></h1>
        
        <h2 id="asktitle">What's Your Question?</h2>
        <div id="askbar">
            <form method="post" action="index.php" name="form1" onsubmit="return validateForm()">
                <input type="text" name="Name" placeholder="Nama" class="inputask" id="asknama">
                <input type="text" name="email" placeholder="Email" class="inputask" id="emailask">
                <input type="text" name="topic" placeholder="Question Topic" class="inputask" id="asktopic">
                <textarea rows="4" columns="30" type="text" name="content" placeholder="content" class="inputask" id="askcontent"></textarea>
                <input type="hidden" name="id" value="NULL">
                <input type="submit" name="submit" value="Post" id="asksubmit">
            </form>
        </div>
    </body>
    
    
    </html>