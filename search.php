<?php
include 'header.php';
include 'database.php';

$conn = db_init();

$q = $_GET['q'];
$query = "SELECT * FROM question WHERE topik LIKE '%$q%' OR isi LIKE '%$q%'";
$list = mysqli_query($conn, $query);
if (!$list) 
{
  $list = null;
  $num = 0;
}
else 
  $num = mysqli_num_rows($list);

echo '<hr>';
if ($num == 0)
{
  echo "<h3 align='center'>Question not found</h3>";
}
else
{
  while ($row = mysqli_fetch_assoc($list))
  {
    $id = $row['Id'];
    $topik = $row['topik'];
    $name = $row['username'];
    $datetime = $row['datetime'];
    $isi = $row['isi'];
    $mail = $row['email'];
    $vote = $row['vote'];
    echo
      "<a href='view.php?id=$id'>
      <div class='question-summary'>
        <div class='votes-counter'>
          <div class='votes-counter-num'>$vote</div>
          <div>Votes</div>
        </div>
        <div class='answers-counter'>
          <div class='answers-counter-num'>0</div>
          <div>Answers</div>
        </div>
        <div class='question-text'>
          <div class='question-topic'>$topik</div>
          <div class='question-time-menu'>
            <div class='question-menu'>
              <a href='edit.php?id=$id'>Edit</a>  
              <a href='delete.php?id=$id'>Delete</a>              
            </div>
            <div class='author-info'>
              <p>oleh <a href='mailto:$mail'>$name</a> pada $datetime</p>
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