<?php
class user extends crackerjack_model{
	private $info = array();
	private $data = array();
	private $id = null;
	private $model_registry = null;
	public function __construct(){
	parent::__construct();
	}
	/* 
	@information  it returns all information of the user
	return associated array
	date September 28, 2013
	author red
	*/
	public function information(){
		$mvc = Registry::getInstance();
		return $this->crud->read('SELECT * FROM _users AS u LEFT JOIN _role AS r ON u.role_id = r.role_id WHERE u.users_id = :id',array(':id'=>$this->session->_get('users_id')),'assoc');
	}
	
	
	/* 
	@navigation  it returns user permission for particular modules
	return mixed
	date September 28, 2013
	author red
	*/
	private function navigation(){
		$navigation = array();
		if($this->info['role_id']==1){
			$result =  $this->crud->read('SELECT * FROM _module WHERE status = 1',array(),'obj');
		}else{
			$result =  $this->crud->read('SELECT p.*,m.module,m.url FROM _permission AS p LEFT JOIN _module AS m ON p.module_id = m.module_id WHERE p.role_id = :id AND m.status=1 AND p._read=1',array('id'=>$this->info['role_id']),'obj');
			
		}
		
		foreach($result as $key){
				$navigation[$key->module_id] = array();
				if($this->info['role_id']!=1){
				$navigation[$key->module_id]['permission_id'] = $key->permission_id;
				}
				$navigation[$key->module_id]['url'] = $key->url;
				$navigation[$key->module_id]['module'] = $key->module;
				$navigation[$key->module_id]['_create'] = $key->_create;
				$navigation[$key->module_id]['_update'] = $key->_update;
				$navigation[$key->module_id]['_delete'] = $key->_delete;
				$navigation[$key->module_id]['_read'] = $key->_read;
				$navigation[$key->module_id]['_export']= $key->_export;
				$navigation[$key->module_id]['_print'] = $key->_print;
			}
		return $navigation;
	} 


	public function permission($module_id){
		$this->info = $this->information();
		$result = $this->crud->read('SELECT p.*,m.url,m.module FROM _permission p LEFT JOIN _module m ON p.module_id = m.module_id WHERE p.role_id=:rid AND p.module_id=:mid',array(':rid'=>$this->info['role_id'],':mid'=>$module_id),'assoc');
		return (is_array($result) ? $result : false);
	}
	
	public function data(){
		$this->info = $this->information();
		$this->data['info'] = array();
		$this->data['info'] = $this->info;
		$this->data['info']['fullname'] = $this->info['firstname'] ." ". $this->info['lastname'];
		$this->data['nagivation'] = $this->navigation();
		return $this->data;
	}
	
	public function validate($uname,$pass){
			if ($uname!=null && $pass!=null) {
		
						$info = $this->crud->read('SELECT * FROM _users WHERE email_address = :user',array(':user'=>$uname),'assoc');
								$this->hash->hash_encryption($info['varKey']);
						$password = $this->hash->decrypt($info['password']);
						
						if($info>0){
								$x['users_id'] = $info['users_id'];
								$x['role_id'] = $info['role_id'];
								$result =  ($password==$pass)? $x :  false;
							}else{
								$result = false;
							}
				}
			return ($result==false) ? false : $result;
	}
	
	
	public function changepassword($id,$old,$pass){
	//fetch old password
		$info = $this->crud->read('SELECT varKey,password FROM _users WHERE users_id = :id',array(':id'=>$id),'obj');

		$info = $info[0];
		$this->hash->hash_encryption($info->varKey);
		$password = $this->hash->decrypt($info->password);
		//echo $old." - ".$password;
		if($password==$old){
			
			//if password is match create new key for new password
				$vars = $this->hash->varkeydump();
				$this->hash->hash_encryption($vars);
				$data['varKey'] = r_string($vars);
				$data['password'] =  $this->hash->encrypt($pass);
				$data['date_updated'] =  date('Y-m-d H:i:s');
				return $this->crud->update('_users',$data,array('users_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function email($id,$email,$password){
		$info = $this->crud->read('SELECT varKey,password FROM _users WHERE users_id = :id',array(':id'=>$id),'obj');
		$info = $info[0];
		$this->hash->hash_encryption($info->varKey);
		$passworddb = $this->hash->decrypt($info->password);
		//print_r($info);
		if($password==$passworddb){
			//if password is match create new key for new password
				$data['email_address'] = $email;
				$data['date_updated'] =  date('Y-m-d H:i:s');
				return $this->crud->update('_users',$data,array('users_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function changeinformation($id,$vals){
		return $this->crud->update('_users',$vals,array('users_id'=>$id));
	}

	/*
	* print navigation
	*/
	public function navigationx(){

		$menu_label = array();
		$menu =  $this->crud->read('SELECT * FROM _module_label',array(),'obj');
		//$menu = $this->user->navigation($this->session->_get('uid'));
			foreach ($menu as $key => $value) {
					//$module = $this->crud->read('SELECT p.*,m.module,m.url FROM _permission AS p LEFT JOIN _module AS m ON p.module_id = m.module_id WHERE p.role_id = :id AND m.status=1 AND p._read=1 AND m.reference_id=:id',array('id'=>$this->info['role_id']),'obj');
					$module = $this->crud->read('SELECT module,reference_id,url,module_id,_create,_read,_update,_delete,_export,_print FROM _module WHERE reference_id=:id AND status=1',array(':id'=>$value->label_id),'obj');

						foreach ($module as $xk => $xv) {
							# code...
							if($value->label_id==$xv->reference_id){
								$menu_label[$xv->reference_id]['module'] = $module;
								$menu_label[$xv->reference_id]['label'] = $value->label;
							}
						}

			}
		return $menu_label;
	}
}