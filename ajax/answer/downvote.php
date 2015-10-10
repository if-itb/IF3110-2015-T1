<?php
   
   $question_id = $_POST["id"];

   define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/../");

   require_once(ROOT . '/utils/response/render.php');
   require_once(ROOT . '/utils/mysql/connection.php');

   if( !empty($question_id))
   {
      $conn = \utils\mysql\connect();

      $sql = "
            UPDATE answers
            SET
               votes = votes - 1
            WHERE
               id = ?
            ";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $question_id);

      if ($stmt->execute()) { 
         \utils\response\returnMessageJSON(200, "OK");
      } else {
         \utils\response\returnMessageJSON(500, "Internal Server Error");
      }

      $stmt->close();

      \utils\mysql\close($conn);
   } else {
      \utils\response\returnMessageJSON(500, "Internal Server Error");
   }
?>