<?php

class payroll extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}

	}
	
	public function index(){
		$dtr = $this->crud->read('SELECT DISTINCT(p._date), u.users_id,u.firstname,u.middlename,u.lastname,u.employee_id,p._date,p.lates,p.total_hours  FROM _users u INNER JOIN _payroll p ON u.users_id = p.users_id WHERE u.users_id!=1 ORDER BY p._date',array(),'obj');
		if(isset($_GET['q'])){
			$dtr = $this->crud->read('SELECT * FROM _users u INNER JOIN _payroll p ON u.users_id = p.users_id WHERE (u.users_id!=1) AND (u.users_id LIKE :search OR u.firstname LIKE :search OR u.lastname LIKE :search OR u.employee_id LIKE :search OR u.email_address LIKE :search)',array('search'=>$_GET['q']."%"),'obj');
		//	$db$this->db->query('SELECT * FROM _users WHERE (users_id != :id AND users_id!=1) AND uses_id LIKE :%');
		}
		$data['result'] = $dtr;
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">Course was successfully updated.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		
		$data['title'] = "Payroll";
		$this->template->adminTemplate('admin/payroll',$data,$this->load);
	}
	
	public function add(){
		$this->load->libraries(array('hash','form'));
		if(isset($_POST['btn-submit'])){
		$result = $this->form->_post('btn-submit');
		$vars = $this->hash->varkeydump();
		$this->hash->hash_encryption($vars);
		$result['role_id'] = 7;
		$result['varKey'] = r_string($vars);
		$result['password'] =  $this->hash->encrypt($result['password']);
		$result['date_updated'] =  date('Y-m-d H:i:s');
		$this->hash->hash_encryption($info->varKey);
		$password = $this->hash->decrypt($info->password);
		$result = $this->crud->create('_users',$result);
			if($result > 0){
				$data['message'] = true;
			}
		}
	
		$data['varkey'] = $this->hash->varkeydump();
		$result = $this->crud->read('SELECT max(users_id) as mx FROM _users',array(),'obj');
		foreach($result as $k => $v);
		$resultx = $this->crud->read('SELECT * FROM _users WHERE users_id=:id',array(':id'=>$v->mx),'obj');
		foreach($resultx as $k => $v);
		$empid = substr($v->employee_id,6)+$v->users_id;
		$data['nextemp'] =  date('ymd')."".$empid; 
		$data['title'] = "Add Employee";
		$data['action'] = "add";
		$this->template->adminTemplate('admin/employees_',$data,$this->load);
	}
	
	public function edit($id =false){
		$this->load->libraries(array('form'));
		$result = $this->form->_post('btn-submit');
		
			if ($result) {
				# code...
				$users_id = $result['users_id'];
				unset($result['users_id']);
				$isupdate = $this->crud->update('_users',$result,array('users_id'=>$users_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('admin/employees/index/success/');
					}
			}

			
			$this->hash->hash_encryption($id[0]);
			$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
			
			$data['result'] = $this->crud->read('SELECT * FROM _users WHERE users_id=:id',array(':id'=>$id),'assoc'); 
			$data['title'] = "Edit Employee";
			$data['action'] = "edit";
			$data['info'] =$st = $this->user->information($this->session->_get('uid'));
			$this->template->adminTemplate('admin/employees_',$data,$this->load);
	}
		
	
	public function validate($id = false){
			if($id[0]=="ajax=true"){
				$result = 'false';
				if(isset($_REQUEST['email_address'])){
					$res =  $this->crud->read('SELECT count(*) as count FROM _users WHERE email_address=:email',array(':email'=>$_REQUEST['email_address']),'assoc');
						
						if($res['count'] <= 0){
								$result = 'true';
						}
				echo $result;
				}
			
			}else{
				require('system/core/error.php');
			}
	}

}