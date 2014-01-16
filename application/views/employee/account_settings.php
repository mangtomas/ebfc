<div class="container" style="width:1170px;margin:0 auto">
	<br />

<a href="<?=base_url('myaccount')?>" class="btn btn-primary" style="margin-bottom: 10px;  margin-top: -8px;"><i class="icon-chevron-left icon-white"></i> Back</a>

<fieldset class="title-container">
<p class="alert alert-info">This page shows an overview of your accounts on devstation content management system </p>

<?=isset($message) ? $message : null;?>
<?=isset($success) ? $success : null;?>



	<form action="<?=base_url('myaccount/settings')?>" method="POST" class="form-horizontal" id="validate-form">
		<fieldset>
			<legend style="font: bold 16px 'arial';">Email Address</legend>
			<p>Change your email address</p>
			<h5><i class="custom-icon-small-email" style="margin-top: -3px;margin-right: 5px;"></i><?=$info['email_address']?><!--<a href="#change-email" class="to-show" data-show="email-container" id="change-email" style="font: normal 12px 'Arial';text-decoration: underline;">Change Email</a>---></h5>
				<div class="" id="email-container">
					 <div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
						  <input type="text" id="inputEmail" name="inputEmail" placeholder="Email" style="float:left">
						   <span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputPasswordx">Password</label>
						<div class="controls">
						  <input type="password" id="inputPasswordx" name="inputPasswordx" placeholder="Password" style="float:left">
						    <span class="validation-status pull-left"></span>
						</div>
					  </div>
				
				<div class="form-actions" style="padding-left:20px">
					<input type="submit" class="btn btn-primary" name="changeemail" value="Save Changes" /> <!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>--->
				</div>
				
				</div>
		
		</fieldset>
	</form>
<form action="<?=base_url('myaccount/settings')?>" method="POST" class="form-horizontal" id="validate-form2">
	<fieldset>
		<legend style="font: bold 16px 'arial';">Change your password</legend>
		<p class="alert alert-info"> Change your password to prevent from password hacking attack. Chose something you can remember, but not too short or too simple.</p>
		<div id="password-container">	 
			 <div class="control-group">
				<label class="control-label" for="inputOldPassword">Old Password</label>
				<div class="controls">
				  <input type="password" id="inputOldPassword" name="inputOldPassword" placeholder="Old Password" style="float:left">
				   <span class="validation-status pull-left"></span>
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="newpassword">New Password</label>
				<div class="controls">
				  <input type="password" id="newpassword" name="newpassword" placeholder="Password" style="float:left">
				   <span class="validation-status pull-left"></span>
				</div>
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputPassword">Confirm Password</label>
				<div class="controls">
				  <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" style="float:left">
				   <span class="validation-status pull-left"></span>
				</div>
			  </div>
		<div class="form-actions" style="padding-left:20px">
			<input type="submit" class="btn btn-primary" name="changepassword" value="Change password" />
		</div>
		</div>
	</fieldset>
</form>

</fieldset>
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
			inputEmail:{
				required:true,
				email:true
			},inputPasswordx: {
				required: true,
				
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
	
	
		var validator = $("#validate-form2").validate({
		rules: {
			inputOldPassword:{
				required:true
			},newpassword: {
				required: true,
			},inputPassword: {
				required: true,
				equalto:$('#newpassword').val()
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