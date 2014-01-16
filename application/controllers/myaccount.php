<?php

class myaccount extends crackerjack{
	
	public function __construct(){
		parent::__construct();
	
		if(islogin()){
			 $session = $this->session->_get('role_id');
				if($session == 1 || $$session == 2){
						redirect('admin');
				}
		}else{
			redirect('main/login');
		}		
	}
	public function index(){
		 $this->session->_get('users_id');
		$data['result'] = $dtr = $this->crud->read('SELECT * FROM _users u INNER JOIN _dtr d ON d.users_id = u.users_id WHERE d.users_id = :id',array('id'=>$this->session->_get('users_id')),'obj');
		//print_pre($dtr);
			foreach($dtr as $k => $v){
					$result = $this->crud->read('SELECT count(dtr_id) as cnt,status FROM _ireport WHERE dtr_id=:id',array(':id'=>$v->id),'assoc');
							$x[$v->users_id] = array();
							//$x[$v->users_id][$v->id] = array();
						if($result['cnt'] > 0){
							$x[$v->users_id][$v->id]['res'] = 'true';
							$x[$v->users_id][$v->id]['cntx'] = 1;
							$x[$v->users_id][$v->id]['stat'] = $result['status'];
						}else{
							$x[$v->users_id][$v->id]['res'] = 'false';
							$x[$v->users_id][$v->id]['cntx'] = 0;
							$x[$v->users_id][$v->id]['stat'] = $result['status'];
						}
				}
				
		$data['in'] = $x;
		$data['inner_header'] = false;
		$this->template->employeeTemplate('employee/dashboard',$data,$this->load);
	}
	
	public function settings(){
	$data['info'] = $this->user->information($this->session->_get('users_id'));
	$data['smenu'] = 'settings';
	$this->load->libraries(array('hash','form'));
	if(isset($_POST['changeemail'])){
		$result = $this->form->post('changeemail');
		$email = $result['inputEmail'];
		$password = $result['inputPasswordx'];
			if(empty($email) || empty($password)){
				$data['message'] = "<div class='alert alert-error alert-fade'>Enter email and password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
				$result =  $this->user->email($this->session->_get('users_id'),$email,$password);
					
			if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Email is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}
			
			}
	}
	if(isset($_POST['changepassword'])){

		$passresult = $this->form->post('changepassword');

		if(empty($passresult['newpassword']) || empty($passresult['inputOldPassword'])){
			$data['message'] = "<div class='alert alert-error alert-fade'>Please enter password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
		}else{
		$result =  $this->user->changepassword($this->session->_get('users_id'),$passresult['inputOldPassword'],$passresult['newpassword']);
			if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Password is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
			$data['message'] = "<div class='alert alert-error alert-fade'>Old Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}
		}
	}
		$data['title'] = 'Account Settings';
		$this->template->employeeTemplate('employee/account_settings',$data,$this->load);
		
	}
	
	public function information($id = false){
		$data['edit'] = $id[0];
		$this->load->libraries(array('upload'));

			if(isset($_POST['changeinfomation'])){
			unset($_POST['changeinfomation']);
			unset($_POST['avatar']);
			
				$info = array();
				foreach($_POST as $key =>$val){
					$info[$key] = r_string($val);
				}
				$image = $this->upload->image('avatar','uploads/');
				if($image !=''){
				$info['avatar'] = $image;
				
				}
				$result = $this->user->changeinformation($this->session->_get('users_id'),$info);
				if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Information is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
					}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Problem updating information.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}
		}
		$data['title'] = 'Account information';
	$this->template->employeeTemplate('employee/account_information',$data,$this->load);
	}
	
	public function payslip($id = false){
		$data['edit'] = $id[0];
		
		$data['title'] = 'My Payslip';
	$this->template->employeeTemplate('employee/payslip',$data,$this->load);
	}
	
	public function submit_ir($id = false){
		$this->hash->hash_encryption($id[0]);
		$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
		if($id > 0){
					
			
				$this->load->libraries(array('upload'));
				$image = $this->upload->image('file','uploads/');
				if($image !=''){
				$info['dtr_id'] = $id;
				$info['file'] = $image;
					$this->crud->create('_ireport',$info);
					$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">You have successfully submit your Incident Report.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			
				}
			$data['title'] = 'Incident Report';
			$this->template->employeeTemplate('employee/ir',$data,$this->load);
		}else{
			//redirect('myaccount');
		}
	}

}