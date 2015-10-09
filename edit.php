<?php
include 'header.php';
include 'database.php';

$topic = "";
$name = "";
$mail = "";
$cont = "";
$qid = -1;

if ($_GET)
{
  $conn = db_init();
  $qid = $_GET['id'];
  $query = "SELECT * FROM question WHERE Id = $qid";
  $res = mysqli_fetch_assoc(mysqli_query($conn, $query));
  $topic = $res['topik'];
  $name = $res['username'];
  $mail = $res['email'];
  $datetime = $res['datetime'];
  $cont = $res['isi'];
  mysqli_close($conn);
}

echo
"<h2>What is your question :</h2>
<hr>
<div class='thread-editor'>
  <form name='myform' method='post' action='save.php' onsubmit='return validateForm()'>
    <input type='hidden' name='id' value=$qid>
    <div>
      <input type='text' name='name' placeholder='Name' value='$name'>
    </div>
    <div>
      <input type='text' name='email' placeholder='Email' value='$mail'>
    </div>
    <div>
      <input id='topic' type='text' name='topic' placeholder='Topic' value='$topic'>
    </div>
    <div>
      <textarea name='content' rows='10' maxlength='150' placeholder='Content'>$cont</textarea>
    </div>
    <br>
    <input type='submit' value='Submit'>
  </form>
</div>
</body>
</html>";
