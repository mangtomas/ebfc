<?php

class account extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}


	}
	
	public function index(){
	$this->information();
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
		$this->template->adminTemplate('admin/account_settings',$data,$this->load);
		
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
	$this->template->adminTemplate('admin/account_information',$data,$this->load);
	}
	
}