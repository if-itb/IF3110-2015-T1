<?php
   
   $name = $_POST["name"];
   $email = $_POST["email"];
   $topic = $_POST["topic"];
   $content = $_POST["content"];

   define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/../");

   require_once(ROOT . '/utils/response/render.php');
   require_once(ROOT . '/utils/mysql/connection.php');

   if( !empty($name) && !empty($email) && !empty($topic) && !empty($content))
   {
      $conn = \utils\mysql\connect();

      $sql = "
            INSERT INTO
               questions(name, email, topic, content, create_time)
            VALUES(?,?,?,?,STR_TO_DATE(?, '%d/%m/%Y'))";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sssss', $name, $email, $topic, $content, date("d/m/Y"));

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