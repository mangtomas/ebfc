<?php
if(!defined('APPS')) exit ('No direct access allowed');
class mysql extends dbAccess{
	
	private $dbconfig = array();
	public function __construct($conf = array()){
		$this->dbconfig = $conf;
	}

    protected function dbConnection(){
    		//print_r($this->dbconfig);
    /*	echo "<pre>";
    	print_r($this->dbconfig);
    	echo "</pre>";
        */
        //echo $this->dbconfig['database_name'];


    	$con =  mysql_connect( $this->dbconfig['host'], $this->dbconfig['username'], $this->dbconfig['password'])or die(mysql_error());
        mysql_select_db($this->dbconfig['database_name'],$con);
     	//$db_connection = mysql_connect($this->dbconfig['']);//( $this->obj_datasource[1], $this->obj_datasource[2], $this->obj_datasource[3], $this->obj_datasource[4], $this->obj_datasource[5] );
     //  return ( is_object( $db_connection ) ) ? $this->obj_connection = $db_connection : false; 

    }


    /**
     * Closes connection to database server
     *
     * @access protected
     * @return bool
     */
    protected function dbClose()
    {
       
    }

    protected function query($str){
        return $str;
    }

}