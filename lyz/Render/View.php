<?php namespace Lyz\Render;

class View {
	public function __construct($template) {
		$view_file = BASE_PATH . '/view/resources/' . strtolower($template) . '.php';
		if (file_exists($view_file))
			$this->view_file = $view_file;
	}
	public function assign($variable, $value) {
		$this->data[$variable] = $value;
	}
	public function __destruct() {
		extract($this->data);
		include($this->render);
	}
}
