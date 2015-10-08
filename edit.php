<?php
include 'header.php';
include 'database.php';

$conn = db_init();

$topic = "";
$name = "";
$mail = "";
$cont = "";
$qid = -1;

if ($_GET)
{
  $qid = $_GET['id'];
  $query = "SELECT * FROM question WHERE Id = " .$qid;
  $res = mysqli_fetch_assoc(mysqli_query($conn, $query));
  $topic = $res['topik'];
  $name = $res['username'];
  $mail = $res['email'];
  $datetime = $res['datetime'];
  $cont = $res['isi'];
}

echo
'<table>
  <form method="post" action="save.php">
    <input type="hidden" name="id" value='.$qid.'>
    <tr><td>
      <input type="text" size="89" name="name" placeholder="Name" value="'.$name.'">
    </td></tr>
    <tr><td>
      <input type="text" size="89" name="email" placeholder="Email" value="'.$mail.'">
    </td></tr>
    <tr><td>
      <input type="text" size="89" name="topic" placeholder="Topic" value="'.$topic.'">
    </td></tr>
    <tr><td>
      <textarea name="content" rows="10" cols="68" maxlength="150" placeholder="Content">'.$cont.'</textarea>
    </td></tr>
    <tr><td>
    <input type="submit" name="qid" value="Submit">
    </td></tr>
  </form>
</table>
</body>
</html>';