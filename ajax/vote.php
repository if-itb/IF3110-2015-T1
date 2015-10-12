<?php
    $conn = mysql_connect('localhost', 'root', '08161955342');
    mysql_select_db('simplestackexchange', $conn);
    if (isset($_POST['action']) && isset($_POST['id']) && isset($_POST['type'])) {
        if ($_POST['action'] == 'up')
            $count = 1;
        else
            $count = -1;
        
        $id = intval($_POST['id']);
        $type = $_POST['type'];

        $sql = "UPDATE $type SET vote=vote+$count WHERE id=$id";
    	$result = mysql_query($sql);

        $sql = "SELECT vote as c FROM $type WHERE id=$id";
    	$result = mysql_query($sql);

        $count = mysql_fetch_assoc($result);
        echo $count['c'];
    }
    mysql_close($conn);
?>