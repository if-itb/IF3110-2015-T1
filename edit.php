<?php
include 'header.php';
include 'database.php';

$conn = db_init();

$summ = "dolor";
$name = "ipsum";
$mail = "lorem";
$cont = "sit";
$qid = -1;

if ($_GET['qid']!='New Question')
{
  $qid = $_GET['qid'];
  $query = "SELECT  FROM question WHERE 'topik == " .$_GET['q']. "OR isi = " .$_GET['q'];
  $list = mysqli_query($conn, $query);
}

echo '
<table align="center">
  <form action="save.php">
    <tr><td>
      <input type="text" size="89" name="name" placeholder="Name" value="'.$summ.'">
    </td></tr>
    <tr><td>
      <input type="text" size="89" name="email" placeholder="Email" value="'.$mail.'">
    </td></tr>
    <tr><td>
      <input type="text" size="89" name="topic" placeholder="Name" value="'.$name.'">
    </td></tr>
    <tr><td>
      <textarea name="content" rows="10" cols="68" maxlength="150" placeholder="Content">dor</textarea>
    </td></tr>
    <tr><td><input type="submit" value="Submit"></td></tr>
  </form>
</table>
</body>
</html>';