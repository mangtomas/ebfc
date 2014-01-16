<?php

class main extends crackerjack{
	
	public function __construct(){
		parent::__construct();
	if(islogin()){
			$result = ($this->session->_get('role_id') == 2 || $this->session->_get('role_id') == 1 ) ? 1 : 0;
				if($result){
				
				}else{
				redirect('myaccount');
				}
				//if(($this->session->_get('role_id') != 1) || ($this->session->_get('role_id') != 2)){
				//	redirect('myaccount');
				//}
		}else{
			redirect('main/login');
		} 
		
	}
	public function index(){
	
	
		$data['result'] = $dtr = $this->crud->read('SELECT * FROM _dtr, _users WHERE _dtr.users_id = _users.users_id AND _dtr.p_status=0',array(),'obj');
		$data['ir'] = $dtr = $this->crud->read('SELECT * FROM _ireport ir INNER JOIN _dtr d ON ir.dtr_id = d.id LEFT JOIN _users u ON d.users_id = u.users_id WHERE ir.status=0',array(),'obj');
		$data['inner_header'] = false;
		
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">Incident Report was successfully accepted. <button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$this->template->adminTemplate('admin/dashboard',$data,$this->load);
	}
	
	public function information($id = false){
	$data['edit'] = $id[0];
		if(isset($_POST['changeinfomation'])){
			unset($_POST['changeinfomation']);
			if(empty($_POST['company_name']) || empty($_POST['address'])){
			$data['message'] = "<div class='alert alert-error alert-fade'>Please enter Company name and Address.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
				$info = array();
				foreach($_POST as $key =>$val){
					$info[$key] = r_string($val);
				}
				$result = $this->user->changeinformation($this->session->_get('uid'),$info);
				if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Information is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
					}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Problem updating information.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}
			}
		}
		
		$this->load->render('xadmin/account_information',$data,array('head_','footer_'));
	}
	
	public function accept_ir($id = false){
		$this->hash->hash_encryption($id[0]);
		$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
		$data['status'] = 1;
		$res = $this->crud->read('SELECT * FROM _ireport ir INNER JOIN _dtr d ON ir.dtr_id = d.id WHERE ir.ireport_id = :id',array('id'=>$id),'assoc');
		$id2 = $res['dtr_id'];
		$datax['isAbsent'] = 1;
		$this->crud->update('_dtr',$datax,array('id'=>$id2));
		$isupdate = $this->crud->update('_ireport',$data,array('ireport_id'=>$id));
		if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('admin/main/index/success/');
					}
		
	}
	
	public function incident_report(){
		$data['ir'] = $dtr = $this->crud->read('SELECT d.*,ir.*,u.*,ir.status  AS stat FROM _ireport ir INNER JOIN _dtr d ON ir.dtr_id = d.id LEFT JOIN _users u ON d.users_id = u.users_id',array(),'obj');
		$data['title'] = "Incident Report";
		$this->template->adminTemplate('admin/incident_report',$data,$this->load);
	}
	
}