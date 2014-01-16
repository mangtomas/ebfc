<?php

class dtr extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}

	}
	
	public function index(){
		$data['title'] = "Daily Time Record";
		
		$date =  date('Y-m-d');
		$current_date = date('d',strtotime($date));
			if($current_date >= 8 && $current_date <=15 ){
				$from = date('Y-m-d',strtotime(' -1 month',strtotime(date('Y-m-7'))));
				$to = date('Y-m-d',strtotime(date('Y-m-23')));
			}else{
				$from = date('Y-m-d',strtotime(' -1 month',strtotime(date('Y-m-24'))));
				$to = date('Y-m-d',strtotime(date('Y-m-8')));
				
			}
		$data['from'] = $from;
		$data['to'] = $to;
		$data['result'] = $dtr = $this->crud->read('SELECT * FROM _dtr, _users WHERE _dtr.users_id = _users.users_id AND _dtr.p_status = 0 AND _dtr._date BETWEEN :from AND :to ORDER by _date',array(':from' => $from, ':to'=>$to),'obj');
		$this->load->model(array('compute'));
		$sphr = 60 * 60;
		foreach($dtr as $k =>$v){
		//echo  get_hm($k->_in,$k->_date);
		$time_in = strtotime($v->_date." ".$v->_in);
		$span = strtotime($v->_date.' 07:15:00');
		 $lates = ($time_in > $span) ? get_hm($v->_in,$v->_date) :$v->_in;
		 $x = explode(':', $lates);
			$hours = $hours + $x[0];
			$mins = $mins + $x[1];
	}
	
	$this->template->adminTemplate('admin/dtr',$data,$this->load);
	}
	
	public function submit(){
			$this->load->libraries(array('form'));
			$result = $this->form->_post('submit');
			if($_POST){
				$x = explode('/',$result['cutoff']);
				$from = $x[0];
				$to = $x[1];
				//$employee = $this->crud->read('SELECT DISTINCT u.users_id,u.firstname,u.lastname FROM _users as u RIGHT JOIN _dtr d ON d.users_id = u.users_id',array(),'obj');
			$dtr = $this->crud->read('SELECT DISTINCT(_dtr._date),_users.* FROM _dtr, _users WHERE _dtr.p_status = 0 AND _dtr.users_id = _users.users_id AND _dtr.p_status = 0 AND _dtr._date BETWEEN :from AND :to ORDER by _date',array(':from' => $from, ':to'=>$to),'obj');
				$gross = 0;
				$total_hours = 0;
				$payroll_data = array();
				$print_data = array();
				$xy = array();
				foreach($dtr as $key => $v){
					$data = $this->compute->getTotalHoursPerDay($v->users_id,$v->_date);
					$per_hour = getRate($v->rate,'perhour');
					$per_minute = getRate($v->rate,'permin');
					$ifover = ((strtotime($data[$v->users_id]['total_hours'])>=strtotime('8:00')) ? 8 : date('H',strtotime($data[$v->users_id]['total_hours']))) * $per_hour;
					$total = 0;
					if((strtotime($data[$v->users_id]['total_hours'])>=strtotime('8:00'))){
						$total = 8 * $per_hour;
					}else{
						$per_h = (int)(date('H',strtotime($data[$v->users_id]['total_hours'])) * $per_hour);
						$per_m = (int)(date('i',strtotime($data[$v->users_id]['total_hours'])) * $per_minute);
						$total = ($per_h + $per_m);
					
					}
					$gross = 	$gross + $total;
					$total_hours = 	$total_hours + strtotime($data[$v->users_id]['total_hours']);
					
				
					//echo $v->_date." - ".$data[$v->users_id]['late']." - ".$data[$v->users_id]['total_hours']." - ".$total."<br />";
					$payroll_data['users_id'] = $v->users_id;	
					$payroll_data['_date'] = $v->_date;	
					$payroll_data['lates'] = $data[$v->users_id]['late'];	
					$payroll_data['total_hours'] =$data[$v->users_id]['total_hours'];	
					$payroll_data['total_rate_perday'] =$total;
					$payroll_data['rates'] =$data[$v->users_id]['rates'];
					$x  = explode(':',$data[$v->users_id]['total_hours']);
						if($x[0] < 4){
							
							unset($payroll_data['users_id']);
							unset($payroll_data['_date']);
							unset($payroll_data['lates']);
							unset($payroll_data['total_hours']);
							unset($payroll_data['total_rate_perday']);
							unset($payroll_data['rates']);
							$update_datax['isAbsent'] = 1;
							$this->crud->update('_dtr',$update_datax,array('_date'=>$v->_date,'p_status'=>0));
						//	$this->crud->update('_dtr',$update_datax,array('_date'=>$v->_date,'p_status'=>0));
						
						}
					
					//print_pre($payroll_data);
					//echo (empty($payroll_data)) ? 1 : 0;
						if(!empty($payroll_data)){
							$this->crud->create('_payroll',$payroll_data);
						}
					$update_data['p_status'] = 1;
					$this->crud->update('_dtr',$update_data,array('_date'=>$v->_date,'p_status'=>0));
				}
				
				
			$dtr = $this->crud->read('SELECT DISTINCT(_dtr._date),_users.* FROM _dtr, _users WHERE _dtr.p_status = 1 AND _dtr.users_id = _users.users_id AND _dtr.p_status = 1 AND (_dtr._date BETWEEN :from AND :to) AND _dtr.isAbsent=0 ORDER by _date',array(':from' => $from, ':to'=>$to),'obj');
			$data['dtr'] = $dtr;
			}
			$data['title'] = "Daily Time Record";
			$this->template->adminTemplate('admin/dtr_',$data,$this->load);
	}
	
}