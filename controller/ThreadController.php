<?php

namespace stackexchange\controller;

use stackexchange\core\Controller;
use stackexchange\model\Thread;

class ThreadController extends Controller
{
    public function index()
    {
        $threadModel = new Thread();
        $threads = $threadModel->getAll();

        $this->render("home", ["threads" => $threads]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->render("thread/form", [
                "thread" => [
                    "author" => "",
                    "author_email" => "",
                    "topic" => "",
                    "content" => ""
                ]
            ]);
        } else {
            if ((isset($_POST["author"])) && (isset($_POST["author_email"])) && (isset($_POST["topic"])) && (isset($_POST["content"]))) {
                $thread = new Thread();
                $thread->insert($_POST["author"], $_POST["author_email"], $_POST["topic"], $_POST["content"]);
                header("Location: /index.php");
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET["id"];

            $threadModel = new Thread();
            $thread = $threadModel->getById($id);
            $this->render("thread/form", ["thread" => $thread]);
        } else {
            if ((isset($_POST["author"])) && (isset($_POST["author_email"])) && (isset($_POST["topic"])) && (isset($_POST["content"]))) {
                $id = $_GET["id"];

                $threadModel = new Thread();
                $threadModel->update($id, $_POST["author"], $_POST["author_email"], $_POST["topic"], $_POST["content"]);
                header("Location: /thread/update.php?id=$id");
            }
        }
    }

    public function delete()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $threadModel = new Thread();
            $threadModel->deleteById($id);
        }

        header("Location: /");
    }
}