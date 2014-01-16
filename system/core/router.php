<?php
/**
 * Routing of url
 */

if(!defined('APPS')) exit ('No direct access allowed');

class Router{

		private function __construct(){

		}

		public function route(Request $request){
		/* echo "router <pre>";
			print_r($request);
			echo "</pre>"; */
			//get the Controller
			 $controller = $request->getController();
			//get the method
			$method = $request->getMethod();
			//get the parameters
			$params = $request->getArgs();

			$dir = ($request->isDirExists()==true) ?  $request->isDirExists().DS : null;
			$file = ROOT.APPS.'controllers'.DS.$dir.$controller.EXT;
			if(file_exists($file)){
			require_once $file;
			$run = new $controller();
			    if(method_exists($run, $method)){
					if(!empty($params)){
						$run->{$method}($params);
					}else{
						$run->{$method}();
					}
				}else{
				if($config['custom_error']==true){
					$errorfile = ROOT.APPS.'controllers'.DS.'error'.EXT;
						if(file_exists($errorfile)){
						require_once $errorfile;
						 $error = new error;
						 $error::index();
						 }else{
							$errorfile = 'Method : '.$dir.$controller."::".$method."()";
							require('error.php');
						 }
					}else{
						$errorfile = 'Method : '.$dir.$controller."::".$method."()";
							require('error.php');
					}
				}
			}else{
				if($config['custom_error']==true){
				$errorfile = ROOT.APPS.'controllers'.DS.'error'.EXT;
				if(file_exists($errorfile)){
				require_once $errorfile;
				 $error = new error;
				 $error::index();
				 }else{
					$errorfile =($controller =='http:' || $controller=='https') ? 'Base url not set' : 'Custom error is not exists : error'.EXT;
					require('error.php');
				 }
				}else{
				$errorfile =($controller =='http:' || $controller=='https') ? 'Base url not set' : 'File : '.$dir.$controller.EXT;
				require('error.php');
				}
			}

		}

	
}