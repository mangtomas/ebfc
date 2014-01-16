<fieldset class="title-container" style="height: 470px;">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-monitor" style="margin-top:-3px"></i>Administration Panel</legend>
<h4 style="font-size: 24px;">Welcome to AICS Smartlink assetsistrational panel, <?=$info['firstname']?></h4>
<h6>What would you like to do today?</h6>
<div class="alert alert-info">

<strong>Information : </strong>Click an Administration area below to perform tasks related to it.
</div>




<fieldset class="dashboard-nav-container">
<legend style="font: bold 14px 'arial';"><i class="custom-icon-small-account" style="margin-top:-3px"></i>Dashboard</legend>
	<div class="dashboard-nav">
			<div class="small-box">
				<a href="<?=base_url('xadmin/students')?>">
				<div class="small-image">
					<img src="<?=base_url('public/assets/images/icons/student.png')?>" />
				</div>
			
				</a>
				<a href="<?=base_url('xadmin/students')?>" class="tooltip-test" title="Manage Students"><strong>Manage Students</strong></a><br />
				<a href="<?=base_url('xadmin/students')?>" class="dashboard-action">View</a> | <a href="<?=base_url('xadmin/students/add')?>" class="dashboard-action">Add</a> 
			</div>
			<div class="small-box">
				<a href="<?=base_url('xadmin/tests')?>">
				<div class="small-image">
					<img src="<?=base_url('public/assets/images/icons/tests.png')?>" />
				</div>
				</a>
				<a href="<?=base_url('xadmin/tests')?>" class="tooltip-test" title="Manage Tests"><strong>Manage Tests</strong></a><br />
				<a href="<?=base_url('xadmin/tests')?>" class="dashboard-action">View</a> | <a href="<?=base_url('xadmin/tests/add')?>" class="dashboard-action">Add</a> 
			</div>
			<div class="small-box">
				<a href="<?=base_url('xadmin/assignments')?>">
				<div class="small-image">
					<img src="<?=base_url('public/assets/images/icons/assignment.png')?>" />
				</div>
				</a>
				<a href="<?=base_url('xadmin/assignments')?>" class="tooltip-test" title="Manage Assignment"><strong>Manage Assign..</strong></a><br />
				<a href="<?=base_url('xadmin/assignments')?>" class="dashboard-action">View</a> | <a href="<?=base_url('xadmin/assignments/add')?>" class="dashboard-action">Add</a> 
			</div>
			<div class="small-box">
				<a href="<?=base_url('xadmin/announcements')?>">
				<div class="small-image">
					<img src="<?=base_url('public/assets/images/icons/announcement.png')?>" />
				</div>
				</a>
					<a href="<?=base_url('xadmin/announcements')?>" class="tooltip-test" title="Manage Announcement"><strong>Manage Annou..</strong></a><br />
					<a href="<?=base_url('xadmin/announcements')?>" class="dashboard-action">View</a> | <a href="<?=base_url('xadmin/announcements/add')?>" class="dashboard-action">Add</a> 
			</div>
			<div class="small-box">
				<a href="<?=base_url('xadmin/sections')?>">
				<div class="small-image">
					<img src="<?=base_url('public/assets/images/icons/section.png')?>" />
				</div>
				</a>
				<strong></strong>
				<a href="<?=base_url('xadmin/sections')?>" class="tooltip-test" title="Manage Section"><strong>Manage Section</strong></a><br />
				<a href="<?=base_url('xadmin/sections')?>" class="dashboard-action">View</a> | <a href="<?=base_url('xadmin/sections/add')?>" class="dashboard-action">Add</a> 
			</div>
			<div class="small-box">
				<a href="<?=base_url('xadmin/courses')?>">
				<div class="small-image">
					<img src="<?=base_url('public/assets/images/icons/course.png')?>" />
				</div>
				</a>
				<a href="<?=base_url('xadmin/courses')?>"  class="tooltip-test" title="Manage Course"><strong>Manage Course</strong></a> <br />
				<a href="<?=base_url('xadmin/courses')?>" class="dashboard-action">View</a> | <a href="<?=base_url('xadmin/courses/add')?>" class="dashboard-action">Add</a> 
			
			</div>
			 

				</div>
</fieldset>
</fieldset>
