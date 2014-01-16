<?php

//!important format "year-month-day hr:min:sec"
function getTotalMinutes($date_from,$date_to){
	$to_time = strtotime($date_to);
	$from_time = strtotime($date_from);
	$diff = $to_time - $from_time;
	$mins = round(abs($to_time - $from_time)/60,0, PHP_ROUND_HALF_DOWN);
	return $mins;
}
//get time diff
function getDifference($date_from,$date_to){
	$Minutes =  getTotalMinutes($date_from,$date_to);
    $Min = ($Minutes < 0) ? abs($Minutes) : $Minutes;
    $iHours = Floor($Min / 60);
    $Minutes = ($Min - ($iHours * 60)) / 100;
    $tHours = $iHours + $Minutes;
    if ($Minutes < 0)
    {
        $tHours = $tHours * (-1);
    }
    $aHours = explode(".", $tHours);
    $iHours = $aHours[0];
    if (empty($aHours[1]))
    {
        $aHours[1] = "00";
    }
    $Minutes = $aHours[1];
    if (strlen($Minutes) < 2)
    {
        $Minutes = $Minutes ."0";
    }
    $tHours = $iHours .":". $Minutes;
    return $tHours;
}

function get_hm($in,$date){
		$tin = str_rem(':',$in);
		$span = str_rem(':','07:15:00');
		$sphr = 60 * 60;
		if($tin <$span){
			return "---";
		}else{
			$a = getmins($in);
			$mins = $mins + $a;
			$lates['mins'] = $mins;
				
				$start = strtotime($date." 07:15:00");
					$end = strtotime($date." ".$in);
					$dif = $end - $start;
					//hours
					$hr = round($dif/$sphr,0);
					$hour = $hour + $hr;
					$lates['hours'] = $hour;
		}
		return $lates['hours'].":".$lates['mins'];
	}
	
/* 
Get late of the day
 */
 
function getLate($timeIn,$dateToday){
	//initialize variable
	$lates = array();
	//get user time in
	$time_in = strtotime($dateToday." ".$timeIn);
	$_in = explode(':',$timeIn);
	//span time for late
	
	$span = ($_in[0] >= 13) ? strtotime($dateToday.' 13:00:00') :  strtotime($dateToday.' 07:15:00');
	$sphr = 60 * 60;
		if($time_in < $span){
			return '---';
		}else{
			$getMinutes = date('i',strtotime($dateToday." ".$timeIn));
			$minutes = $minutes + $getMinutes;
			//get difference
			$getDifference = $time_in - $span;
			$getHourDiff = round($getDifference/ $sphr, 0);
			$hours = $hours + $getHourDiff;
		}
	return $hours.":".$minutes;
}
/* get the time diff */

function getTimeDiff($timeStart,$timeEnd){
	$start = strtotime($timeStart);
	$end = strtotime($timeEnd);
//	$diff = (int)($start - $end);
	return ($end - $start);
}
	
function getDiff($date,$to){
	$to_time = strtotime($to);
	$from_time = strtotime($date." 7:00:00");
	$diff = $to_time - $from_time;
	//hours
	$hours =  round($diff/(60*60), 0, PHP_ROUND_HALF_DOWN);
	//minutes
	$mins = round(abs($to_time - $from_time)/60,0, PHP_ROUND_HALF_DOWN);
	//$hourdiff = round((strtotime($time1) - strtotime($time2))/3600, 1);
	return $mins;
}
function str_rem($del,$subject){
	return str_replace($del,"",$subject);
}
function getmins($time){
		$time = explode(':',$time);
		return $time[1];
}
function HrtoMins($Minutes){
    $Min = ($Minutes < 0) ? abs($Minutes) : $Minutes;
    $iHours = Floor($Min / 60);
    $Minutes = ($Min - ($iHours * 60)) / 100;
    $tHours = $iHours + $Minutes;
    if ($Minutes < 0)
    {
        $tHours = $tHours * (-1);
    }
    $aHours = explode(".", $tHours);
    $iHours = $aHours[0];
    if (empty($aHours[1]))
    {
        $aHours[1] = "00";
    }
    $Minutes = $aHours[1];
    if (strlen($Minutes) < 2)
    {
        $Minutes = $Minutes ."0";
    }
    $tHours = $iHours .":". $Minutes;
    return $tHours;
}

function getRate($basic,$return){
	//$perday = ($basic * 12) / 365;
	$perhour = $basic / 8;
	$permin = $perhour / 60;

	switch ($return) {
		case 'perday': return round($basic,2);
			# code...
			break;
		case 'perhour': return round($perhour,2);
			# code...
			break;
		case 'permin':return round($permin,2);
			# code...
			break;
		default:
			# code...
			return "oops";
			break;
	}
}

function getTotalHoursPerDay($id,$date){
	$mvc = Registry::getInstance();
	return $mvc->compute->getTotalHoursPerDay($id,$date);
}

