<?php
  session_start();
  mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
  mysql_select_db("db_stackexchange") or die ("Failed to load database.");
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  <?php
	    $question_id = $_GET['q_id'];
		$query = "select * from questions where question_id=$question_id";
        $hasil = mysql_query($query);
		while ($data=mysql_fetch_array($hasil)) {
			$user = $data['user'];
		    $email = $data['email'];
		    $subject = nl2br($data['subject']);
			$question_text = nl2br($data['question_text']);
			$date = $data['ask_date'];
			$n_upvote = $data['n_upvote'];
			$n_downvote = $data['n_downvote'];
			$n_answer = $data['n_answer'];
		}
		echo "$subject";
	  ?>
	</title>
  </head>
  <body>
    <p align=center><a class=top_logo href='index.php'><b><br>Simple StackExchange<br></b></a></p>
	<br>
	<div class=div_front>	  
	  <?php
	    $vote = $n_upvote-$n_downvote;
		echo "<span class=p_table>";
	    echo "<p align=left><font size=5>$subject</font></p>";
	    echo "<hr id=first_line>";
		echo "<div class=quest_list>";
	    echo "<table><col width=130><col width=999><tr>";
	    echo "<td align=center valign=top><br><img src=up_arrow.png><br><br><font class=vote_font>$vote</font><br><br><img src=down_arrow.png><br></td>";
	    echo "<td valign=top><p>$question_text</p></td>";
	    echo "</tr></table>";
		echo "<p class=p_table align=right>asked by <font class=blue_font>$user</font> (<font class=blue_font>$email</font>) at <font class=blue_font>$date</font> | <a href=\"edit.php?q_id=$question_id\" class=yellow_font>edit</a> | <a href='#' onclick=delete() class=red_font>delete</a></p>";
	    echo "</span>";
      ?>
	  </div>
	</div>
	<br>
	<div class=div_front>
	  <?php
	    echo "<p align=left><font size=5>$n_answer Answer(s)</font></p>";
	  ?>
	  <hr id=first_line>
	  <div class=quest_list>
	    <?php
          $query = "select * from answers where question_id=$question_id order by answer_date asc";
          $hasil = mysql_query($query);
		  if (mysql_num_rows($hasil)==0) { // check empty result
            echo "There are currently no answers to this question.";
          } else {
			while ($data=mysql_fetch_array($hasil)) {
			  $id = $data['answer_id'];
			  $vote = $data['n_upvote']-$data['n_downvote'];
			  $a_text = nl2br($data['answer_text']);
			  echo "<span class=p_table>";
			  echo "<table><col width=130><col width=999><tr>";
			  echo "<td valign=top align=center><br><font class=vote_font>$vote</font><br>Votes</td>";
			  echo "<td valign=top><p>$a_text</p></td>";
			  echo "</tr></table>";
			  echo "<p class=p_table align=right>answered by <font class=blue_font>$data[user]</font> (<font class=blue_font>$data[email]</font>) at <font class=blue_font>$data[answer_date]</font></p>";
			  echo "<hr></span>";
            };
          };
        ?>
	  </div>
	</div>
	<div class=div_front>
	  <p align=left><font size=5>Your Answer</font></p>
	  <?php
	  echo "<form align=center name='answer' action='question.php?q_id=$question_id' onsubmit='return validateForm()' method=post>";
	  ?>
	    <input type=text class=style_text autocomplete=off name='user' placeholder='Name'><br>
	    <input type=text class=style_text autocomplete=off name='email' placeholder='E-mail'><br>
	    <textarea name='answer_text' autocomplete=off placeholder='Content' wrap='soft'></textarea><br>
	    <p align=right><input type='submit' value='Post'></p>
		<script>
		  function validateForm() {
			var is_valid = true;
			var msg_alert = "";
            var x = document.forms["answer"]["user"].value;
            if (x == null || x == "") {
			  msg_alert+="Name must be filled out!\n";
            }
			var x = document.forms["answer"]["email"].value;
			var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (x == null || x == "") {
              msg_alert+="Email must be filled out!\n";
            } else if (!re.test(x)) {
			  msg_alert+="Email must be in correct format!\n";
			}
			var x = document.forms["answer"]["answer_text"].value;
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
	  <?php
	    if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['answer_text'])) {
		  $user = $_POST['user'];
		  $email = $_POST['email'];
		  $answer_text = $_POST['answer_text'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s');
          $query = "insert into answers (answer_text,user,answer_date,email,question_id,n_upvote,n_downvote) values ('$answer_text','$user',('$date'),'$email',$question_id,0,0);";
          $hasil = mysql_query($query);
		  $query = "update questions set n_answer=n_answer+1;";
          $hasil = mysql_query($query);
		  
        };
	  ?>
	  </div>
	</div>
    <p align=center><a href='index.php' class=yellow_font>Go back to index</a><br></p>	
  </body>
</html>