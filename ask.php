<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  Ask a question...
	</title>
  </head>
  <body>
    <p align=center><font size=100><br>Simple StackExchange<br></font></p>
	<br>
	<div>
	  <p align=left>What's your question?</p>
	  <hr>
	  <form align=center name='question' action='index.php' method=post>
	    <input type=text size=90 name='user' placeholder='Name'><br>
	    <input type=text size=90 name='email' placeholder='E-mail'><br>
	    <input type=text size=90 name='subject' placeholder='Question Topic'><br>
	    <input type=text name='question_text' placeholder='Content'> <br>
	    <p align=right><input type='submit' value='Post'></p>
	  </form>
	</div>
  </body>
</html>