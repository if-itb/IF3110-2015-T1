<?php namespace Lyz\Controllers;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\Model\Question;
use Lyz\Model\Answer;
use Lyz\View\View;

class AnswerController {
	public function postCreate() {
		$answer = new Answer(Request::params());
		$question_id = Request::params('question_id')['question_id'];
		$answer->save();

		return Route::redirect('/questions?id=' . $question_id);
	}
}

