<?php namespace Lyz\Controllers;

use Lyz\View\View;
use Lyz\Model\Question;

class QuestionController {
	public function index() {
		$search_content = new View('questions/search');
		$content = null;
		
		$questions = Question::all();


		$view = new View('layout');
		$view = $view->params([
			'title' => 'Asklyz',
			'search' => (string)$search_content,
			'content' => (string)$content
		])->styles(['layout', 'search']);
		return $view;
	}

	public function getCreate() {
		$content = new View('questions/form');
		$view = new View('layout');

		$view = $view->params([ 
			'title' => 'Asklyz',
			'content' => (string)$content
			])->scripts(['test'])->styles(['layout']);

		return $view;
	}
}
