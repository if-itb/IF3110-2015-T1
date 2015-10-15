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
	  <p align=left><font size=5>Search results</font></p>
	  <hr id=first_line>
	  <div class=quest_list>
	  <?php
        if (isset($_POST['qword'])) {
		  $qword = $_POST['qword'];
          mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
          mysql_select_db("db_stackexchange") or die ("Failed to load database.");
          $query = "select * from questions where (question_text like '%$qword%') or (subject like '% $qword%') order by ask_date desc";
          $hasil = mysql_query($query);
		  if (mysql_num_rows($hasil)==0) { // check empty result
            echo "No question matched the topic specified.";
          } else {
			while ($data=mysql_fetch_array($hasil)) {
			  $vote = $data['n_upvote']-$data['n_downvote'];
			  echo "<span class=p_table>";
			  echo "<table><col width=90><col width=90><col width=999><tr>";
			  echo "<td align=center>$vote<br>Votes</td><td align=center>$data[n_answer]<br>Answers</td>";
			  echo "<td valign=top><p><b>$data[subject]</b><br></p></td>";
			  echo "</tr></table>";
			  echo "<p align=right>asked by <font class=blue_font>$data[user]</font> | <font class=yellow_font>edit</font> | <font class=red_font>delete</font></p>";
			  echo "<hr></span>";
              //echo "<a href='question.php'>$data[subject]</a> - $data[question_text] - $data[user] - $data[ask_date]<br>";
            };
          }
        };
      ?>
	  </div>
	  <br>
	  <p align=center><a href='index.php' class=yellow_font>Go back to index</a><br></p>
	</div>
  </body>
</html>