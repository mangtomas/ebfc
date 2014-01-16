<?php
/*
* mvc model file for the MVC framework
*
*/
if(!defined('APPS')) exit ('No direct access allowed');

abstract class crackerjack_model{
		protected $_registry;
		public function __construct(){
			$this->_registry = Registry::getInstance();
		}

		final public function __get($key){
			if($return = $this->_registry->$key){
				return $return;
			}
			return false;
		}	
}

