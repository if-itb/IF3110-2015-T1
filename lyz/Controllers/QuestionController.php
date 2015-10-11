<?php namespace Lyz\Controllers;

use Lyz\View\View;

class QuestionController {
	public function index() {
		$view_form = new View('questions/form');
		$view = new View('layout');
		return $view->params([ 
			'title' => 'Asklyz',
			'content' => (string)$view_form->params([
					'name' => 'Hehehe'
				])
		]);
	}
	public function getCreate() {
		return new View('questions/card');
	}
}
