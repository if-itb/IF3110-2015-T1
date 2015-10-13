<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Edit Question</title>
  <meta charset="UTF-8">
</head>
 <body>
   <h1>Simple Stack Exchange</h1>
   <br>
   <div id=form>
     <h2>What's your question?</h2>
     <hr align="left">
     <form method="post" action="index.php">
       <input type="text" name="name" value="" placeholder="Name"><br>
       <input type="text" name="email" value="" placeholder="Email"><br>
       <input type="text" name="topic" value="" placeholder="Question Topic"><br>
       <textarea rows="4" cols="50" name="content" placeholder="Content"></textarea><br>
       <input type="submit" value="Post">
       <input type="hidden" name="q_id" value="">
     </form>
   </div>
 </body>
 </html>
