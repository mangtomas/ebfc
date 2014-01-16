<?php
if(!defined('APPS')) exit ('No direct access allowed');
class template{
	public $registry ;
	public function __construct(){
		$this->registry = Registry::getInstance();

	}

	public function adminTemplate($body,$data = array(),$loader,$module = false){
		
		$data['data'] = $user_data = $this->registry->user->data();
		$data['info'] = $this->registry->user->information();
		$module = $this->registry->crud->read('SELECT * FROM _module WHERE url=:url',array('url'=> _controller()),'assoc');
		if(is_array($module)){
			$module = $module['module_id'];
		}
		$permission = $this->registry->user->permission($module);
			if($user_data['info']['role_id'] == 1){
				 $permission = array('module_id'=>$permission['module_id'],'module'=>$permission['module'],'url'=>$permission['url'],'_create' => 1,'_update' => 1,'_delete' => 1,'_read' => 1,'_export' => 1,'_print' => 1);
			}
		$data['data']['permission'] = $permission;
		//print_r($user_data['nagivation']);
		$loader->render('admin/header',$data);
			if($module){
				if($permission['_read'] != false || $permission['_read'] != 0) {
						# code...
					$loader->render($body,$data);
				}else{
					echo '<div class="container">
							<h1>Not found <span>:(</span></h1>

							<p>Sorry, but the page you were trying to view does not exist.</p>

							<p>It looks like this was the result of either:</p>
							<ul>
								<li>you don\'t have a permission to access</li>
								<li>a mistyped address</li>
								<li>an out-of-date link</li>
							</ul>
						</div>';
				}
			}else{
				$loader->render($body,$data);
			}
		
		$loader->render('admin/footer',$data);
	}
	
	
	public function employeeTemplate($body,$data = array(),$loader,$module = false){
		
		$data['data'] = $user_data = $this->registry->user->data();
		$data['info'] = $this->registry->user->information();
		$module = $this->registry->crud->read('SELECT * FROM _module WHERE url=:url',array('url'=> _controller()),'assoc');
		if(is_array($module)){
			$module = $module['module_id'];
		}
		$permission = $this->registry->user->permission($module);
			if($user_data['info']['role_id'] == 1){
				 $permission = array('module_id'=>$permission['module_id'],'module'=>$permission['module'],'url'=>$permission['url'],'_create' => 1,'_update' => 1,'_delete' => 1,'_read' => 1,'_export' => 1,'_print' => 1);
			}
		$data['data']['permission'] = $permission;
		//print_r($user_data['nagivation']);
		$loader->render('employee/header',$data);
			if($module){
				if($permission['_read'] != false || $permission['_read'] != 0) {
						# code...
					$loader->render($body,$data);
				}else{
					echo '<div class="container">
							<h1>Not found <span>:(</span></h1>

							<p>Sorry, but the page you were trying to view does not exist.</p>

							<p>It looks like this was the result of either:</p>
							<ul>
								<li>you don\'t have a permission to access</li>
								<li>a mistyped address</li>
								<li>an out-of-date link</li>
							</ul>
						</div>';
				}
			}else{
				$loader->render($body,$data);
			}
		
		$loader->render('employee/footer',$data);
	}



}