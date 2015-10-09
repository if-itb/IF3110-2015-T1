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
<div class='newbutton' align='center'>
<form method='get' action='edit.php'>
  <input type='submit' value='New Question'></input>
</form>
</div>
<h3>Recent question :</h3>
<hr>

<?php
include 'database.php';
$conn = db_init();

$query = "SELECT * FROM question ORDER BY datetime DESC";
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
  echo "<h3 align='center'>There is no question so far</h3>";
}
else
{
  while ($row = mysqli_fetch_assoc($list))
  {
    $id = $row['Id'];
    $topik = $row['topik'];
    $name = $row['username'];
    $datetime = $row['datetime'];
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
