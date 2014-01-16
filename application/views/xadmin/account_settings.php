<style type="text/css">

</style>
<div class="row" style="">
<ul class="nav nav-list span2 account" style="margin-top: 30px;min-width: 165px;">
  <li class="nav-header">Settings</li>
  <li><a href="<?=base_url('xadmin/account/information')?>" class="<?=($smenu=="information")? 'active' : null?>"><i class="custom-icon-small-about"></i> Account Information</a></li>
  <li><a href="<?=base_url('xadmin/account/settings')?>" class="<?=($smenu=="settings")? 'active' : null?>"><i class="custom-icon-small-modules"></i> Account settings</a></li>
</ul>
<fieldset class="title-container span9">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-cog" style="margin-top:-3px"></i>Your account settings</legend>
<p class="alert alert-info">This page shows an overview of your accounts on devstation content management system </p>

<?=isset($message) ? $message : null;?>
<?=isset($success) ? $success : null;?>



	<form action="<?=base_url('xadmin/account/settings')?>" method="POST" class="form-horizontal">
		<fieldset>
			<legend style="font: bold 16px 'arial';">Email Address</legend>
			<p>Change your email address</p>
			<h5><i class="custom-icon-small-email" style="margin-top: -3px;margin-right: 5px;"></i><?=$info['email_address']?><!--<a href="#change-email" class="to-show" data-show="email-container" id="change-email" style="font: normal 12px 'Arial';text-decoration: underline;">Change Email</a>---></h5>
				<div class="" id="email-container">
					 <div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
						  <input type="text" id="inputEmail" name="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputPassword">Password</label>
						<div class="controls">
						  <input type="password" id="inputPasswordx" name="inputPasswordx" placeholder="Password">
						</div>
					  </div>
				
				<div class="action-btn-container">
					<input type="submit" class="btn btn-success btn-small" name="changeemail" value="Save Changes" /> <!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>--->
				</div>
				
				</div>
		
		</fieldset>
	</form>
<form action="<?=base_url('xadmin/account/settings')?>" method="POST" class="form-horizontal">
	<fieldset>
		<legend style="font: bold 16px 'arial';">Change your password</legend>
		<p class="alert alert-info"> Change your password to prevent from password hacking attack. Chose something you can remember, but not too short or too simple.</p>
		<div id="password-container">	 
			 <div class="control-group">
				<label class="control-label" for="inputOldPassword">Old Password</label>
				<div class="controls">
				  <input type="password" id="inputOldPassword" name="inputOldPassword" placeholder="Old Password">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputNewPassword">New Password</label>
				<div class="controls">
				  <input type="password" id="newpassword" name="newpassword" placeholder="Password">
				</div>
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputPassword">Confirm Password</label>
				<div class="controls">
				  <input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
				</div>
			  </div>
		<div class="action-btn-container">
			<input type="submit" class="btn btn-success btn-small" name="changepassword" value="Change password" />
		</div>
		</div>
	</fieldset>
</form>

</fieldset>
</div>