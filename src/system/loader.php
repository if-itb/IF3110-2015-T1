<?php

Class Loader {

	public function model($src){

		include_once "models/$src.php";

		$srcArray = explode('/', $src);

		$srcArrayLastIndex = count($srcArray) - 1;

		$modelName = $srcArray[$srcArrayLastIndex];

		$btrace = debug_backtrace();
		$caller = $btrace[1]["object"];

		$caller->$modelName = new $modelName();
	}

	public function view($src, $data =  array()){

		foreach ($data as $key => $value)
			$$key = $value;

		include_once "views/$src.php";

	}

}