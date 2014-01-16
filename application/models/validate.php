<?php
class validate extends crackerjack_model{
	public function __construct(){
	parent::__construct();
	}
	
	/* user function validate the user login
	*
	* @param uname, pass
	* @return mixeds
	*
	*/
	public function user($uname,$pass){
			if ($uname!=null && $pass!=null) {
					# code...
					$mvc =& getInstance();
		
						$info = $mvc->crud->read('SELECT * FROM _users WHERE email_address = :user',array(':user'=>$uname),'obj');
								$mvc->hash->hash_encryption($info[0]->varKey);
						$password = $mvc->hash->decrypt($info[0]->password);
						
						if($info>0){
								$x['uid'] = $info[0]->user_id;
								$x['email_address'] = $info[0]->email_address;
								$x['lastname'] = $info[0]->lastname;
								$x['firstname'] = $info[0]->firstname;
								$x['role'] = $info[0]->role_id;
								$result =  ($password==$pass)? $x :  false;
							}else{
								$result = false;
							}
				}
			return ($result==false) ? false : $result;
	}
	/*
	* email function validate email if is exist or not.
	* @param email
	* @return bool
	*/

	public function email($email){
		$mvc =& getInstance();
		$email = $mvc->crud->read('SELECT email_address FROM _users WHERE email_address = :user',array(':user'=>$email),'obj');
		$email = $email[0];
		return $email->email_address;

	}
	
	
		
}

