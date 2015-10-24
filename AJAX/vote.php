<?php
    $con = mysqli_connect("localhost","root","","wbd_database");
        if ($con == false)
        {
            die("ERROR! Tidak dapat terhubung ".mysqli_connect_error());
        }
    if (isset($_POST['result']) && isset($_POST['id']) && isset($_POST['type'])) {
        if($_POST['result'] == 'up')
            $count = 1;
        else
            $count = -1;
        $q = "UPDATE $_POST[type] SET vote = vote + $count WHERE id = $_POST[id]";
        $rq = mysqli_query($con, $q);
        $q = "SELECT vote FROM $_POST[type] WHERE id = $_POST[id]";
        $rq = mysqli_query($con, $q);
        $count = mysqli_fetch_array($rq, MYSQLI_ASSOC)['vote'];
        echo $count;
}
?>