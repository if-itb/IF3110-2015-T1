<?php

    namespace routes\answer;

    if(!isset($_GET["id"])) {
      exit();
    }

    $question_id = $_GET["id"];

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/../");

    require_once(ROOT . '/models/answer/answer.php');
    require_once(ROOT . '/models/question/question.php');
    require_once(ROOT . '/utils/mysql/connection.php');
    require_once(ROOT . '/utils/response/render.php');

    use utils\mysql;
    use utils\response;
    use models\question;
    use models\answer;

    $conn = mysql\connect();

    // Get Question's Details
    $sql = "
        SELECT 
            id, name, topic, content, votes, create_time
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

    // Get Answers' Details
    $sql = "
        SELECT 
            id, name, content, votes, create_time
        FROM 
            answers
        WHERE
            question_id = $question_id
        ORDER BY votes DESC, create_time ASC";

    $result = $conn->query($sql);

    $answers = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $answer = new answer\AnswerModel($row);
            array_push($answers, $answer);
        }
    }

    $params = array("question" => $question, "answers" => $answers);

    mysql\close($conn);

    response\render("answer/index.php", $params);
?>