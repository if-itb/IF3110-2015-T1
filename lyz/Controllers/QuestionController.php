<?php namespace Lyz\Controllers;

use Lyz\View\View;
use Lyz\Model\Question;

class QuestionController {
	public function index() {
		$search_content = new View('questions/search');
		$content = null;
		
		$questions = Question::all();
		if (!empty($questions)) {
			$content = '';
			foreach ($questions as $question) {
				$view = new View('questions/card');
				$view = $view->params();
				$content .= (string)$view;
			}
		}


		$view = new View('layout');
		$view = $view->params([
			'title' => 'Asklyz',
			'search' => (string)$search_content,
			'content' => (string)$content,
			'headline' => 'Recently Asked Questions'
		])->styles(['layout', 'search']);
		return $view;
	}

	public function getCreate() {
		$content = new View('questions/form');
		$view = new View('layout');

		$view = $view->params([ 
			'title' => 'Asklyz',
			'content' => (string)$content,
			'header' => 'What\'s your question?'
			])->scripts(['test'])->styles(['layout']);

		return $view;
	}
}
