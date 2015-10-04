<?php

namespace stackexchange\controller;

use stackexchange\core\Controller;
use stackexchange\model\Answer;

class AnswerController extends  Controller
{
    public function add()
    {
        if (($_POST["author"]) && ($_POST["author_email"]) && ($_POST["content"]) && ($_GET["thread_id"])) {
            $answerModel = new Answer();
            $answerModel->insert($_GET["thread_id"], $_POST["author"], $_POST["author_email"], $_POST["content"]);

            header("Location: /thread/view.php?id=" . $_GET["thread_id"]);
        }
    }
}