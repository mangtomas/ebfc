<?php
if(!defined('APPS')) exit ('No direct access allowed');
class module extends crackerjack{
	private $status = false;
	public function __construct(){
		parent::__construct();
			if(islogin()==false){redirect('main');}

	}

	public function index($id = false){
		$data['modules'] = $this->crud->read('SELECT * FROM _module,_module_label WHERE module_id != 1 AND _module.reference_id=_module_label.label_id',array(),'obj');
		
		//print_r($data['modules']);
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">Module was successfully updated.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$data['title'] = "Modules";
		$this->template->adminTemplate('admin/module',$data,$this->load,1);
	}

	public function add($id = false){
		
		$this->load->libraries(array('form'));
		$result = $this->form->_post('btn-submit');
		if($result){
			
				if( $this->crud->create('_module',$result)){
					$this->session->_set(array('message'=>true,'action'=>'add'));
					redirect('admin/module/index/success');
				}
		}


	$data['label'] = $this->crud->read('SELECT * FROM _module_label',array(),'obj');
	$data['action'] = 'Add';
	$this->template->adminTemplate('admin/module_',$data,$this->load,1);
	}

	public function edit($id =false){
		//if($id[0]==null){redirect('admin/module');}
		$this->load->libraries(array('form'));
		$result = $this->form->_post('btn-submit');
		
			if ($result) {
				# code...
				$module_id = $result['module_id'];
				unset($result['module_id']);
				$result['_create'] 	= isset($result['_create']) ? $result['_create'] : 0 ;
				$result['_read'] 	= isset($result['_read']) 	? $result['_read']	 : 0 ;
				$result['_update'] 	= isset($result['_update']) ? $result['_update'] : 0 ;
				$result['_delete'] 	= isset($result['_delete']) ? $result['_delete'] : 0 ;
				$result['status'] 	= isset($result['status']) ? $result['status'] : 0 ;
				$result['_export'] 	= isset($result['_export']) ? $result['_export'] : 0 ;
				$result['_print'] 	= isset($result['_print']) ? $result['_print'] : 0 ;
				$isupdate = $this->crud->update('_module',$result,array('module_id'=>$module_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('admin/module/index/success');
					}
			}

			
			$this->hash->hash_encryption($id[0]);
			$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
			$data['result'] = $this->crud->read('SELECT * FROM _module WHERE module_id = :id',array(':id'=>$id),'assoc');
			$data['label'] = $this->crud->read('SELECT * FROM _module_label',array(),'obj');
			$data['action'] = 'Edit';
			$this->load->template('admin/module_',$this->acl->isAllowed(1),$data);

	}
	
	
}