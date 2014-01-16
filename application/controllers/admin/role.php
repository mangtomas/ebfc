<?php

class role extends crackerjack{
	private $modules = array();
	private $result;
	public function __construct(){
		parent::__construct();
		$this->result= $this->crud->read('SELECT * FROM _module WHERE status=1 ORDER BY reference_id',array(),'obj');
		foreach($this->result as $k => $g){
			$this->modules[$g->module_id] = array();
			$this->modules[$g->module_id]['_create'] =  0;
			$this->modules[$g->module_id]['_read'] 	=  0;
			$this->modules[$g->module_id]['_update'] =  0;
			$this->modules[$g->module_id]['_delete'] =  0;
			$this->modules[$g->module_id]['_print'] 	=  0;
			$this->modules[$g->module_id]['_export'] =  0;
		}
	}

	public function index(){
			$data['result'] = $this->result;
			if($_POST){
				$form_result = $this->form->post('submit');
				$role_data['role'] = $form_result['role'];
				unset($form_result['role']);
				$role_data['status'] =  1;
				echo "<pre>";
				print_r($form_result);
				echo "</pre>";
				$role_id = $this->crud->create('_role',$role_data);
				foreach($form_result as $k => $v){
					$this->modules[$k]['_create'] = $v['_create'];
					$this->modules[$k]['_read'] = $v['_read'];
					$this->modules[$k]['_update'] = $v['_update'];
					$this->modules[$k]['_delete'] = $v['_delete'];
					//;
					
				}
				$x = array();
				foreach($this->modules as $k => $v){
					$x['module_id'] = $k;
					$x['role_id'] = $role_id;
					$x['_create'] 	= ($v['_create']==0)? 0 : $v['_create'];
					$x['_read'] 	= ($v['_read']==0)	? 0 : $v['_read'];
					$x['_update'] 	= ($v['_update']==0)? 0 : $v['_update'];
					$x['_delete'] 	= ($v['_delete']==0)? 0 : $v['_delete'];
					$this->crud->create('_permission',$x);
				}
				
				
					echo "<hr><pre>";
				print_r($this->modules);
				echo "</pre>";
			/* 	$x['reference_id'] = 5;
					$x['_create'] 	= 1;
					$x['_read'] 	= 1;
					$x['_update'] 	= 1;
					$x['_delete'] 	= 1;
					$this->crud->create('_module',$x); */
			}
	
	
		$data['role'] = $this->crud->read('SELECT * FROM _role WHERE status=1',array(),'obj');
/* 		$this->load->render('admin/common/head_',$data);
		$this->load->render('admin/role_create',$data);
		$this->load->render('admin/common/footer_',$data); */
			$this->template->adminTemplate('admin/role_create',$data,$this->load);
	}
	
	public function modify($id){
	$id =  $id[0];
	if($_POST){
				$form_result = $this->form->post('submit');
				
				$role_data['role'] = $form_result['role'];
				
				unset($form_result['role']);
				echo "<pre>";
				print_r($form_result);
				echo "</pre>";
			
				foreach($form_result as $k => $v){
					$this->modules[$k]['_create'] = $v['_create'];
					$this->modules[$k]['_read'] = $v['_read'];
					$this->modules[$k]['_update'] = $v['_update'];
					$this->modules[$k]['_delete'] = $v['_delete'];
				}
				$x = array();
				foreach($this->modules as $k => $v){
					$x['module_id'] = $k;
					$x['role_id'] = $id;
					$x['_create'] 	= ($v['_create']==0)? 0 : $v['_create'];
					$x['_read'] 	= ($v['_read']==0)	? 0 : $v['_read'];
					$x['_update'] 	= ($v['_update']==0)? 0 : $v['_update'];
					$x['_delete'] 	= ($v['_delete']==0)? 0 : $v['_delete'];
					//$this->crud->create('_permission',$x);
					$this->crud->update('_permission',$x,array('module_id'=>$k,'role_id'=>$id),'=');
				}
					
			}
	
	
		
		$data['result'] = $this->result;	
		$data['role'] = $this->crud->read('SELECT * FROM _role WHERE status=1',array(),'obj');
		$result = $this->crud->read('SELECT * FROM _module AS m INNER JOIN _permission AS p ON m.module_id=p.module_id WHERE p.role_id=:id',array(':id'=>$id),'obj');
		$modules = array();
		$modules_init = array();
		foreach($result as $k => $g){
			$modules[$g->module_id] = array();
			$modules[$g->module_id]['_create'] = ($g->_create==1) ? 1 : 0;
			$modules[$g->module_id]['_read'] = ($g->_read ==1) ? 1 : 0;
			$modules[$g->module_id]['_update'] = ($g->_update==1) ? 1 : 0;
			$modules[$g->module_id]['_delete'] = ($g->_delete==1) ? 1 : 0;
		}
		$data['modules'] = $modules;
		
		
		
		
			
		$this->load->render('admin/common/head_',$data);
		$this->load->render('admin/role_create',$data);
		$this->load->render('admin/common/footer_',$data);
	}
	
	public function login(){
		//print_r($_POST);
		$this->load->libraries(array('form'));
		$this->load->model(array('validate'));
		$this->load->libraries(array('hash'));
		
		if(isset($_POST['usersubmit'])){
			$post = $this->form->post('usersubmit');
			
			$result = $this->validate->user($post['userlogin'],$post['userauth']);
			if(is_array($result)){
				$result['islogin'] = true;
				$this->session->_set($result);
							redirect('admin');
						
				
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
			unset($post['role']);
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
	
	public function register(){
		$this->load->render('templates/main_header');
		$this->load->render('moving_along');
		$this->load->render('templates/main_footer');
		
		
	}
	public function privacy_and_terms(){
		$this->load->render('templates/main_header');
		$this->load->render('privacy_and_terms');
		$this->load->render('templates/main_footer');
	}
	public function guidelines(){
		$this->load->render('templates/main_header');
		$this->load->render('guidelines');
		$this->load->render('templates/main_footer');
	}
	
	public function contact_us(){
		$this->load->render('templates/main_header');
		$this->load->render('contact_us');
		$this->load->render('templates/main_footer');
	}
	
	public function ourteam(){
		$this->load->render('templates/main_header');
		$this->load->render('ourteam');
		$this->load->render('templates/main_footer');
	}
	
	public function help(){
		$this->load->render('templates/main_header');
		$this->load->render('help');
		$this->load->render('templates/main_footer');
	}
}