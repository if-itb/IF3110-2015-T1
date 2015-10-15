<?php namespace Lyz\View;

class View {
	/* View parameters */
	protected $params = [];

	/* View file */
	protected $files = [];

	public function __construct($templates) {
		if (!is_array($templates)) {
			$templates = [ $templates ];
		}
		foreach ($templates as $template) {
			$view_file =  VIEWS_PATH . strtolower($template) . '.php';
			if (file_exists($view_file)) {
				array_push($this->files, $view_file);
			}
			else {
				throw new \Exception('Template ' . $view_file . ' not found.');
			}	
		}
	}

	public function styles($styles) {
		if (!isset($this->params['metadatas'])) {
			$this->params['metadatas'] = [];
		}
		foreach ($styles as $style) {
			$link_tag = '<link rel=\'stylesheet\' href=\'/public/css/' . $style . '.css\'>';
			array_push($this->params['metadatas'], $link_tag);
		}
		return $this;
	}

	public function scripts($scripts) {
		if (!isset($this->params['metadatas'])) {
			$this->params['metadatas'] = [];
		}
		foreach ($scripts as $script) {
			$script_tag = '<script src=\'/public/js/' . $script . '.js\'></script>';
			array_push($this->params['metadatas'], $script_tag);
		}
		return $this;
	}


	public function params($params) {
		$this->params = $params;
		return $this;
	}

	public function __toString() {
		extract($this->params);

		ob_start();
		foreach ($this->files as $file) {
			include $file;
		}
		$this->content = ob_get_clean();

		return $this->content;
	}
}
