<?php
if(!defined('APPS')) exit ('No direct access allowed');
class api extends crackerjack{
	private $status;
	public function __construct(){
		parent::__construct();
	
	}

	public function index($id = false){
		
	}
	/*
	* Third party 
	* secure all images
	*/
	public function image($id = false){
		$this->load->libraries(array('timthumb'));
	}

	
}