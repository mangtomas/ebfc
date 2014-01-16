<?php
/**
 * Request class
 * sanitation and segments of url
 */

if(!defined('APPS')) exit ('No direct access allowed');

class Request{

		private $_controller;
		private $_method;
		private $_args;
		private $_dir;
		private $_temp = false;

		public function __construct(){
			global $config;
			$path = ROOT.APPS.'controllers'.DS;
			$http = (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) ? 'https://' : 'http://';
			$root = ltrim($_SERVER['SCRIPT_NAME'],'/');
			$root = explode('/',$root);
			
			 $root = ($root[0]=='index.php') ? null : $root[0].'/';
			$root = $http.$_SERVER['SERVER_NAME'].'/'.$root;
			if ($_SERVER["SERVER_PORT"] != "80"){
				$http = str_replace('[0-9A-Za-z]',$http);
				$http .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			}else{
				$http .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			}
			/*Remove base_url, leaving controllers, methods and params requests.
			*/

			$uri = ($root==$config['base_url']) ?  $root : $config['base_url'] ;
			
			 $url = str_replace($uri,"", $http);

			/*Find dashed(-) and replace underscore(_)
			*/
		
			$url = str_replace("-","_", $url);

			/*Segments of controllers, methods and params
			*/
			$x  = explode('/', $url);

			//print_r($x);
			if($x[0] ==''){
				$y[0] = strtolower($config['default_controller']);
				$y[1] = 'index';
				$y[2] = array();
			}elseif(!isset($x[1]) || $x[1]== ''){
				$temp = $path.$x[0];
				if(is_dir($temp)){
					$this->_temp = true;
					$y[0] = $x[0];
					$y[1] = strtolower($config['default_controller']);
					$y[2] = 'index';
					$y[3] = array();
				}else{
					$y[0] = $x[0];
					$y[1] = 'index';
					$y[2] = array();
				}
			}elseif($x[2]== '' || !isset($x[2])){
				$temp = $path.$x[0];
				if(is_dir($temp)){
					$this->_temp = true;
					$y[0] = $x[0];
					$y[1] = $x[1];
					$y[2] = 'index';
					$y[3] = array();
					}else{
					
					$y[0] = $x[0];
					$y[1] = $x[1];
					$y[2] = array();
					}
			}else{
			$temp = $path.$x[0];
				if(is_dir($temp)){
				$this->_temp = true;
					for($i = 0;$i < 3; $i++){
						$y[$i] = $x[$i];
					}
					if(isset($x[3])){
						$ctr = 0; 
						$par = array();
						foreach($x as $z){
							if($ctr < 3){
								$ctr++;
								continue;
							}
						array_push($par,$z);
						}
						$y[3] = $par;
					} 
				
				}else{
					for($i = 0;$i < 2; $i++){
						$y[$i] = $x[$i];
					}
					if(isset($x[2])){
						$ctr = 0; 
						$par = array();
						foreach($x as $z){
							if($ctr < 2){
								$ctr++;
								continue;
							}
						array_push($par,$z);
						}
						$y[2] = $par;
					} 
				}
				
			}
	        if($this->_temp){               
				$this->_dir = $y[0];
				$c = explode('?',$y[1]);
				$this->_controller = $c[0];
				$m = explode('?',$y[2]);
				$this->_method = $m[0];
				if(!empty($y[3])){
					$this->_args = $y[3];
				}
			}else{
				$c = explode('?',$y[0]);
				$this->_controller = $c[0];
				$m = explode('?',$y[1]);
				$this->_method = $m[0];
				if(!empty($y[2])){
					$this->_args = $y[2];
				}
			}

		}

		public function getController(){
			return $this->_controller;
		}

		public function getMethod(){
			return $this->_method;
		}

		public function getArgs(){
			return $this->_args;
		}
		
		public function isDirExists(){
		return  ($this->_temp == false) ? false : $this->_dir;
		}
		

}