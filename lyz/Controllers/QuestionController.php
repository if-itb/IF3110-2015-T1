<?php namespace Lyz\Controllers;

use Lyz\View\View;

class QuestionController {
	public function index() {
		return new View('questions/form');
	}
	public function getCreate() {
		return new View('questions/card');
	}
}
