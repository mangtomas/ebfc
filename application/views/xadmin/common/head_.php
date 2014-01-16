<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AICS | Smartlink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?=base_url()?>public/assets/js/jquery.js"></script>
	<link href="<?=base_url('public');?>/assets/css/loader.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('fonts/font.css')?>">
		<style type="text/css">
			  html,
			  body {
				height: 100%;
				margin:0;
				padding:0;
				/* The html and body elements cannot have any padding or margin. */
			  }

			  /* Wrapper for page content to push down footer */
			  .wrapper {
			   /*  min-height: 100%;
				height: auto !important; 
				*/
				height: 100%;
				/* Negative indent footer by it's height */
				margin: 0 auto;
			   /*  background:url(<?=base_url()?>public/assets/images/left-repeat.png)repeat-y 207px 0px; */
			   /*  background:url(<?=base_url()?>public/assets/images/left-repeat.png)repeat-y 207px 0px; */
			   
			  }
			  .container{
				height:100%;
				
			  }
		/* 	  .row{
				background: url(<?=base_url()?>public/assets/images/leftpanel-repeat.gif)repeat-y;
			  } */
			  
			  .nav.account li a{color: #272727!important;}
			  .nav.account li a.active{font-weight:bold;color: #333333!important;border-left: 3px solid #dd4b39;padding-left: 12px;}
			  .nav.account li a:hover{border-left: 3px solid #dd4b39;padding-left: 12px;}
		</style>
</head>
<body>

<div class="wrapper">

   <div class="navbar navbar-inverse navbar-fixed-top" style="z-index: 1040!important;">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?=base_url('xadmin')?>"><img src="<?=base_url('public/assets/images/brand-logo.png')?>" alt="AICS Smartlink" style="width: 130px;" /></a>       
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="#administration" >Administration Panel</a>
            </ul>
            <ul class="nav pull-right" role="navigation" id="user-login">
                    <li class="dropdown">
                      <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Logged in as <strong><?=$info['email_address']?></strong> <i class="icon-cog icon-white"></i></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
                        <li><a href="<?=base_url('xadmin/account/information')?>"><i class="icon-info-sign"></i> My Account Information</a></li>
                        <li><a href="<?=base_url('xadmin/account/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('main/logout')?>"><i class="icon-off"></i> Logout</a></li>
                      </ul>
                    </li>
         
                  </ul>
          </div>
        </div>
      </div>
    </div>
	
		<?php
			if($header_menu == true){
				?>
					<div class="navbar  navbar-fixed-top" style="margin-top: 45px;">
					  <div class="navbar-inner">
						<div class="container">
					 
						  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
						  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </a>
					 
						  <!-- Be sure to leave the brand out there if you want it shown -->
						    <ul class="nav  <?=($active_module=="students") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Students <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/students')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/students/add')?>"><i class="icon-plus"></i> Add new</a></li>
						   			<li class="divider"></li>
								
								  </ul>
								</li>
					 
							  </ul>
							  
							   <ul class="nav <?=($active_module=="tests") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Tests <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/tests')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/tests/add')?>"><i class="icon-plus"></i> Add new</a></li>
						   			<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>
							  
							   <ul class="nav <?=($active_module=="assignments") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Assignments <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/assignments')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/assignments/add')?>"><i class="icon-plus"></i> Add new</a></li>
						   			<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>
								
								 <ul class="nav <?=($active_module=="announcements") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Announcements <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/announcements')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/announcements/add')?>"><i class="icon-plus"></i> Add new</a></li>
						   			<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>
							  <ul class="nav <?=($active_module=="subjects") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="<?=base_url('xadmin/subjects')?>" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Subjects <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/subjects')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/subjects/add')?>"><i class="icon-plus"></i> Add New</a></li>
								  	<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>

							   <ul class="nav <?=($active_module=="sections") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Sections <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/sections')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/sections/add')?>"><i class="icon-plus"></i> Add New</a></li>
								 	<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>
							  
							   <ul class="nav <?=($active_module=="courses") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle active" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Courses <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/courses')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/courses/add')?>"><i class="icon-plus"></i> Add New</a></li>
									<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>
							  
							  <ul class="nav <?=($active_module=="module") ? "active" : null?>" role="navigation">
								<li class="dropdown">
								  <a id="user-dropdown" href="#" role="button" class="dropdown-toggle active" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Module <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin-left: 0px;margin-top: 6px;">
									<li><a href="<?=base_url('xadmin/module')?>"><i class="icon-search"></i> View All</a></li>
									<li><a href="<?=base_url('xadmin/module/add')?>"><i class="icon-plus"></i> Add New</a></li>
									<li class="divider"></li>
								  </ul>
								</li>
					 
							  </ul>
						  <!-- Everything you want hidden at 940px or less, place within here -->
						  <div class="nav-collapse collapse">
							<!-- .nav, .navbar-search, .navbar-form, etc -->
						  </div>
					 
						</div>
					  </div>
					</div>
			<?php
			}
		
		?>

	<div class="container" style="padding-top:<?=($header_menu==true) ? '90px;' : '45px;'?>">
  

          
   