<?php

function islogin(){
		$mvc =Registry::getInstance();
		//print_r($mvc);
		 if($mvc->session->_get('islogin')==true){
			return true;
		}else{
			return false;
	} 
}
