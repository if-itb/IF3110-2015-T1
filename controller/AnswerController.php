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

    public function upvote()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $answerModel = new Answer();
            $answerModel->upvote($id);

            $this->jsonResponse(["status" => "OK"]);
        } else {
            $this->jsonResponse(["error" => "Missing parameter ID"], 400);
        }
    }

    public function downvote()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $answerModel = new Answer();
            $answerModel->downvote($id);

            $this->jsonResponse(["status" => "OK"]);
        } else {
            $this->jsonResponse(["error" => "Missing parameter ID"], 400);
        }
    }
}