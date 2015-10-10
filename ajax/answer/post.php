<?php

   $name = $_POST["name"];
   $email = $_POST["email"];
   $content = $_POST["content"];
   $question_id = $_POST["id"];

   define("ROOT", $_SERVER['DOCUMENT_ROOT']);

   require_once(ROOT . '/utils/response/render.php');
   require_once(ROOT . '/utils/mysql/connection.php');

   if( !empty($name) && !empty($email) && !empty($content) && !empty($question_id))
   {
      $conn = \utils\mysql\connect();

      $sql = "
            INSERT INTO
               answers(question_id, name, email, content, create_time)
            VALUES(?,?,?,?,STR_TO_DATE(?, '%d/%m/%Y'))";

      $stmt = $conn->prepare($sql);
      $now = date("d/m/Y");
      $stmt->bind_param('issss', $question_id, $name, $email, $content, $now);

      $arr = explode("/", $now);

      switch ($arr[1]) {
          case "01":
              $month = "January";
              break;
          case "02":
              $month = "February";
              break;
          case "03":
              $month = "March";
              break;
          case "04":
              $month = "April";
              break;
          case "05":
              $month = "May";
              break;
          case "06":
              $month = "June";
              break;
          case "07":
              $month = "July";
              break;
          case "08":
              $month = "August";
              break;
          case "09":
              $month = "September";
              break;
          case "10":
              $month = "October";
              break;
          case "11":
              $month = "November";
              break;
          case "12":
              $month = "Desember";
              break;
      }

      $nowFormat = $arr[0] . ' ' . $month . ' ' . $arr[2];

      if ($stmt->execute()) {
         $returnData = array("data" => array("id" => mysqli_insert_id($conn), "name" => $name, "email" => $email, "content" => $content, "question_id" => $question_id, "votes" => 0, "create_time" => $nowFormat), "message" => "OK");

         \utils\response\returnDataJSON(200, $returnData);
      } else {
         \utils\response\returnMessageJSON(500, "Internal Server Error");
      }

      $stmt->close();

      \utils\mysql\close($conn);
   } else {
      \utils\response\returnMessageJSON(500, "Internal Server Error");
   }
?>