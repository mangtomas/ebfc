<?php
if(!defined('APPS')) exit ('No direct access allowed');

class admin extends crackerjack_model{
	public function __construct(){
		parent::__construct();
	}

	public function getChild($ref){
		$result = $this->crud->read('SELECT module_id FROM _permission WHERE role_id=:id',array(':id'=>$ref),'obj');
		$list = "";
		foreach ($result as $key => $value) {
			# code...
			$mod = $this->crud->read('SELECT module FROM _module WHERE module_id=:idx',array(':idx'=>$value->module_id),'assoc');
			$list .= $mod['module'].', ';
		}
		return $list;
	
	}

}