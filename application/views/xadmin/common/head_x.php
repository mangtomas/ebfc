<!Doctype html>
<html lang="eng">
<head>
<link href="<?=base_url('public');?>/css/normalize.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/default.css" rel="stylesheet">
<script src="<?=base_url('public');?>/js/jquery.js"></script>
<style type="text/css">

/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
@media only screen and (min-width: 768px) {
	#leftSide{border:1px solid red}
}
/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */

@media only screen and (max-width: 599px){
	#dateandtime{text-align:center;}
	#login-as{display:none}
}

@media only screen and (max-width: 400px){
	#dateandtime{text-align:center;line-height:15px;}
	#login-as{display:none}
}

/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
@media only screen and (min-width: 600px) and (max-width: 1024px) {
	
}

/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
@media only screen and (min-width: 600px) and (max-width: 767px) {
	#login-as{display:none}
	#dateandtime{text-align:center!important}
}
	
/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
@media only screen and (max-width: 767px) {

}
</style>
<script type="text/javascript">
var currenttime = '<?=date("F d, Y H:i:s", time())?>';
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)
 
function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}
 
function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}
</script>
</head>
<body>
 <div class="navbar nav-custom-top navbar-inverse navbar-fixed-top" >
      <div class="navbar-inner" >
        <div class="container-fluid" style="padding:0">
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-left" id="dateandtime">
              <strong>IP Address: <?=$_SERVER['REMOTE_ADDR']?></strong><strong style="margin-left:10px">Date and Time : <span id="servertime"></span></strong>
			  </p>
           
				<ul class="nav pull-right" id="login-as" role="navigation">
                    <li class="dropdown">
                      <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Logged in as <strong><?=$info['email_address']?></strong> <i class="icon-cog icon-white"></i></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin:-7px 0 0 !important">
                        <li><a href="<?=base_url('xadmin/account/information')?>"><i class="icon-info-sign"></i> My Account Information</a></li>
                        <li><a href="<?=base_url('xadmin/account/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('main/logout')?>"><i class="icon-off"></i> Logout</a></li>
                      </ul>
                    </li>
         
                </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

