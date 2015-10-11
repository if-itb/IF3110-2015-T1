<?php namespace Lyz\Render;

class View {
	public function __construct($template) {
		try {
			$view_file = __ROOT__ . '/view/resources/' . strtolower($template) . '.php';
			if (file_exists($view_file))
				$this->view_file = $view_file;
			else
				throw new exception('Failed to create View: File ' . $template '.php not found.');
		}
		catch (exception $e) {
			return $e;
		}
	}
	public function assign($variable, $value) {
		$this->data[$variable] = $value;
	}
	public function __destruct() {
		extract($this->data);
		include($this->render);
	}
}
