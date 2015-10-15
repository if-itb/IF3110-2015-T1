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
	  <p align=left><font size=5>Your question</font></p>
	  <hr id=first_line>
	  <?php
        if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['question_text'])) {
		  $user = $_POST['user'];
		  $email = $_POST['email'];
		  $subject = $_POST['subject'];
		  $question_text = $_POST['question_text'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s');
		  //echo "$user - $email - $subject - $question_text<br>";
		  //echo "$date<br>";
          mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
          mysql_select_db("db_stackexchange") or die ("Failed to load database.");
          $query = "insert into questions (subject,question_text,user,ask_date,email,n_answer,n_upvote,n_downvote) values ('$subject','$question_text','$user',('$date'),'$email',0,0,0);";
          $hasil = mysql_query($query);
		  
		  //echo "$query<br>$hasil";
        };
      ?>
	  <p align=center>This question is successfully submitted.</p>
	  <p align=center><a href='index.php' class=yellow_font>Go back to index</a><br></p>
	</div>
  </body>
</html>