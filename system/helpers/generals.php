<?php

/*
	@return string
	@params	string
*/
function base_url($curl=false){
		global $config;
		return $config['base_url'].$curl;

}

function html5($title = false){
	echo "<!DOCTYPE html>\n<html lang=\"en\">\n<head><meta charset=\"utf-8\" />\n<title>".(($title) ? $title : null)."</title>\n";
}

function redirect($url,$ref = false){
	return header('location:'.base_url($url));
}

function icon($where = false){
$icon = "<link type='icon/image' rel='icon' href='".base_url($where)."' />";
echo $icon;
}

function body_open($params = false){
$params = ($params) ? " ".$params : null;
$body = "</head><body".$params.">";
return $body;
}

function css($where,$var = array()){
	foreach ($var as $value) {
		echo "\n<link type='text/css' href='".base_url($where.$value.'.css')."' rel='stylesheet' media='all'/>";
	}

}

function javascript($where,$var = array()){
	foreach ($var as $value) {
		echo "\n<script type='text/javascript' src='".base_url($where.$value.'.js')."'/></script>";
	}
}

function c_url(){
	global $config;
		$curl = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		$base_url = $config['base_url'];// 'http://localhost/mvc/';
		$url = str_replace($base_url,'',$curl);
		$x = explode('/',$url);	
		if($x[1] == ""){
			$method = "index";
		}else{
			$method = $x[1];
		}	
		return $method;
}

function img($dir,$class,$id,$style){
	return "<img src='".base_url().$dir."' class='".$class."' id='".$id."' style='".$style."' />";
}

function readmore($text,$limit,$string = false){
	return substr($text,0,$limit).$string;
}

function r_string($string){
	return strip_tags(trimslashes(trim($string)));
}

function trimslashes($string){
	return stripslashes($string);
}

function r_md5($string){
	return md5(r_string($string));
}

function r_sha($string){
	return sha1(r_string($string));
}
function _controller(){
	$route = new request;
	return $route->getController();
}
function _method(){
	$route = new request;
	return $route->getMethod();
}

function genKey($id){
	$mvc = Registry::getInstance();
	$vars = $mvc->hash->varkeydump();
	$mvc->hash->hash_encryption($vars);
	$id = $mvc->hash->encrypt($id);
	return $vars."/".str_replace('/', '-', $id);
}

/* function &getInstance(){
	return Registry::getInstance();
}
 */
function print_pre($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function action_button($menu){
$c = '';
$x = explode('/',$menu['url']);
$method = str_replace('-','_', $x[1]);
if(_controller()== $x[0] || _method()==$method){
	if($menu['_create']==1){
		$c .='<a class="btn btn-primary" href="'.base_url('admin/'.$menu['url'].'/add').'"><i class="icon-plus-sign icon-white"></i> Create new</a> ';
		 						
	}
	
	if($menu['_delete']==1){
		 						 $c .='
		 						 <div id="delete" style="width:400px;left:60%;top:35%" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
									  <div class="modal-header">
									    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
									    <h3 id="deleteLabel">Delete <span></span></h3>
									  </div>
									  <div class="modal-body">
									    <p id="result">Are you sure do you want to delete?</p>
									  </div>
									  <div class="modal-footer">
									    <button class="btn btn-small" data-dismiss="modal" aria-hidden="true" id="cancel">Cancel</button>
									    <button class="btn btn-small btn-primary" id="yesDelete">Yes, Delete</button>
									  </div>
									</div>
		 						 ';
		 						// $c .='<a class="btn btn-warning" id="delete-role"><i class="icon-minus-sign icon-white"></i> Delete</a> ';
		 						
	}
	
	if($menu['_update']==1){
		 							
		// $c .='<div class="btn-group">';
		// $c .='<a class="btn" href="#activate"><i class="icon-ok"></i> Activated</a>';
		// $c .='<a class="btn" href="#deactivate"><i class="icon-remove"></i> Deactivate</a>';
		// $c .='</div>';
							
	}

	if ($menu['_print']==1) {
		# code...
		
		$c .='<div class="btn-group">';
		$c .='<a class="btn" href="#export-to-excel" onClick="export_data(\'excel\')"><i class="icon-download"></i> Export to Excel</a>';
		$c .='<a class="btn" href="#export-to-pdf" onClick="export_data(\'pdf\')"><i class="icon-download"></i> Export to PDF</a>';
		$c .='<a class="btn" href="#print" id="print" onClick="print_data()"><i class="icon-print"></i> Print</a>';
		$c .='</div>';
		
	}
}
return $c;
//$c .='<a class="btn btn-small btn-info" href="'.base_url('xadmin/role/create').'"><i class="icon-chevron-left"></i> Back</a> ';
/* 
		 			$x = explode('/',$menu['url']);
		 			$method = str_replace('-','_', $x[1]);
		 			if(_controller()== $x[0] || _method()==$method){
		 					if($menu['_create==1){
		 						
		 						 $c .='<a class="btn btn-small" href="'.base_url('xadmin/'.$menu['url.'/add').'"><i class="icon-plus-sign"></i> Create new</a> ';
		 						
		 					}
		 					
		 					if($menu['_delete==1){
		 						 $c .='
		 						 <div id="delete" style="width:400px;left:60%;top:35%" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
									  <div class="modal-header">
									    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
									    <h3 id="deleteLabel">Delete <span></span></h3>
									  </div>
									  <div class="modal-body">
									    <p id="result">Are you sure do you want to delete?</p>
									  </div>
									  <div class="modal-footer">
									    <button class="btn btn-small" data-dismiss="modal" aria-hidden="true" id="cancel">Cancel</button>
									    <button class="btn btn-small btn-primary" id="yesDelete">Yes, Delete</button>
									  </div>
									</div>
		 						 ';
		 						 $c .='<a class="btn btn-small" id="delete-role"><i class="icon-minus-sign"></i> Delete</a> ';
		 						
		 					}
		 					if($menu['_update==1){
		 							
		 						$c .='<div class="btn-group">';
							  	$c .='<a class="btn btn-small" href="#activate"><i class="icon-ok"></i> Activated</a>';
							 	$c .='<a class="btn btn-small" href="#deactivate"><i class="icon-remove"></i> Deactivate</a>';
								$c .='</div>';
							
		 					}

		 					if ($menu['_print==1) {
		 						# code...
		 						
		 						$c .='<div class="btn-group">';
								$c .='<a class="btn btn-small" href="#export-to-excel" onClick="export_data(\'excel\')"><i class="icon-download"></i> Export to Excel</a>';
								$c .='<a class="btn btn-small" href="#export-to-pdf" onClick="export_data(\'pdf\')"><i class="icon-download"></i> Export to PDF</a>';
								$c .='<a class="btn btn-small" href="#print" id="print" onClick="print_data()"><i class="icon-print"></i> Print</a>';
								$c .='</div>';
		 						
		 					}



		 			}
		 	 */
	//return $c;
}


function htmlSelect($arr,$name,$id,$val,$ref = false){
$select = '';
$select.= '<select name="'.$name.'" id="'.$name.'">';
$select.= '<option value="">-Select-</option>';
	if(count($arr) > 0){
		foreach ($arr as $key => $value) {
			# code...
				if($ref){
					$selected = ($value->$id==$ref) ? 'selected' : null;
					$select.= '<option value="'.$value->$id.'" '.$selected.'>'.$value->$val.'</option>';
				}else{
					$select.= '<option value="'.$value->$id.'">'.$value->$val.'</option>';
				}
												
				}
		}

	$select.= '</select>';	
return $select;
}