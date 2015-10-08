<?php
	class View {
		public function __construct($template) {
			try {
			}
			catch (exception $e) {
				echo $e->getMessage();
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
