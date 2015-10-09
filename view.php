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
$isi = $res['isi'];
$mail = $res['email'];
$vote = $res['vote'];

echo 
"<div class='question-details'>
  <div><div class='question-title'>
    <h3>$topik</h3>
  </div>
  <div><hr></div>
  <div class='question-content'>
    $isi
  </div>
  <div class='author-info'>
    <div class='question-menu'>
      <a href='edit.php?id=$qid'>Edit</a>  
      <a href='delete.php?id=$qid'>Delete</a>              
    </div>
    <div>asked by <a href='mailto:$mail'>$name</a> at $datetime</div>
  </div></div>
  <div class='answer-list'>";

$query = "SELECT * FROM answer WHERE qid = $qid ORDER BY datetime DESC";
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
  echo "<div class='not-available'><h3>There is no answer so far</h3></div>";
}
else
{
  echo "<div><h3>$num Answer</h3></div>";
  while ($row = mysqli_fetch_assoc($list))
  {
    $id = $row['Id'];
    $isi = $row['isi'];
    $name = $row['username'];
    $datetime = $row['datetime'];
    $mail = $row['email'];
    $vote = $row['vote'];
    echo 
        "<div><hr></div>
        <div>$isi</div>
        <div class='author-info'>
          answered by <a href='mailto:$mail'>$name</a> at $datetime</div>
      </div>";
  }
}

echo
  "<div class='thread-editor'>
    <h3>Your answer :</h3>
    <div><hr></div>
    <form name='myform' method='post' action='save.php' onsubmit='return validateForm()'>
      <input type='hidden' name='id' value=$qid>
      <input type='hidden' name='ans' value=1>
      <div>
        <input type='text' name='name' placeholder='Name'>
      </div>
      <div>
        <input type='text' name='email' placeholder='Email'>
      </div>
      <div>
        <textarea name='content' rows='10' maxlength='150' placeholder='Content'></textarea>
      </div>
      <br>
      <input type='submit' value='Submit'>
    </form>
  </div>
</div>";

mysqli_close($conn);
?>
</body>
</html>