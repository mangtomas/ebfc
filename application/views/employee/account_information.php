<div class="container" style="width:1170px;margin:0 auto">
	<br />

<a href="<?=base_url('myaccount')?>" class="btn btn-primary" style="margin-bottom: 10px;  margin-top: -8px;"><i class="icon-chevron-left icon-white"></i> Back</a>

<p class="alert alert-info">This page shows an overview of your personal information</p>

<?=isset($message) ? $message : null;?>
<?=isset($success) ? $success : null;?>


	<form action="<?=base_url('myaccount/information/modify')?>" method="POST" class="form-horizontal" id="validate-form" enctype="multipart/form-data">
		
			
			
		
				<?php
					if(!isset($edit)){
				?>
				<div class="" id="email-container">
				<div class="pull-right">
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
					<a href="<?=base_url('myaccount/information/modify')?>" >Edit information</a>
				</div>
				</div>
				
				<?php
					}else{
					?>
					<div class="pull-left" style="width:300px">
						<fieldset class="title-container">
						<legend style="font: bold 16px 'arial';">Primary Photo</legend>
						<img src="http://localhost/ebfc/image/?src=<?=base_url()."uploads/".$info['avatar']?>&h=100&w=100" class="img-polaroid"><br /><br />
						<input type="file" name="avatar" id="avatar" />
						 <span class="validation-status pull-left"></span>
						</fieldset>
						</div>
				
						<div class="pull-left">
						<fieldset class="title-container">
						<legend style="font: bold 16px 'arial';">Change information</legend>
						<p>To change information just click save changes.</p>
						<div class="" id="email-container">
						<div class="control-group">
								<label class="control-label">Employee Number :</label>
								<div class="controls" style="padding-top: 7px;">
								  <strong><?=$info['employee_id']?></strong>
								</div>
							  </div>
							<div class="control-group">
								<label class="control-label" for="firstname">Firstname :</label>
								<div class="controls">
								  <input type="text" id="firstname" name="firstname"  value="<?=$info['firstname']?>" class="span3 alphanumeric-n isChange" style="float:left">
								   <span class="validation-status"></span>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="companyname">Lastname :</label>
								<div class="controls">
								  <input type="text" id="lastname" name="lastname"  value="<?=$info['lastname']?>" class="span3 alphanumeric-n" style="float:left">
								   <span class="validation-status pull-left"></span>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input type="text" id="address" name="address"  value="<?=$info['address']?>" class="span5 alphanumeric" style="float:left">
								   <span class="validation-status pull-left"></span>
								</div>
							  </div>
					         <div class="control-group">
								<label class="control-label" for="contactnumber">Contact Number</label>
								<div class="controls">
								  <input type="text" id="contact_number" name="contact_number" value="<?=$info['contact_number']?>" class="span3 numeric-d" style="float:left">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="mobilenumber">Mobile Number</label>
								<div class="controls">
								<div class="input-prepend">
								<span class="add-on" style="float:left">+639</span>
								<input type="text" id="mobile_number" name="mobile_number" maxlength="9" value="<?=$info['mobile_number']?>" class="span2 numeric-d" style="float:left">
								 <span class="validation-status"></span>
								</div>
								  </div>
							  </div>
							
						</div>
						</fieldset>
						</div>
						<br class="clear" />
					    <div class="form-actions" style="padding-left:20px">
						<button type="submit" class="btn btn-primary" name="changeinfomation">Save changes</button>
						<button type="reset" class="btn">Clear</button>
						</div>
					<?php
					}
				?>
			</div>	
				
		
	</form>

</div>

<script type="text/javascript">
$(document).ready(function(){

   /*  $('.selectpicker').selectpicker();
	$('#student_number').numeric();
	*/
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-n').alpha({allow:" "});
	$('.numeric-d').numeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			avatar:{
				accept: "(png|jpg|jpeg)"
				
			},lastname:{
				required:true
			},firstname: {
				required: true,
			},address:{
				required:true
			},mobile_number:{
				required:true
			},contact_number:{
				required:true
			},status:{
				required:true
			}
		
		},
		
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().find('span.validation-status') );
		},
		success: "valid",
		submitHandler: function(form){
			$('button[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			form.submit(form);
		}
	});
	
});
</script>