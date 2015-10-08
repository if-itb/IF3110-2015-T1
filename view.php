<?php
include 'header.php';
include 'database.php';

$conn = db_init();

$qid = $_GET['id'];
$query = "SELECT * FROM question WHERE Id = " .$qid;
$res = mysqli_fetch_assoc(mysqli_query($conn, $query));
$topik = $res['topik'];
$name = $res['username'];
$datetime = $res['datetime'];
$isi = $res['isi'];
$mail = $res['email'];
$vote = $res['vote'];
echo "<div id=''>";
echo "<h3>$topik</h3><br>";
echo "<p>$isi</p><br>";
echo "<h8>Oleh <a href='mailto:$mail'>$name</a> pada $datetime</h8> ";
echo "<a href='edit.php?id=$qid'>Edit</a> ";
echo "<a href='delete.php?id=$qid'>Delete</a>";
echo "</div><br><br>";

mysqli_close($conn);
?>
</body>
</html>