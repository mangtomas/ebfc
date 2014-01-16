<?php

function user_info(){
	$mvc = Registry::getInstance();
	$info = $mvc->crud->read('SELECT email_address,firstname,lastname,contact_number,mobile_number FROM _users WHERE user_id=:id',array('id'=>$mvc->session->_get('uid')));
	return $info;
}


