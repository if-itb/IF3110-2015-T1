<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  Search results
	</title>
  </head>
  <body>
    <p align=center><a class=top_logo href='index.php'><b><br>Simple StackExchange<br></b></a></p>
	<br>
	<div class=div_front>
	  <?php
	    if (isset($_POST['qword']) && trim($_POST['qword'])!=NULL)
	      echo "<p align=left><font size=5>Search results for '$_POST[qword]'</font></p>";
	    else {
		  //redirect to index when nothing to search
		  header("Location: index.php");
		  die();
	      }
	  ?>
	  <hr id=first_line>
	  <div class=quest_list>
	  <?php
        if (isset($_POST['qword']) && trim($_POST['qword'])!=NULL) {
		  $qword = $_POST['qword'];
          mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
          mysql_select_db("db_stackexchange") or die ("Failed to load database.");
          $query = "select * from questions where (question_text like '%$qword%') or (subject like '%$qword%') order by ask_date desc";
          $hasil = mysql_query($query);
		  if (mysql_num_rows($hasil)==0) { // check empty result
            echo "No question matched the topic specified.";
          } else {
			while ($data=mysql_fetch_array($hasil)) {
			  $id = $data['question_id'];
			  $vote = $data['n_upvote']-$data['n_downvote'];
			  $subject = nl2br($data['subject']);
			  $q_text = nl2br($data['question_text']);
			  echo "<span class=p_table>";
			  echo "<table><col width=110><col width=110><col width=999><tr>";
			  echo "<td valign=top align=center><br><font class=vote_font>$vote</font><br>Votes</td><td valign=top align=center><br><font class=vote_font>$data[n_answer]</font><br>Answers</td>";
			  echo "<td valign=top><a class=quest_font href=\"question.php?q_id=$id\"><p><b>$subject</b><br><br>$q_text</p></a></td>";
			  echo "</tr></table>";
			  echo "<p class=p_table align=right>asked by <font class=blue_font>$data[user]</font> | <a href=\"edit.php?q_id=$id\" class=yellow_font>edit</a> | <a href=\"\" onclick=\"deleteQuest($id);\" class=red_font>delete</a></p>";
			  echo "<hr></span>";
            };
          }
        };
      ?>
	  <script type='text/javascript'>
		  function deleteQuest(n) {
			var is_del_q = confirm("Do you want to delete this question?");
			if (is_del_q) {
			  var xhttp = new XMLHttpRequest();
			  var site = "del.php?q_id=" + n.toString();
			  xhttp.open("GET",site,true);
			  xhttp.send();
			  return false;
			}
		  }
		</script>
	  </div>
	  <br>
	  <p align=center><a href='index.php' class=yellow_font>Go back to index</a><br></p>
	</div>
  </body>
</html>