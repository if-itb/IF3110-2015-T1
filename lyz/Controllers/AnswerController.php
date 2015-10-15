<?php namespace Lyz\Controllers;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\Model\Question;
use Lyz\Model\Answer;
use Lyz\View\View;

class AnswerController {
	public function postVotes() {
		$input = Request::params(['id', 'up']);
		$answer = Answer::where('id','=',$input['id'])->first();
		$answer->votes += ($input['up'] == 'true') ? 1 : -1;
		$answer->update('id=' . $answer->id);

		$response = [
			'votes' => $answer->votes
		];

		return json_encode($response);
	}

	public function postCreate() {
		$answer = new Answer(Request::params());
		$question_id = Request::params('question_id')['question_id'];
		$answer->save();

		return Route::redirect('/questions?id=' . $question_id);
	}
}

