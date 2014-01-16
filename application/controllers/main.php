<?php

class main extends crackerjack{
	
	public function __construct(){
		parent::__construct();
			if(islogin()){
				if($this->session->_get('role_id')==1 || $this->session->_get('role_id')==2){
					redirect('admin');
				}
			}
	}
	public function index(){
		$this->login();
	}
	
	public function login(){
		$this->load->libraries(array('form'));
		$this->load->libraries(array('hash'));
		
		if(isset($_POST['usersubmit'])){
			$post = $this->form->post('usersubmit');
			$result = $this->user->validate($post['userlogin'],$post['userauth']);
			if(is_array($result)){
				$result['islogin'] = true;
				$this->session->_set($result);
					if($result['role_id'] == 1 || $result['role_id']==2){
						redirect('admin');
					}else{
						redirect('myaccount');
					}
				}else{
				$data['error'] = "Invalid Username of Password.";
			}
		}
		
		$this->load->render('templates/head_login');
		$this->load->render('login_',$data);
		$this->load->render('templates/footer_login');
	
	}

	/**
	 * forgot function
	 *
	 * @return boolean
	 * @author red
	 **/
	public function forgot($id = false){
		$this->load->libraries(array('form'));
		$this->load->model(array('validate'));
		$res =  $this->form->get();
		//print_r($res);
		if(isset($_POST['forgot'])){
			$post = $this->form->post('forgot');
				if($post['userlogin']!=null){
					if($this->validate->email($post['userlogin'])){
							
					}else{
						$data['error'] = 'Email is not exists.';
					}	
				}else{
					$data['error'] = 'Please enter your email.';
				}
			
		}
		
		
		
		
		$this->load->render('templates/head_login');
		$this->load->render('forgot',$data);
		$this->load->render('templates/footer_login');
	}
	
	
	
	public function logout(){
		$this->session->_destroy();
		redirect('main');
	
	}
	
	public function test(){
		$this->load->render('admin/header');
		$this->load->render('test',$data);
		$this->load->render('admin/footer');
	}
	
	
}