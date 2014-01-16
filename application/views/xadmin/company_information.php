
<fieldset class="title-container">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-info" style="margin-top:-3px"></i>Your Company information</legend>
<p>This page shows an overview of your company information</p>

<?=isset($message) ? $message : null;?>
<?=isset($success) ? $success : null;?>



	<form action="<?=base_url('xadmin/main/information')?>" method="POST" class="form-horizontal">
		
			
			
		
				<?php
					if(!isset($edit)){
				?>
				<div class="" id="email-container">
					 <div class="control-group" style="margin:0;">
						<label class="control-label" for="inputEmail"><strong>Company Name</strong> : </label>
						<div class="controls" style="margin-top:5px">
						 <strong><?=$info->company_name?></strong>
						</div>
					  </div>
					  <div class="control-group" style="margin:0">
						<label class="control-label" for="inputPassword"><strong>Address</strong> : </label>
						<div class="controls" style="margin-top:5px">
								<?=$info->address?>
						</div>
					  </div>
					  
					   <div class="control-group" style="margin:0">
						<label class="control-label" for="inputPassword"><strong>Telephone Number</strong> : </label>
						<div class="controls" style="margin-top:5px">
									<?=$info->contact_number?>
						</div>
					  </div>
					   <div class="control-group" style="margin:0">
						<label class="control-label" for="inputPassword"><strong>Mobile Number</strong> : </label>
						<div class="controls" style="margin-top:5px">
									<?=$info->mobile_number?>
						</div>
					  </div>
			
				<div class="action-btn-container" style="margin-top:20px">
					<a href="javascript:history.back()" class="btn btn-info btn-small">Back</a> or <a href="<?=base_url('xadmin/main/information/modify')?>" >Edit information</a>
				</div>
				</div>
				<?php
					}else{
					?>
				
						<fieldset>
						<legend style="font: bold 16px 'arial';">Change information</legend>
						<p>To change information just click save changes.</p>
						<div class="" id="email-container">
							<div class="control-group">
								<label class="control-label" for="companyname">Company Name :</label>
								<div class="controls">
								  <input type="text" id="company_name" name="company_name" placeholder="Company Name" value="<?=$info->company_name?>" class="span8">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input type="text" id="address" name="address" placeholder="Address" value="<?=$info->address?>" class="span8">
								</div>
							  </div>
					         <div class="control-group">
								<label class="control-label" for="contactnumber">Contact Number</label>
								<div class="controls">
								  <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?=$info->contact_number?>" class="span3">
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="mobilenumber">Mobile Number</label>
								<div class="controls">
								  <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile Number"  value="<?=$info->mobile_number?>" class="span3">
								</div>
							  </div>
							<div class="action-btn-container">
								<input type="submit" class="btn btn-success btn-small" name="changeinfomation" value="Save Changes" /> or <a href="javascript:history.back()">Cancel</a> <!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>--->
							</div>
						</div>
						</fieldset>
					
					<?php
					}
				?>
				
				
				
		
		
	</form>

</fieldset>
