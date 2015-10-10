<?php
    
    $question_id = $_GET["id"];

    define("ROOT", $_SERVER['DOCUMENT_ROOT']);

    require_once(ROOT . '/utils/response/render.php');
    require_once(ROOT . '/utils/mysql/connection.php');

    if(!empty($question_id))
    {
      $conn = \utils\mysql\connect();

      $sql = "
            DELETE FROM questions
            WHERE
               id = ?
            ";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $question_id);

      if ($stmt->execute()) { 
        header("Location: /index.php");
        die();
      } else {
        http_response_code(500);
        echo "Internal Server Error";
      }

      $stmt->close();

      \utils\mysql\close($conn);
    } else {
        http_response_code(500);
        echo "Internal Server Error";
    }
?>