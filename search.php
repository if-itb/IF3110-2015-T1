<?php
include 'header.php';
include 'database.php';

$conn = db_init();

$query = "SELECT * FROM question WHERE 'topik == " .$_GET['q']. "OR isi = " .$_GET['q'];
$list = mysqli_query($conn, $query);
if (!$list) 
{
  $list = null;
  $num = 0;
}
else 
  $num = mysqli_num_rows($list);
mysqli_close($conn);

if ($num == 0)
{
  echo "Question not found";
}
else
{
  for ($i = 0; $i < $num; $i++)
  {
    $topik = mysql_result($list, $i, 'topik');
    $name = mysql_result($list, $i, 'uname');
    $datetime = mysql_result($list, $i, 'datetime');
    $isi = mysql_result($list, $i, 'isi');
    echo "<h3>$topik</h3><br>";
    echo "<p>$isi</p><br>";
    echo "<h8>Oleh $name pada $datetime</h8><br><br>";
  }
}