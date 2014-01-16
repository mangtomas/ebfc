<?php
/*
* Basecontroller file for the MVC framework
*
*/


if(!defined('APPS')) exit ('No direct access allowed');

abstract class crackerjack{
		
		protected $_registry;

		protected $load;

		public function __construct(){
			$this->_registry = Registry::getInstance();
			$this->load = new Loader;
		}
		abstract public function index();

final public function __get($key){
			if($return = $this->_registry->$key){
				return $return;
			}
			return false;
		}	

		
}