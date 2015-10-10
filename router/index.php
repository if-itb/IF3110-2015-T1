<?php

    namespace routes;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/../");

    require_once(ROOT . '/models/question/question.php');
    require_once(ROOT . '/utils/mysql/connection.php');
    require_once(ROOT . '/utils/response/render.php');

    use utils\mysql;
    use utils\response;
    use models\question;

    $conn = mysql\connect();

    $sql = "
        SELECT 
            Q.id, Q.name, Q.topic, Q.content, Q.votes, Q.create_time, A.answers 
        FROM 
            questions Q 
                LEFT JOIN 
            (SELECT 
                question_id, count(distinct id) as answers
             FROM 
                answers 
             GROUP BY question_id) A
                on Q.id = A.question_id 
        ORDER BY Q.create_time ASC";

    $result = $conn->query($sql);

    $questions = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $question = new question\QuestionModel($row);
            array_push($questions, $question);
        }
    }

    mysql\close($conn);

    response\render("index.php", array("questions" => $questions));
?>