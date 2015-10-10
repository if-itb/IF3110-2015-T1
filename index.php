<?php include 'header.php'; ?>

<div class='searchbar' align='center'>
  <tr>
    <form method='get' action='search.php'><td>
      <input type='text' name='q' size='89'>
    </td> 
    <td>
      <input type='submit' value='Search'>
    </td></form>
  </tr>
</div>
<div align='center'>Cannot find what you are looking for? <a href='edit.php'>Ask here</a></div><br>
<div id='recent-question'><h3>Recent question :</h3></div>

<?php
include 'database.php';
$conn = db_init();

$query = "SELECT * FROM question ORDER BY vote DESC";
$db_result = mysqli_query($conn, $query);
if (!$db_result) 
{
  $num = 0;
}
else 
{
  $num = mysqli_num_rows($db_result);
}

if ($num == 0)
{
  echo "<h3 align='center'>There is no question so far</h3>";
}
else
{
  $list = array();
  while ($row = mysqli_fetch_assoc($db_result)) $list[] = $row;

  foreach ($list as $row) 
  {
    $id = $row['Id'];
    $topik = $row['topik'];
    $name = $row['username'];
    $datetime = $row['datetime'];
    $mail = $row['email'];
    $vote = $row['vote'];
    $isi = nl2br($row['isi']);
    // $isi = str_replace(" ", "&nbsp;", $isi);
    $isi = str_replace("\t", "&nbsp;&nbsp;", $isi);
    $query = "SELECT COUNT(*) FROM answer WHERE qid = $id";
    $ans = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    echo 
      "<a href='view.php?id=$id'>
      <div class='question-summary'>
        <div class='votes-counter'>
          <div class='votes-counter-num'>$vote</div>
          <div>Votes</div>
        </div>
        <div class='answers-counter'>
          <div class='answers-counter-num'>$ans</div>
          <div>Answers</div>
        </div>
        <div class='question-text'>
          <div class='mini-title'><b>$topik</b></div>
          <div>$isi</div>
          <div class='question-time-menu'>
            <div class='question-menu'>
              | <a href='edit.php?id=$id' id='edit-menu'>edit</a>  
              | <a href='delete.php?id=$id' onclick='return deleteConfirm()' id='delete-menu'>delete</a>
            </div>
            <div class='author-info'>
              oleh <a href='mailto:$mail'>$name</a> pada $datetime
            </div>
          </div>
        </div>
      </div></a>";
  }
}
mysqli_close($conn);
?>

</body>
</html>
