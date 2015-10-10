<?php
      include "connect.php";
      if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $q = "SELECT
              *
          FROM
              `question`
          WHERE
              `Q_ID` = '$id'";
        $s = mysqli_query($conn, $q) or die(mysqli_error());
        if (mysqli_num_rows($s) > 0) {
          $result = mysqli_fetch_assoc($s);
          $name = $result['Q_Name'];
          $email = $result['Q_Email'];
          $topic = $result['Q_Topic'];
          $content = $result['Q_Content'];
          $ids = $result['Q_ID'];
        }
      }
      ?>