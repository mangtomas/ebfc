<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Eastern Blends Food Corporation - Attendance Monitoring with Payroll System Using Biometric Device</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <!-- Le styles -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/default.css" rel="stylesheet">
    <style type="text/css">
    /*   body {
        padding-top: 41px;
        padding-bottom: 40px;
      } */
	  .brand-qoute{
	    color: #fff;
		display: block;
		font-size: 11px;
		font-weight: bold;
		line-height: 20px;
		text-transform: uppercase;
	  }
	  .after-nav{
		background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2);
		border-bottom: 1px solid #DDDDDD;
		height: 100px;
	  }
	  
	  #user-info{
	  margin-left: 10px;
	  padding-top: 15px;
	  }
	  #user-info h3{
	  line-height:10px
	  }
	        /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 90px;
      }
	  #push{
		height:30px;
	  }
      #footer {
        background-color: #f5f5f5;
		border-top:1px solid #ddd;
      }
	  
	  .error{color:red}
	  .validation-status{float:left;margin-left:10px;margin-top:5px;}
    </style>
    <link href="<?=base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?=base_url()?>assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?=base_url()?>myaccount" style="padding: 2px 20px;">Eastern Blends Food Corporation <small class="brand-qoute" style="line-height:15px">Attendance Monitoring with Payroll System Using Biometric Device</small></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
 
              <li class="dropdown active dropdown-info">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Action <b class="caret"></b></a>
                <ul class="dropdown-menu ">
                  <li><a href="<?=base_url('myaccount')?>"><i class="icon-home"></i> Dashboard</a></li>
				   <li class="divider"></li>
				  	<?php
					if(count($data['nagivation']) != 0){
						foreach($data['nagivation'] as $k => $v){
							?>
							<li><a href="<?=base_url()?>myaccount/<?=$v['url']?>"><i class="icon-list"></i> <?=$v['module']?></a></li>
							<?php
						}
					}		  
					 ?>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                </ul>
              </li>
            </ul>
           
          </div><!--/.nav-collapse -->
		  <?php
			if(!isset($inner_header)){
			?>
		  <div class="nav-collapse collapse pull-right">
            <ul class="nav">
 
              <li class="dropdown active dropdown-info">
						
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://localhost/ebfc/image/?src=<?=base_url()."uploads/".$info['avatar']?>&h=100&w=100" class="img-polaroid pull-left" style="  margin-right: 7px;
    margin-top: -5px;
    width: 20px;"><?=ucwords($info['firstname'])." ".ucwords($info['lastname'])?> <b class="caret"></b></a>
                <ul class="dropdown-menu ">
					
				    <li class="divider"></li>
                  <li><a href="<?=base_url('myaccount/information/modify')?>"><i class="icon-info-sign"></i> Account Information</a></li>
                  <li><a href="<?=base_url('myaccount/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
				    <li class="divider"></li>
                    <li><a href="<?=base_url('main/logout')?>"><i class="icon-home"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
           
          </div><!--/.nav-collapse -->
		  <?
				}
			?>
        </div>
      </div>
    </div>
	
	<?php
		if(!isset($inner_header)){
	?>
	<div class="after-nav" style="height:60px;margin-top: 40px;">
        <div class="container" style="width:1170px;margin:0 auto">
			<h3 style="font-weight:normal"><?=$title?></h3>
        </div>
    </div>
	<?
		}
	?>
	 <div id="wrap">
