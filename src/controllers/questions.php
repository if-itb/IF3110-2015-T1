<?php

class Questions extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

		$this->load->view("template/header");
		$this->load->view("main");
		$this->load->view("template/footer");

	}

}