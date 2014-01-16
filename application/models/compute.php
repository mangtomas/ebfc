<?php

class compute extends crackerjack_model{
	public function __construct(){
		parent::__construct();
	}
	
	public function total_hours($id,$fr,$to){
	$a = $this->crud->read('SELECT * FROM _dtr WHERE users_id=:id AND _date BETWEEN :fr AND :t',array('id'=>$id,'fr'=>$fr,'t'=>$to));
		foreach($a as $key){

		$mins = get_hm($key['_in'],$key['date']);

		//get total difference by minutes
		$total_mins = getDiff("".$key['_date']." ",$key['_date']." ".$key['_out']);
		
		//get minutes late
		$get_mins = explode(':',$mins);
		$hr = $get_mins[0];
		$final = getDifference($fr,$to);
		$break_time = explode(':', $final);
		//total hours and minutes per day...
		$per_day = ($break_time[0] <=5) ? ($break_time[0]-$hr).":".$break_time[1] : ($break_time[0] - 1) - $hr .":".$break_time[1];
		$x = explode(':', $per_day);
		$hour = $hour + $x[0];
		$s = ($hour * 60);
		$min = $min + $x[1];
	
		}
		//return over all count of hours and minutes
		$total = $final = getDifference($fr,$to);
		return $total;
	}
	
	/* 
	to be continue ....get the total lates of the employee....
	!important..

	*/
	/* 
	Get the overall total lates of the employee in particular cutoff;
	@param userId 		= employ_id
	@param dateStart 	= start date of cutoff
	@param dateEnd 	= end date of cutoff
	*/
	public function getTotalLates($userID,$dateStart, $dateEnd){
		//get the daily time record of the employee
		$result = $this->crud->read("SELECT * FROM _dtr WHERE users_id=:id AND _date BETWEEN :start AND :end",array(':id'=>$userID,':start'=>$dateStart,':end'=>$dateEnd));
		$sphr = 60 * 60;
		foreach($result as $key){
			$dtime = strtotime(date('Y-m-d 7:16:00'));
			$get_late = strtotime($key['_in']);
			$lates = ($get_late > $dtime) ? get_hm($key['_in'],$key['date']) : $key['_in'];
			$x = explode(':', $lates);
			$hours = $hours + $x[0];
			$mins = $mins + $x[1];
		}
		
		$result = HrtoMins(($hours * 60) + $mins);
		return $result;
	}
	
	public function getTotalHoursPerDay($userID,$date){
		$result = $this->crud->read("SELECT * FROM _dtr d INNER JOIN _users u ON d.users_id = u.users_id WHERE d.users_id=:id AND d._date =:_date",array(':id'=>$userID,':_date'=>$date),'obj');
		$late = '';
		$hour = 0;
		$rates = 0;
		$total_hour = 0;
		$total_mins = 0;
		$mins = 0;
		$total = 0;
		$total_time = array();
		foreach($result as $k => $v){
			//$late = $late + getLate($v->_id,$date);
			$late = explode(':',getLate($v->_in,$date));
			$hour = $hour + $late[0];
			$mins = $mins + $late[1];
			$from  = $date." ".$v->_in;
			$to  	= $date." ".$v->_out;
			//$total .= "\\".date('H:i',getTimeDiff($from,$to))."../";
			//$total .= "\\".date('H:i',getTimeDiff($from,$to))."../";
			$_in = explode(':',$v->_in);
			$total = explode(':',HrtoMins(getDiff($v->_date,$v->_date." ".$v->_out)));
			$conpensate = ($_in[0] >= 13) ? 6 : 0;
			$total_hour = $total_hour + ($total[0] - $conpensate);
			$total_mins = $total_mins + ($total[1] - $conpensate);
			$per_hour = getRate($v->rate,'perhour');
			$per_minute = getRate($v->rate,'permin');
			$xx = $per_hour + $per_minute;
			
			$total_rates = $total_rates + $xx;
			//$late .= $v->_in ." - ".getLate($v->_in,$date)." //".strtotime($v->_in).">>>".strtotime('13:00:00')."\\";
		} 
		$total_time[$userID]['late'] =  $hour.":".$mins;
		//$total_mins = ($total_hour >= 8) ? '00' : $total_mins;
		$total_time[$userID]['total_hours'] =  $total_hour.":".$total_mins;
		$total_time[$userID]['rates'] =  $total_rates;
		return $total_time;
	}


}