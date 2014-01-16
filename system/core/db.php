<?php
	if(!defined('APPS')) exit ('No direct access allowed');
/**
* database acccess 
*/
class db extends dbAccess{

		private $instance;
		
		private $conf = array();
		
		/*
		* db_array - all database support drivers
		*/
		private $db_array = array( 'mysqli','pdo_mysql');

		public function __construct(){
			global $config;
			if (in_array($config['database_type'], $this->db_array)) {
				require_once(CORE."drivers".DS.$config['database_type'].EXT);
				$database = array('database_name' => $config['database_name'],'host' =>$config['host'],'username'=>$config['username'],'password'=>$config['password']);
				$this->instance = new $config['database_type']($database);
				$this->instance->dbConnection();
			}else{
				 throw new Exception("Unsupported database type: {$config['database_type']}", E_USER_WARNING ); 
				return false;
			}
						
		}


		public function query($query){
			return $this->instance->_query($query);
		}
		
		public function prepare($query){
		
			return $this->instance->_prepare($query);
		}
		
		public function lastInsertId(){
			return $this->instance->_lastInsertId();
		}
		
		public function error(){
			return $this->instance->errorMessage();
		}
		
		public function dbClose(){
			return $this->instance->db_close();
		}

		public function fetchNum($statement,$vals){
			return $this->instance->_fetchNum($statement,$vals);
		}

		public function fetchObj($statement,$vals){
			return $this->instance->_fetchObj($statement,$vals);
		}

		public function fetchAll($statement,$vals){
			return $this->instance->_fetchBoth($statement,$vals);
		}

		public function fetchAssoc($statement,$vals){
			return $this->instance->_fetchAssoc($statement,$vals);
		}

		public function queryError(){
			return $this->instance->err();
		}

		public function getCount(){
			return $this->instance->count();
		}


		protected function dbConnection(){}
		protected function db_close(){}
		protected function err(){}
		protected function count(){}
		protected function _query($query){}
		protected function _prepare($query){}
		protected function _fetchNum($query,$vals){}
		protected function _fetchObj($query,$vals){}
		protected function _fetchBoth($query,$vals){}
		protected function _fetchAssoc($query,$vals){}
		protected function errorMessage(){}
		protected function _lastInsertId(){}
	
	}
	abstract class dbAccess{

	abstract protected function dbConnection();
	abstract protected function _query($query);
	abstract protected function _prepare($query);
	abstract protected function db_close();
	abstract protected function err();
	abstract protected function count();
	abstract protected function errorMessage();
	abstract protected function _lastInsertId();
	abstract protected function _fetchNum($query,$vals);
	abstract protected function _fetchObj($query,$vals);
	abstract protected function _fetchBoth($query,$vals);
	abstract protected function _fetchAssoc($query,$vals);
}


