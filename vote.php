<?php
    require_once("./database.php");
?>

<?php
if (isset($_POST['action']) && isset($_POST['id']) && isset($_POST['type'])) {
    if($_POST['action'] == 'up')
        $count = 1;
    else
        $count = -1;

    if ($_POST['type'] == "question") {
        $q = "UPDATE $_POST[type] SET Vote = Vote + $count WHERE Q_ID = $_POST[id]";
        $rq = mysqli_query($connect, $q);
        $q = "SELECT Vote FROM $_POST[type] WHERE Q_ID = $_POST[id]";
        $rq = mysqli_query($connect, $q);
        $count = mysqli_fetch_array($rq, MYSQLI_ASSOC)['Vote'];
    }
    else {
        $q = "UPDATE $_POST[type] SET Vote = Vote + $count WHERE A_ID = $_POST[id]";
        $rq = mysqli_query($connect, $q);
        $q = "SELECT Vote FROM $_POST[type] WHERE A_ID = $_POST[id]";
        $rq = mysqli_query($connect, $q);
        $count = mysqli_fetch_array($rq, MYSQLI_ASSOC)['Vote'];
    }
    echo $count;
}
?>
