<?php
      include "connect.php";
      if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $q = "DELETE FROM question WHERE Q_ID='$id'";
        if (mysqli_query($conn, $q)) {
            header('Location: index.php');    
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
      ?>