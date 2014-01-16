<?php
if(!defined('APPS')) exit ('No direct access allowed');
class form{
	public function post($post){
		unset($_POST[$post]);
		$_post = array();
			foreach( $_POST as $varname => $value ){
				
				$val = ($value=='on') ? 1 : $value;
				

						$_post[str_replace('_','',$varname)] = $val;
					
			}
		return $_post;
	}
	
	public function _post($post){
		unset($_POST[$post]);
		$_post = array();
			foreach( $_POST as $varname => $value ){
				$val = ($value=='on') ? 1 : $value;
				$_post[$varname] = r_string($val);
			}
		return $_post;
	}

	public function get($get = false){
			if ($get == false) {
				# code...
				$_get = array();
					foreach( $_GET as $varname => $value ){
						$val = ($value=='on') ? 1 : $value;
						$_get[$varname] = r_string($val);
					}
				return $_get;
			}else{
				return r_string($_GET[$get]);
			}
	}




}