<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  Ask a question...
	</title>
  </head>
  <body>
    <p align=center><a class=top_logo href='index.php'><b><br>Simple StackExchange<br></b></a></p>
	<br>
	<div class=div_front>
	  <p align=left><font size=5>What's your question?</font></p>
	  <hr id=first_line>
	  <form align=center name='question' action='ask_success.php' onsubmit='return validateForm()' method=post>
	    <input type=text class=style_text name='user' placeholder='Name'><br>
	    <input type=text class=style_text name='email' placeholder='E-mail'><br>
	    <input type=text class=style_text name='subject' placeholder='Question Topic'><br>
	    <textarea name='question_text' placeholder='Content' wrap='soft'></textarea><br>
	    <p align=right><input type='submit' value='Post'></p>
		<script>
		  function validateForm() {
			var is_valid = true;
			var msg_alert = "";
            var x = document.forms["question"]["user"].value;
            if (x == null || x == "") {
			  msg_alert+="Name must be filled out!\n";
            }
			var x = document.forms["question"]["email"].value;
			var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (x == null || x == "") {
              msg_alert+="Email must be filled out!\n";
            } else if (!re.test(x)) {
			  msg_alert+="Email must be in correct format!\n";
			}
			var x = document.forms["question"]["subject"].value;
            if (x == null || x == "") {
              msg_alert+="Subject must be filled out!\n";
            }
			var x = document.forms["question"]["question_text"].value;
            if (x == null || x == "") {
              msg_alert+="Content must be filled out!\n";
            }
			if (msg_alert!="") {
			  is_valid = false;
			  alert(msg_alert);
			  }
			return is_valid;
          }
		</script>
	  </form>
	</div>
  </body>
</html>