<?php
/**
 *  Session
 */

if(!defined('APPS')) exit ('No direct access allowed');

 if(session_start() == false){
          session_start();
         }

class session{
    public function __contruct(){
    	
    }

    public function _set($var){
	global $config;
	
        if (is_array($var)) {
        # code...
            foreach ($var as $key => $value) {
            # code...
               $_SESSION[$config['base_url']]["$key"] = "$value";
			   
            }
			
        }
    }

    public function _get($key) {
	global $config;
             if (!isset($_SESSION[$config['base_url']]["$key"])) {
                $_SESSION[$config['base_url']]["$key"] = "";
            } 

        return $_SESSION[$config['base_url']]["$key"];
    }

    public function _destroy(){
            session_destroy();
            session_unset();
        
    }

}