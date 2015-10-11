<?php namespace Lyz\View;

class View {
	/* View parameters */
	protected $params = [];

	/* View file */
	protected $file = '';

	public function __construct($template) {
		$view_file =  VIEWS_PATH . strtolower($template) . '.php';
		if (file_exists($view_file)) {
			$this->file = $view_file;
		}
		else {
			throw new \Exception('Template ' . $view_file . ' not found.');
		}
	}

	public function params($params) {
		foreach ($params as $key => $value) {
			$this->params[$key] = $value;
		}
		return $this;
	}

	public function __toString() {
		extract($this->params);

		ob_start();
		include $this->file;
		$this->content = ob_get_clean();
		ob_end_clean();

		return $this->content;
	}
}
