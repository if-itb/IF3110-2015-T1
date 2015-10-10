<?php
include 'header.php';
include 'database.php';

$conn = db_init();

$qid = $_GET['id'];
$query = "SELECT * FROM question WHERE Id = $qid";
$res = mysqli_fetch_assoc(mysqli_query($conn, $query));
$topik = $res['topik'];
$name = $res['username'];
$datetime = $res['datetime'];
$isi = nl2br($res['isi']);
// $isi = str_replace(" ", "&nbsp;", $isi);
$isi = str_replace("\t", "&nbsp;&nbsp;", $isi);
$mail = $res['email'];
$vote = $res['vote'];

echo 
"<div class='question-details'>
  <div class='question-title'>
    <h3>$topik</h3>
  </div>
  <div class='wrapper'>
    <div class='vote'>
      <div class='arrow-up' onclick='voter(1, false, $qid, \"votenum-$qid\")'></div>
      <div class='vote-number' id='votenum-$qid'>$vote</div>
      <div class='arrow-down' onclick='voter(-1, false, $qid, \"votenum-$qid\")'></div>
    </div>
    <div class='question-content'>
      $isi
      <div class='author-info'>
        <div class='question-menu'>
          | <a href='edit.php?id=$qid' id='edit-menu'>edit</a>  
          | <a href='delete.php?id=$qid' onclick='return deleteConfirm()' id='delete-menu'>delete</a>              
        </div>
        <div>asked by <a href='mailto:$mail'>$name</a> at $datetime</div>
      </div>
  
  </div>
</div>  
<div class='answer-list'>";

$query = "SELECT * FROM answer WHERE qid = $qid ORDER BY vote DESC";
$list = mysqli_query($conn, $query);
if (!$list) 
{
  $list = null;
  $num = 0;
}
else 
  $num = mysqli_num_rows($list);

if ($num == 0)
{
  echo "<br><div class='not-available'><b>There is no answer so far</b><br>
  Do you want to answer?</div><br>";
}
else
{
  echo "<div style='border-bottom: solid 2px;'><h3>$num Answer",($num > 1 ? "s":""),"</h3></div>";
  while ($row = mysqli_fetch_assoc($list))
  {
    $id = $row['Id'];
    $isi = nl2br($row['isi']);
    // $isi = str_replace(" ", "&nbsp;", $isi);
    $isi = str_replace("\t", "&nbsp;&nbsp;", $isi);
    $name = $row['username'];
    $datetime = $row['datetime'];
    $mail = $row['email'];
    $vote = $row['vote'];
    echo 
        "
        <div class='wrapper' id='answer-box'>
          <div class='vote'>
            <div class='arrow-up' onclick='voter(1, true, $id, \"votenum-$qid-$id\")'></div>
            <div class='vote-number' id='votenum-$qid-$id'>$vote</div>
            <div class='arrow-down' onclick='voter(-1, true, $id, \"votenum-$qid-$id\")'></div>
          </div>
          <div class='question-content'>
            $isi
            <div class='author-info'>answered by <a href='mailto:$mail'>$name</a> at $datetime</div>
          </div>
        </div>";
  }
}

echo
  "<div class='thread-editor'>
    <form name='myform' method='post' action='save.php' onsubmit='return validateForm()'>
      <br><h3>Your answer :</h3>
      <input type='hidden' name='id' value=$qid>
      <input type='hidden' name='ans' value=1>
      <div>
        <input type='text' name='name' placeholder='Name'>
      </div>
      <div>
        <input type='text' name='email' placeholder='Email'>
      </div>
      <div>
        <textarea name='content' id='content' rows='10' maxlength='1500' placeholder='Content'></textarea>
      </div>
      <br>
      <input id='submit' type='submit' value='Submit' width=40>
    </form>
  </div>
</div>
";

mysqli_close($conn);
?>
</body>
</html>