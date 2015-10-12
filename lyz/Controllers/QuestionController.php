<?php namespace Lyz\Controllers;

use Lyz\View\View;

class QuestionController {
	public function index() {
		$content = new View('questions/search');

		$view = new View('layout');
		$view = $view->params([
			'title' => 'Asklyz',
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
