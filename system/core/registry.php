<?php
/**
 * Registry class to instantiate class
 * 
 *@author 		Red <octo.git.js@gmail.com>
 *@copyright	Copyright 2012(c) Red
 */

if(!defined('APPS')) exit ('No direct access allowed');

class Registry{

		private static $_instance;
		private $_storage;

		private function __construct(){}

		public static function getInstance(){
			
			if(!self::$_instance instanceof self){
				self::$_instance = new Registry;
			}
			return self::$_instance;
		}

		public function __set($key,$val){
			$this->_storage[$key] = $val;
		}

		public function __get($key){
			if(isset($this->_storage[$key])){
				return $this->_storage[$key];
			}
			return false;
		}
}