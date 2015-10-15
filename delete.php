<?php
    require("php/database.php");
    
    if (isset($_POST['id_q'])) {
        global $conn;
        $id=$_POST['id_q'];
        $sql = "DELETE FROM question WHERE id_q=$id";
        $result = mysqli_query($conn, $sql);
        return $result;
        
    }
?>