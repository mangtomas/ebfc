<!Doctype html>
<html lang="eng">
<head>
<link href="<?=base_url('public');?>/admin/css/loader.css" rel="stylesheet">

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
        background: #000 url(<?=base_url('public/admin/images/about-repeat.png')?>);
       
      }

      #login-container{
      		background: #000 url(<?=base_url('public/admin/images/about-repeat.png')?>);

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
      #loginbox {padding: 1px;border-radius: 12px;background: url(<?=base_url()?>public/admin/images/login-box.png);  border:3px solid transparent; overflow: hidden !important;    text-align: left;    position: relative;    -moz-border-image:url(../img/css-border-bg.jpg) 3 3 round; /* Old Firefox */  -webkit-border-image:url(../img/css-border-bg.jpg) 3 3 round; /* Safari */  -o-border-image:url(../img/css-border-bg.jpg) 3 3 round; /* Opera */  border-image:url(../img/css-border-bg.jpg) 3 3 round;border:1px solid #313a43}
      #loginbox form{ width:100%; position:relative;  top:0;  left:0; }
      #loginbox .form-actions {padding: 14px 20px 15px;background: url(<?=base_url()?>public/admin/images/navBg.jpg);}
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

      /*#login-btn{border:none;margin-top: 25px;margin-right: 10px;height: 66px;width: 78px;background: url(<?=base_url()?>public/admin/images/login.png)no-repeat 18px 8px;}
      #login-btn:hover{background: url(<?=base_url()?>public/admin/images/login-hover.png)no-repeat -10px -15px;}*/
      .btn-container{padding-left: 57px;margin-right: 15px}
      .fields{}
      .forgot-password{width: 395px;margin: 0 auto;margin-top: 5px;}
      #copy-right{width: 340px;margin: 0 auto;color: #5c5c5c;margin-top: 20px}
      #error-container{width: 340px;margin: 0 auto}
      #error-container h4{line-height: 0;color: #029810}
      .login-key{color:#5c5c5c;width: 100px;text-align: right;font-weight: bold;margin-right: 10px}
      #rememberme{margin: 0!important;}
      p.remember{color: #b1b1b1}
      .clear{clear: both}
    </style>

<script src="<?=base_url('public');?>/admin/js/jquery.js"></script>
 <script src="<?=base_url('public');?>/admin/js/jquery.nanoscroller.js"></script>

</script>
</head>
<body>
<div id="wrapper">

      <div id="login-container">
          <div id="brand-container">
            
              <img src="<?=base_url('public/admin/images/brand-logo.png')?>" style="margin-top: 40px;"/>
            
          </div>
