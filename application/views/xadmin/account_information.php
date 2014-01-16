<style type="text/css">

</style>
<div class="row">
<ul class="nav nav-list span2 account" style="margin-top: 30px;min-width: 165px;">
  <li class="nav-header">Settings</li>
  <li><a href="<?=base_url('xadmin/account/information')?>" class="<?=($smenu=="information")? 'active' : null?>"><i class="custom-icon-small-about"></i> Account Information</a></li>
  <li><a href="<?=base_url('xadmin/account/settings')?>" class="<?=($smenu=="settings")? 'active' : null?>"><i class="custom-icon-small-modules"></i> Account settings</a></li>
</ul>
<fieldset class="title-container span9">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-info" style="margin-top:-3px"></i>Your Account information</legend>
<p class="alert alert-info">This page shows an overview of your personal information</p>

<?=isset($message) ? $message : null;?>
<?=isset($success) ? $success : null;?>



	<form action="<?=base_url('xadmin/account/information')?>" method="POST" class="form-horizontal">
		
			
			
		
				<?php
					if(!isset($edit)){
				?>
				<div class="" id="email-container">
					 <div class="control-group" style="margin:0;">
						<label class="control-label" for="inputEmail"><strong>Full Name</strong> : </label>
						<div class="controls" style="margin-top:5px">
						 <strong><?=$info['firstname']." ".$info['lastname']?></strong>
						</div>
					  </div>
					  <div class="control-group" style="margin:0">
						<label class="control-label" for="inputPassword"><strong>Address</strong> : </label>
						<div class="controls" style="margin-top:5px">
								<?=$info['address']?>
						</div>
					  </div>
					  
					   <div class="control-group" style="margin:0">
						<label class="control-label" for="inputPassword"><strong>Telephone Number</strong> : </label>
						<div class="controls" style="margin-top:5px">
									<?=$info['contact_number']?>
						</div>
					  </div>
					   <div class="control-group" style="margin:0">
						<label class="control-label" for="inputPassword"><strong>Mobile Number</strong> : </label>
						<div class="controls" style="margin-top:5px">
									<?=$info['mobile_number']?>
						</div>
					  </div>
			
				<div class="action-btn-container" style="margin-top:20px">
					<a href="<?=base_url('xadmin/account/information/modify')?>" >Edit information</a>
				</div>
				</div>
				
				<?php
					}else{
					?>
				
						
						<legend style="font: bold 16px 'arial';">Change information</legend>
						<p>To change information just click save changes.</p>
						<div class="" id="email-container">
							<div class="control-group">
								<label class="control-label" for="companyname">Firstname :</label>
								<div class="controls">
								  <input type="text" id="firstname" name="firstname"  value="<?=$info['firstname']?>" class="span3">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="companyname">Lastname :</label>
								<div class="controls">
								  <input type="text" id="lastname" name="lastname"  value="<?=$info['lastname']?>" class="span3">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input type="text" id="address" name="address"  value="<?=$info['address']?>" class="span5">
								</div>
							  </div>
					         <div class="control-group">
								<label class="control-label" for="contactnumber">Contact Number</label>
								<div class="controls">
								  <input type="text" id="contact_number" name="contact_number" value="<?=$info['contact_number']?>" class="span3">
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="mobilenumber">Mobile Number</label>
								<div class="controls">
								  <input type="text" id="mobile_number" name="mobile_number" value="<?=$info['mobile_number']?>" class="span3">
								</div>
							  </div>
							<div class="action-btn-container">
								<input type="submit" class="btn btn-success btn-small" name="changeinfomation" value="Save Changes" /> or <a href="javascript:history.back()">Cancel</a> <!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>--->
							</div>
						</div>
						
					
					<?php
					}
				?>
				
				
				
		
		
	</form>
</fieldset>
</div>