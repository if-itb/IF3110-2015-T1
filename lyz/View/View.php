<?php namespace Lyz\View;

class View {
	/* View parameters */
	protected $params = [];

	/* View content */
	protected $content = '';

	public function __construct($template) {
		$view_file =  VIEWS_PATH . strtolower($template) . '.php';
		if (file_exists($view_file)) {
			ob_start();
			include $view_file;
			$this->content = ob_get_clean();
			ob_end_clean();
		}
		else {
			throw new \Exception('Template ' . $view_file . ' not found.');
		}
		return $this;
	}
	private function render() {
	}

	public function params($params) {
		foreach ($params as $key => $value) {
			$this->params[$key] = $value;
		}
		return $this;
	}

	public function __toString() {
		extract($this->params);
		return $this->content;
	}
}
