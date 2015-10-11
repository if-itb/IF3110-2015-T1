<?php namespace Lyz\Controllers;

use Lyz\View\View;

class QuestionController {
	public function index() {
		$view = new View('questions/form');
		return $view->params([ 'name' => 'Hehe' ]);
	}
	public function getCreate() {
		return new View('questions/card');
	}
}
