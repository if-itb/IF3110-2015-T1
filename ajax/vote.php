<?php
$db = new mysqli('localhost','root','','StackExchange');

if (isset($_POST['action']) && isset($_POST['id']) && isset($_POST['type'])) {
    if($_POST['action'] == 'up')
        $count = 1;
    else
        $count = -1;
    $q = "UPDATE $_POST[type] SET vote = vote + $count WHERE id = $_POST[id]";
	$rq = mysqli_query($db, $q);
    $q = "SELECT vote FROM $_POST[type] WHERE id = $_POST[id]";
	$rq = mysqli_query($db, $q);
    $count = mysqli_fetch_array($rq, MYSQLI_ASSOC)['vote'];

    echo $count;
}
?>

