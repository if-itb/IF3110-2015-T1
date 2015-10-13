<?php namespace Lyz\Controllers;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\Model\Question;
use Lyz\Model\Answer;
use Lyz\View\View;

class QuestionController {
	public function index() {
		$search_content = new View('questions/search');
		$content = null;
		
		$questions = Question::all();
		$answers = Answer::all();
		$ans_count = [];
		if (!empty($answers)) {
			foreach ($answers as $answer) {
				$question_id = $answer->question_id;
				if (isset($ans_count[$question_id])) {
					$ans_count[$question_id]++;
				}
				else {
					$ans_count[$question_id] = 1;
				}
			}
		}

		if (!empty($questions)) {
			$content = '';
			foreach ($questions as $question) {
				if (isset($ans_count[$question->id])) {
					$question->answers = $ans_count[$question->id];
				}
				else {
					$question->answers = 0;
				}

				$view = new View('questions/card');
				$view = $view->params($question);
				$content .= (string)$view;
			}
		}

		$view = new View('layout');
		$view = $view->params([
			'title' => 'Asklyz',
			'search' => (string)$search_content,
			'content' => (string)$content,
			'headline' => 'Recently Asked Questions'
		])->styles(['layout', 'search', 'card']);
		return $view;
	}

	public function getCreate() {
		$content = new View('questions/form');
		$view = new View('layout');

		$view = $view->params([ 
			'title' => 'Asklyz',
			'content' => (string)$content,
			'headline' => 'What\'s your question?'
			])->scripts(['layout'])->styles(['layout', 'form', 'card']);

		return $view;
	}

	public function postCreate() {
		$question = new Question(Request::params());
		$question->save();
		die();

		//return Route::redirect();
	}
}
