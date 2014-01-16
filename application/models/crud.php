<?php
if(!defined('APPS')) exit ('No direct access allowed');

class crud extends crackerjack_model{
	public function __construct(){
		parent::__construct();
	}

	/**
	 * 
	 * @Function : read;
	 * @Param  $ : $tbl String, $vals array;
	 * @Return lastinsertid ;
	 */
	public function create($tbl,$vals = array()){
		$query = $this->db->prepare('INSERT INTO '.$tbl.' ('.implode(', ',array_keys($vals)).') VALUES (:'.implode(', :',array_keys($vals)).')');
		$query->execute($vals);
		return $this->db->lastInsertId();
	}

	/**
	 * 
	 * @Function : read;
	 * @Param  $ : $query String, $vals array, $type datatype;
	 * @Return mixed ;
	 */

	public function read($query,$vals = array(),$type = 'all'){
		switch ($type) {
                case 'all': $result = $this->db->fetchAll($query,$vals);
                    break;
                case 'num': $result = $this->db->fetchNum($query,$vals);
                    break;
                case 'obj': $result = $this->db->fetchObj($query,$vals);
                    break;
                default: 	$result = $this->db->fetchAssoc($query,$vals);
                    break;
            }
         return $result;
	}

	/**
	 * 
	 * @Function : update;
	 * @Param  $ : $table String, $flds array, $oper String, $logc String;
	 * @Return bool ;
	 */

	public function update($table, $flds,$con,$oper = '=',$logc = 'AND'){
		$condition = $this->get_condition($con,$oper,$logc);
		$sql = 'UPDATE '.$table.' SET '.implode('=?, ',array_keys($flds)).'=? WHERE '.$condition.'';
		//print_r(array_values($flds));
		//exit();
		$query = $this->db->prepare($sql);
		return $query->execute(array_merge(array_values($flds)));
		 
	}

	/**
	 * 
	 * @Function : delete;
	 * @Param  $ : $tbl String, $oper String, $logc String;
	 * @Return bool ;
	 */
	public function delete($tbl,$con,$oper = '=',$logc = 'AND'){
		$condition = $this->get_condition($con,$oper,$logc);
		$sql = 'DELETE FROM '.$tbl.' WHERE '.$condition.'';
		//exit();
		$query = $this->db->query($sql);
		return $query->execute();
	}

	/**
	 * 
	 * @Function : get_condition;
	 * @Param  $ : $condition Array, $oper String, $logc String;
	 * @Return String ;
	 */
	private function get_condition($condition, $oper = '=', $logc = 'AND')
	{
		$cdts = '';
		if (empty($condition))
		{
			return $cdts = '';
		}
		else if (is_array($condition))
		{
			$_cdta = array();
			foreach($condition as $k => $v)
			{
				if (!is_array($v))
				{
					if (strtolower($oper) == 'like')
					{
						$v = '\'%' . $v . '%\'';
					}
					else if (is_string($v))
					{
						$v = '\'' . $v . '\'';
					}
					$_cdta[] = ' ' . $k . ' ' . $oper . ' ' . $v . ' ' ;
				}
				else if (is_array($v))
				{
					$_cdta[] = $this->split_condition($k, $v);
				}
			}
			$cdts .= implode($logc, $_cdta);
		}
		return $cdts;
	}

	/**
	 * 
	 * @Function : split_condition;
	 * @Param  $ : $field String, $cdt Array;
	 * @Return String ;
	 */
	private function split_condition($field, $cdt)
	{
		$cdts = array();
		$oper = empty($cdt[1]) ? '=' : $cdt[1];
		$logc = empty($cdt[2]) ? 'AND' : $cdt[2];
		if (!is_array($cdt[0]))
		{
			$cdt[0] = is_string($cdt[0]) ? "'$cdt[0]'" : $cdt[0];
		}
		else if (is_array($cdt[0]) || strtoupper(trim($cdt[1])) == 'IN')
		{
			$cdt[0] = '(' . implode(',', $cdt[0]) . ')';
		}

		$cdta[] = " $field $oper {$cdt[0]} ";
		if (!empty($cdt[3]))
		{
			$cdta[] = $this->get_condition($cdt[3]);
		}
		$cdts = ' ( ' . implode($logc, $cdta) . ' ) ';
		return $cdts;
	}
}