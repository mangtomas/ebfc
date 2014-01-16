<?php
if(!defined('APPS')) exit ('No direct access allowed');

class acl extends crackerjack_model{
	private $_permission = array();
	public function __construct(){
		parent::__construct();
	}

	public function isAllowed($page =false){
			$uid 		= $this->session->_get('uid');
			$role_id 	= $this->session->_get('role_id');

			if ($uid==1|| $uid==2) {
				# code...
				$this->_permission['page'] = true;
				$this->_permission['permission'] = array('_create'=>1,'_read'=>1,'_update'=>1,'_delete'=>1,'_export'=>1,'_print'=>1);
			}else{
					$result = $this->crud->read('SELECT * FROM _permission WHERE user_id=:id AND role_id=:role AND module_id=:module',array(':id'=>$this->session->_get('uid'),':role'=>$this->session->_get('role_id'),':module'=>$page),'obj');

			 	$this->_permission['page'] =   ($result[0]->_read==null || $result[0]->_read==0) ? false : true ;
			 		if(!empty($result)){

			 			$per = array();
						 	foreach ($result[0] as $key => $value) {
						 		# code...
						 		$per[$key] = $value;
						 	}
						 	$this->_permission['permission'] = $per;
			 		}
			}

		return $this->_permission;
	
	}



}