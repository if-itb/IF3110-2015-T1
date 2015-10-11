<?php namespace Lyz\Render;

class View {
	public function __construct($template) {
		$view_file = BASE_PATH . 'resources/views/' . strtolower($template) . '.php';
		if (file_exists($view_file)) {
			$this->view_file = $view_file;
		}
		else {
			throw new exception('Template ' . $view_file . ' not found.');
		}

		$this->data = [];
	}
	public function assign($variable, $value) {
		$this->data[$variable] = $value;
	}
	public function __destruct() {
		extract($this->data);
		include $this->view_file;
	}
}
