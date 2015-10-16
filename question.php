<?php
  session_start();
  mysql_connect("localhost", "root", "") or die ("Failed to connect to MySQL.");
  mysql_select_db("db_stackexchange") or die ("Failed to load database.");
  
  $id = $_GET['q_id'];
  $query = "select * from questions where question_id=$id";
  $hasil = mysql_query($query);
  if(mysql_num_rows($hasil)<=0) {
    // Kasus index invalid / tidak ada pada dabatase
    header('HTTP/1.1 404 Question Not Found');
    header('Location: index.php');
  } else {
    // Kasus index valid
    while ($data=mysql_fetch_array($hasil)) {
      $subject = nl2br($data['subject']);
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet type=text/css href='style.css'>
	<title>
	  <?php
      echo $subject;
	  ?>
	</title>
  </head>
  <body>
    <p align=center><a class=top_logo href='index.php'><b><br>Simple StackExchange<br></b></a></p>
	<br>
	<div class=div_front>	  
	  <?php
	    if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['answer_text'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $answer_text = $_POST['answer_text'];
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $query = "insert into answers (answer_text,user,answer_date,email,question_id,n_upvote,n_downvote) values ('$answer_text','$user',('$date'),'$email',$id,0,0);";
        $hasil = mysql_query($query);
        $query = "update questions set n_answer=n_answer+1 where question_id=$id;";
        $hasil = mysql_query($query);
      };
      $query = "select * from questions where question_id=$id";
      $hasil = mysql_query($query);
      while ($data=mysql_fetch_array($hasil)) {
        $user = $data['user'];
        $email = $data['email'];
        $question_text = nl2br($data['question_text']);
        $date = $data['ask_date'];
        $n_upvote = $data['n_upvote'];
        $n_downvote = $data['n_downvote'];
        $n_answer = $data['n_answer'];
      }
	    $vote = $n_upvote-$n_downvote;
		?>
		<span class=p_table>
			<p align=left><font size=5><?php echo $subject; ?></font></p>
			<hr id=first_line>
			<div class=quest_list>
        <table>
          <col width=130>
          <col width=999>
          <tr>
            <td align=center valign=top><br>
              <img onclick="voteUpdate(<?php echo $id;?>,true,1)" src=up_arrow.png><br><br>
              <span id="Q<?php echo $id; ?>" class=vote_font><?php echo $vote; ?></span><br><br>
              <img onclick="voteUpdate(<?php echo $id;?>,true,-1)" src=down_arrow.png><br>
            </td>
            <td valign=top>
              <p><?php echo $question_text; ?></p>
            </td>
          </tr>
        </table>
        <p class=p_table align=right>
          asked by <span class=blue_font><?php echo $user; ?></span>
          (<span class=blue_font><?php echo $email; ?></span>) at <font class=blue_font><?php echo $date; ?></font> | 
          <a href="edit.php?q_id=<?php echo $id; ?>" class=yellow_font>edit</a> | 
          <a href="." onclick="deleteQuest(<?php echo $id; ?>);" class=red_font>delete</a>
        </p>
      </div>
    </span>
		
		<script type='text/javascript'>
		  function deleteQuest(n) {
        if (confirm("Do you want to delete this question?")) {
          var xhttp = new XMLHttpRequest();
          var site = "del.php?q_id=" + n.toString();
          xhttp.open("GET",site,true);
          xhttp.send();
          xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4) {
              switch(xhttp.status) {
                case 200: location.assign('index.php'); break;
                default : alert("Status Code: "+xhttp.status+"\n"+xhttp.responseText);
              }
            }
          }
          return false;
        }
		  }
      
      function voteUpdate(id,isQuestion,n) {
        var xhttp = new XMLHttpRequest();
        var site = "vote.php";
        var sendVote = "id="+id.toString()+"&isQuestion="+isQuestion.toString()+"&n="+n.toString();
        xhttp.open("POST",site,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(sendVote);
        xhttp.onreadystatechange = function() {
          if(xhttp.readyState == 4) {
            switch(xhttp.status){
              case 200:
                var elem = document.getElementById([isQuestion ? 'Q' : 'A',id].join(""));
                elem.textContent = xhttp.responseText;
              break;
              default:
                alert(xhttp.responseText);
            }
          }
        }
      }
		</script>
	</div>
	<br>
	<div class=div_front>
	  <?php
	    echo "<p align=left><font size=5>$n_answer Answer(s)</font></p>";
	  ?>
	  <hr id=first_line>
	  <div class=quest_list>
	    <?php
        $query = "select * from answers where question_id=$id order by answer_date asc";
        $hasil = mysql_query($query);
        if (mysql_num_rows($hasil)==0) { // check empty result
          echo "There are currently no answers to this question.";
        } else {
          while ($data=mysql_fetch_array($hasil)) {
            $a_id = $data['answer_id'];
            $vote = $data['n_upvote']-$data['n_downvote'];
            $a_text = nl2br($data['answer_text']);
            echo "<span class=p_table>";
            echo "<table><col width=130><col width=999><tr>";
            echo "<td valign=top align=center><br><img onclick=\"voteUpdate($a_id,false,1)\" src=up_arrow.png><br><br><span id=\"A$a_id\" class=vote_font>$vote</span><br><br><img onclick=\"voteUpdate($a_id,false,-1)\" src=down_arrow.png><br></td>";
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
      echo "<form align=center name='answer' action='question.php?q_id=$id' onsubmit='return validateForm()' method=post>";
	  ?>
	    <input type=text class=style_text autocomplete=off name='user' placeholder='Name'><br>
	    <input type=text class=style_text autocomplete=off name='email' placeholder='E-mail'><br>
	    <textarea name='answer_text' autocomplete=off placeholder='Content' wrap='soft'></textarea><br>
	    <p align=right><input type='submit' value='Post'></p>
		<script>
		  function validateForm() {
        var is_valid = true;
        var msg_alert = [];
        var x = document.forms["answer"]["user"].value;
        if (!x) {
          msg_alert.push("Name must be filled out!");
        }
        var x = document.forms["answer"]["email"].value;
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (!x) {
          msg_alert.push("Email must be filled out!");
        } else if (!re.test(x)) {
          msg_alert.push("Email must be in correct format!");
        }
        var x = document.forms["answer"]["answer_text"].value;
        if (!x) {
          msg_alert.push("Content must be filled out!");
        }
        if (msg_alert.length) {
          is_valid = false;
          alert(msg_alert.join('\n'));
        }
        return is_valid;
      }
		</script>
	  </form>
	  </div>
	</div>
    <p align=center><a href='index.php' class=yellow_font>Go back to index</a><br></p>	
  </body>
</html>