<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  Edit question...
	</title>
  </head>
  <body>
    <p align=center><a class=top_logo href='index.php'><b><br>Simple StackExchange<br></b></a></p>
	<br>
	<div class=div_front>
	  <p align=left><font size=5>Edit your question</font></p>
	  <hr id=first_line>
	  <?php
		$question_id = $_GET['q_id'];
	  ?>
	  <form align=center name='question' action='edit_success.php' onsubmit='return validateForm()' method=post>
	    <?php
		  mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
          mysql_select_db("db_stackexchange") or die ("Failed to load database.");
          $query = "select * from questions where question_id=$question_id";
          $hasil = mysql_query($query);
		  while ($data=mysql_fetch_array($hasil)) {
			$user = $data['user'];
		    $email = $data['email'];
		    $subject = $data['subject'];
		    $question_text = $data['question_text'];
		  }
	      echo "<input type=text class=style_text disabled autocomplete=off name='user' placeholder='Name' value='$user'><br>";
	      echo "<input type=text class=style_text disabled autocomplete=off name='email' placeholder='E-mail' value='$email'><br>";
	      echo "<input type=text class=style_text autocomplete=off name='subject' placeholder='Question Topic' value='$subject'><br>";
	      echo "<textarea name='question_text' autocomplete=off placeholder='Content' wrap='soft'>$question_text</textarea><br>";
		  echo "<input type=text class=style_text autocomplete=off name='q_id' value='$question_id' hidden><br>";
	      echo "<p align=right><input type='submit' value='Post'></p>";
		?>
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