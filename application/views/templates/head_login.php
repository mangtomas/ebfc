<!Doctype html>
<html lang="eng">
<head>
<link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/default.css" rel="stylesheet">

<style type="text/css">
      html,
      body {
        height: 100%;
		margin:0;
		padding:0;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto;
       /* background: #000 url(<?=base_url('public/assets/images/about-repeat.png')?>);*/
		
      }

      #login-container{
      		/*background: #000 url(<?=base_url('public/assets/images/about-repeat.png')?>);*/

      }
      #brand-container{width: 970px;margin: 0 auto;text-align: center;color: #fff;height: 200px}
      h1.brand-name{text-transform: uppercase;}
      p.alert{border-radius: 0px!important}
      .login-title{background: blue}
        .form-signin {
        max-width: 350px;
        padding: 19px 15px 15px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input {
    height: 30px;
    display: inline-block;
    width: 50%;
    border: 1px dashed #dadada;
    margin-bottom: 3px;
    }
  .form-signin input:focus{
    border:none
    }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    
    .login-brand h1{text-align:center;color: #18212b}
    .add-on {
      background-color: #EEEEEE;
      border: 1px dashed #dadada;
      display: inline-block;
      font-size: 14px;
      font-weight: normal;
      height: 30px;
      line-height: 30px;
      min-width: 16px;
      padding: 4px 5px;
      text-align: center;
      text-shadow: 0 1px 0 #FFFFFF;
      width: 30px;
      }
      
      
      #loginbox {    width: 340px;    margin-left: auto;    margin-right: auto;    position: relative;}
      #logo img {    width: 215px;    margin: 0 auto;    display: block;}
      #loginbox {overflow: hidden !important;    text-align: left; }
      #loginbox form{ width:100%; position:relative;  top:0;  left:0; }
      #loginbox .form-actions {padding: 14px 20px 15px;background: url(<?=base_url()?>public/assets/images/navBg.jpg);}
      #loginbox .form-actions .pull-left { margin-top:0px;}
      #loginbox form#loginform {  z-index: 200; display:block;}
      #loginbox form#recoverform {  z-index: 100;     display:none;}
      #loginbox form#recoverform .form-actions {    margin-top: 27px;}
      #loginbox .main_input_box { margin:0 auto; text-align:center}
      #loginbox .main_input_box .add-on{  background-color: #EEEEEE;    border: 1px solid #dadada;    display: inline-block;    font-size: 14px;    font-weight: normal;    height:30px;    line-height: 30px;    min-width: 16px;    padding: 4px 5px;     text-align: center;    text-shadow: 0 1px 0 #FFFFFF;    width:30px;}
      #loginbox .main_input_box input{ height:30px; display:inline-block; width:260px;  border: 1px solid #dadada; margin-bottom:3px;border-radius:0px!important}
      #loginbox .controls{padding-top:10px}
      #loginbox .control-group{margin-bottom:0px;}
      .form-vertical, .form-actions {    margin-bottom: 0;}
      #loginbox .normal_text{ padding:15px 10px; text-align:center; font-size:14px; line-height:20px; }

      /*#login-btn{border:none;margin-top: 25px;margin-right: 10px;height: 66px;width: 78px;background: url(<?=base_url()?>public/assets/images/login.png)no-repeat 18px 8px;}
      #login-btn:hover{background: url(<?=base_url()?>public/assets/images/login-hover.png)no-repeat -10px -15px;}*/
      .btn-container{padding-left: 57px;margin-right: 15px}
      .fields{}
      .forgot-password{width: 395px;margin: 0 auto;margin-top: 5px;}
      #copy-right{width: 340px;margin: 0 auto;color: #fff;margin-top: 20px}
      #error-container{width: 340px;margin: 0 auto}
 
      #error-container h4{line-height: 0;color: #029810}
      .login-key{color:#5c5c5c;width: 100px;text-align: right;font-weight: bold;margin-right: 10px}
      #rememberme{margin: 0!important;}
      p.remember{color: #b1b1b1}
      .clear{clear: both}
	  
	  .container{
		width:970px;
		margin:0 auto;
		height:100%;
	  }
	  
	  #login-new-container{
		margin-top:100px;
	  }
	  
	  /*!
    bgStretcher 3.0.1 jQuery Plugin
    (c) 2010-2013 www.w3Blender.com
    For any questions and support please visit www.w3blender.com.
*/
.bgstretcher-area {
  text-align: left;
}
.bgstretcher {
  background: black;
  overflow: hidden;
  width: 100%;
  position: fixed;
  z-index: 1;
}
.bgstretcher,
.bgstretcher ul,
.bgstretcher li {
  left: 0;
  top: 0;
}
.bgstretcher ul,
.bgstretcher li {
  position: absolute;
}
.bgstretcher ul,
.bgstretcher li {
  margin: 0;
  padding: 0;
  list-style: none;
}
/*  Compatibility with old browsers  */
.bgstretcher {
  _position: absolute;
}

#login-new-container{
	background:#fff;
	box-shadow:0px 0px 30px #565656
}
    </style>

<script src="<?=base_url();?>assets/js/jquery.js"></script>
 <script src="<?=base_url();?>assets/js/jquery-bgstretcher-3.0.1.min.js"></script>
<script type="text/javascript">
       $(document).ready(function(){
            $("body").bgStretcher({
                images: ["<?=base_url('assets/img/office.png')?>"],
                imageWidth: 1366,
                imageHeight: 768,
                slideDirection: 'N',
                slideShowSpeed: 3000,
                transitionEffect: 'fade',
                sequenceMode: 'normal',
                buttonPrev: '#prev',
                buttonNext: '#next',
                pagination: '#nav',
                anchoring: 'left center',
                anchoringImg: 'left center'
            })
			
        });
    </script>
</head>
<body>
<div id="wrapper">
  
         
