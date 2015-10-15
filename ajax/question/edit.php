<?php
   
   $name = $_POST["name"];
   $email = $_POST["email"];
   $topic = $_POST["topic"];
   $content = $_POST["content"];
   $question_id = $_POST["id"];

   define("ROOT", $_SERVER['DOCUMENT_ROOT']);

   require_once(ROOT . '/utils/response/render.php');
   require_once(ROOT . '/utils/mysql/connection.php');

   if( !empty($name) && !empty($email) && !empty($topic) && !empty($content) && !empty($question_id))
   {
      $conn = \utils\mysql\connect();

      $sql = "
            UPDATE questions
            SET
               name = ?,
               email = ?,
               topic = ?,
               content = ?,
               create_time = STR_TO_DATE(?, '%d/%m/%Y')
            WHERE
               id = ?
            ";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sssssi', $name, $email, $topic, $content, date("d/m/Y"), $question_id);

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