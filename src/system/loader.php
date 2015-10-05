<?php

Class Loader {

	public function model($src){

		include_once "models/$src.php";

	}

	public function view($src, $data =  array()){

		include_once "views/$src.php";

	}

}