<?php

class form{

	public function post(){
		$_post = array();
			foreach( $_POST as $varname => $value ){
				$_post[$varname] = r_string($varname);
			}
		return $_post;
	}


}