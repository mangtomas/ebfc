<?php
if(!defined('APPS')) exit ('No direct access allowed');
class actions extends crackerjack{
	private $status;
	public function __construct(){
		parent::__construct();
			if(islogin()==false){redirect('main');}
	}

	public function index($id = false){
		require_once('system/core/error.php');	
	}

	public function delete(){
		if($_POST['_delete']){
			/*important*/
			$temp = explode('_', $_POST['row']);
			$table = "_$temp[0]";
			$field = "$temp[0]_id";
			print_r($temp);
			echo $id = $temp[1];
			echo $result = $this->crud->delete($table,array($field => $id));
			
		}	
	}
	


	
}