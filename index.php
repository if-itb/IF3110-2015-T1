<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  Simple StackExchange
	</title>
  </head>
  <body>
    <p align=center><a class=top_logo href='index.php'><b><br>Simple StackExchange<br></b></a></p>
	<br>
	<div class=div_front>
	  <form align=center name='search' action='search.php' method=post>
	    <br>
        <input size=85 type='text' name='qword' placeholder='Search topics...'> <input type='submit' value='Search'>
      </form>
	  <p align=center>Cannot find what you are looking for? <a href='ask.php' class=yellow_font>Ask here</a><br></p>
	</div>
	<div class=div_front>
	  <p align=left><font size=5>Recently Asked Questions</font></p>
	  <hr id=first_line>
	  <div class=quest_list>
        <?php
          mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
          mysql_select_db("db_stackexchange") or die ("Failed to load database.");
          $query = "select * from questions order by ask_date desc";
          $hasil = mysql_query($query);
		  if (mysql_num_rows($hasil)==0) { // check empty result
            echo "There are currently no question asked.";
          } else {
			while ($data=mysql_fetch_array($hasil)) {
			  $vote = $data['n_upvote']-$data['n_downvote'];
			  echo "<span class=p_table>";
			  echo "<table><col width=90><col width=90><col width=999><tr>";
			  echo "<td align=center>$vote<br>Votes</td><td align=center>$data[n_answer]<br>Answers</td>";
			  echo "<td valign=top><p><b>$data[subject]</b><br></p></td>";
			  echo "</tr></table>";
			  echo "<p class=p_table align=right>asked by <font class=blue_font>$data[user]</font> | <font class=yellow_font>edit</font> | <font class=red_font>delete</font></p>";
			  echo "<hr></span>";
            };
          };
        ?>
	  </div>
	</div>
  </body>
</html>