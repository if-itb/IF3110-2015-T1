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
}