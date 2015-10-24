<?php
   $con = mysqli_connect("localhost","root","","wbd_database");
        if ($con == false)
        {
            die("ERROR! Tidak dapat terhubung ".mysqli_connect_error());
        }
?>