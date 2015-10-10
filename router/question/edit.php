<?php

    namespace router\question;

    if(!isset($_GET["id"])) {
      exit();
    }

    $question_id = $_GET["id"];

    define("ROOT", $_SERVER['DOCUMENT_ROOT']);

    require_once(ROOT . '/models/question/question.php');
    require_once(ROOT . '/utils/mysql/connection.php');
    require_once(ROOT . '/utils/response/render.php');

    use utils\mysql;
    use utils\response;
    use models\question;

    $conn = mysql\connect();

    // Get Question's Details
    $sql = "
        SELECT 
            id, name, email, topic, content
        FROM 
            questions
        WHERE
            id = $question_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $question = new question\QuestionModel($row);
        }
    }

    if ($question == null){
        exit();
    }

    $params = array("question" => $question);

    mysql\close($conn);

    
    response\render("ask/index.php", $params);
?>