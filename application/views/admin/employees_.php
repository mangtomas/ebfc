<div class="container" style="width:1170px;margin:0 auto;padding-top:10px;">
<br />
<a href="javascript:history.back()" class="btn btn-primary" style="margin-bottom: 10px;  margin-top: -8px;"><i class="icon-chevron-left icon-white"></i> Back</a>
<p class="alert alert-info"><span class="required">*</span> Indicates fields are required</p>
<?php
	if(isset($message)){
	?>
<p class="alert alert-success">Employee was successfully added.</p>
	<?php
	}

?>

<form action="<?=base_url('admin/employees/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				 <input type="hidden" id="users_id" name="users_id" class="span2 alphanumeric" value="<?=$result['users_id']?>">
				<div class="control-group">
						<label class="control-label" for="employee_id">Employee Number <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="employee_id" name="employee_id" class="span2 alphanumeric" style="float:left" readonly value="<?=$result['employee_id']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					<div class="control-group">
						<label class="control-label" for="firstname">First Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="firstname" name="firstname" class="span4 alphanumeric" style="float:left" value="<?=$result['firstname']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					  <div class="control-group">
						<label class="control-label" for="middlename">Middle Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="middlename" name="middlename" class="span4 alphanumeric" style="float:left" value="<?=$result['middlename']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					   <div class="control-group">
						<label class="control-label" for="lastname">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="lastname" name="lastname" onKeyUp="return onKey_UP()" class="span4 alphanumeric" style="float:left" value="<?=$result['lastname']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					    <div class="control-group">
						<label class="control-label" for="gender">Gender <span class="required">*</span></label>
						<div class="controls"> 
							<select id="gender" name="gender">
								<option value="">Select Gender</option>
								<option value="male" <?=(strtolower($result['gender'])=="male") ? 'selected' : null?>>Male</option>
								<option value="female" <?=(strtolower($result['gender'])=="female") ? 'selected' : null?>>Female</option>
							</select>
						
						  </div>
					  </div>
					  
					   <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input type="text" id="address" name="address"  class="span5 " style="float:left" value="<?=$result['address']?>">
								   <span class="validation-status pull-left"></span>
								</div>
							  </div>
					         <div class="control-group">
								<label class="control-label" for="contactnumber">Contact Number</label>
								<div class="controls">
								  <input type="text" id="contact_number" name="contact_number" class="span3 numeric-d mask" style="float:left" value="<?=$result['contact_number']?>">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="mobilenumber">Mobile Number</label>
								<div class="controls">
								<div class="input-prepend">
								<span class="add-on" style="float:left">+639</span>
								<input type="text" id="mobile_number" name="mobile_number" maxlength="9" class="span2 number" style="float:left" value="<?=$result['mobile_number']?>">
								 <span class="validation-status"></span>
								</div>
								  </div>
							  </div>
							  <div class="control-group">
						<label class="control-label" for="hire_date">Hire Date <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="hire_date" name="hire_date" class="span3 alphanumeric-n" readonly style="float:left"  value="<?=$result['hire_date']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
							<div class="control-group">
						<label class="control-label" for="rate">Minimum Rate <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="rate" name="rate" class="span3 number" style="float:left" value="<?=$result['rate']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>


						  <div class="control-group">
						<label class="control-label" for="email_address">Username <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="email_address" name="email_address" class="span3 alphanumeric-n" style="float:left"  value="<?=$result['email_address']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="status">Status  <?=($result['status']==1) ? 'checked' : null;?></label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="status" id="status_1" value="1" <?=($result['status']==1) ? 'checked' : null;?> > 
							  Active 
							</label>
							<label class="radio inline">
							  <input type="radio" name="status" id="status_0" value="0"  <?=($result['status']==0) ? 'checked' : null;?>>
							 Deactive
							</label>
						</div>
					  </div>
				
			
			
				
				<?php
			}else{
				?>
				
					<div class="control-group">
						<label class="control-label" for="employee_id">Employee Number <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="employee_id" name="employee_id" class="span2 alphanumeric" style="float:left" readonly value="<?=$nextemp?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					<div class="control-group">
						<label class="control-label" for="firstname">First Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="firstname" name="firstname" class="span4 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					  <div class="control-group">
						<label class="control-label" for="middlename">Middle Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="middlename" name="middlename" class="span4 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					   <div class="control-group">
						<label class="control-label" for="lastname">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="lastname" name="lastname" onKeyUp="return onKey_UP()" class="span4 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="gender">Gender <span class="required">*</span></label>
						<div class="controls"> 
							<select id="gender" name="gender">
								<option value="">Select Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						
						  </div>
					  </div>
					  
					   <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input type="text" id="address" name="address"  class="span5 " style="float:left">
								   <span class="validation-status pull-left"></span>
								</div>
							  </div>
					         <div class="control-group">
								<label class="control-label" for="contactnumber">Contact Number</label>
								<div class="controls">
								  <input type="text" id="contact_number" name="contact_number" class="span3 numeric-d mask" style="float:left">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="mobilenumber">Mobile Number</label>
								<div class="controls">
								<div class="input-prepend">
								<span class="add-on" style="float:left">+639</span>
								<input type="text" id="mobile_number" name="mobile_number" maxlength="9" class="span2 number" style="float:left">
								 <span class="validation-status"></span>
								</div>
								  </div>
							  </div>
							  <div class="control-group">
						<label class="control-label" for="hire_date">Hire Date <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="hire_date" name="hire_date" class="span3 " readonly style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
							 <div class="control-group">
						<label class="control-label" for="rate">Minimum Rate <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="rate" name="rate" class="span3 number" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

						  <div class="control-group">
						<label class="control-label" for="email_address">Username <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="email_address" name="email_address" readonly class="span3 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
						  <div class="control-group">
						<label class="control-label" for="password">Password <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="password" name="password" class="span3 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="status">Status </label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="status" id="status" value="1" checked>
							  Active
							</label>
							<label class="radio inline">
							  <input type="radio" name="status" id="status" value="0">
							 Deactive
							</label>
						</div>
					  </div>
						
				<?php
			}
			?>
					
    <div class="form-actions">
			<button type="submit" class="btn btn-primary" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="btn btn-primary">Clear</button>
  
    </div>
		
	</form>	
</div>
 <div id="please" style="width:400px;left:60%;top:35%" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
	<div class="modal-header" style="border:none">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	</div>
	<div class="modal-body">
	<p id="result">Please fill out all required fields.</p>
	</div>
	<div class="modal-footer">
	<button class="btn btn-small btn-primary" data-dismiss="modal" aria-hidden="true" id="cancel">OK</button>
	</div>
</div>

 <div id="areyou" style="width:400px;left:60%;top:35%" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
	<div class="modal-header" style="border:none">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	</div>
	<div class="modal-body">
	<p id="result">Are you sure do you want to save.</p>
	</div>
	<div class="modal-footer">
	<button class="btn btn-small btn-primary" id="yesPlease">Yes, Delete</button>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#employee_number').numeric();
	<?php
		if($mode=="add"){
			?>
			
			
	$('#hire_date').datepicker();
			
			<?php
			
		}
	?>
	$('#hire_date').datepicker();
	$('.number').numeric();
	$('.alphanumeric-n').alpha({allow:". "});
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	$('.mask').mask("999-99-99");
	var count = 0;
	var validator = $("#validate-form").validate({
		rules: {
		rate: {
				required: true,
			},
			gender: {
				required: true,
			},employee_number: {
				required: true,
			},firstname:{
				required:true
			},middlename:{
				required:true
			},lastname:{
				required:true,
				/* remote: {
			        url: remote: "<?=base_url()?>admin/employee/validate/ajax=true",
			        type: "post",
			        data: {
			          email_address: function() {
			            return $("#email_address").val();
			          }
			        }
			      } */
			},address:{
				required:true
			},contact_number:{
				required:false
			},mobile_number:{
				required:false
			},email_address:{
				required:true,
				
			},password:{
				required:true,
				
			}
		
		},messages:{
			course_id:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
			}, employee_number:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
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
		invalidHandler:function(){
			$('#please').modal({show:true})
		},
		submitHandler: function(form){
			
			$('button[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			
			$('#areyou').modal({show:true})
			
			$('#yesPlease').click(function(){
				form.submit(form);
			});
				
		}
	});

	/* var id = $('#section_id').val();
	$.post('<?=base_url()?>xadmin/students/getcourse',{id:id},function(data){
			//alert(data);
		var x = JSON.parse(data);
		$('#course').html(x.course);
		$('#course_id').val(x.course_id);
	});

	$('#section_id').change(function(){
		var id = $(this).val();
		$.post('<?=base_url()?>xadmin/students/getcourse',{id:id},function(data){
			var x = JSON.parse(data);
			$('#course').html(x.course);
			$('#course_id').val(x.course_id);
			});

	}); */
	
});

function onKey_UP(){
	var first = $('#firstname').val();
	var val = $('#lastname').val();
	var varKey = '<?=$varkey?>';
	$('#email_address').val(first.replace(' ','_')+'.'+$.trim(val.replace(' ','_'))+'@ebfc.com');
	$('#password').val(varKey);
}

</script>
<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.validation-status{margin-left: 10px;color: red;margin-top: 5px;float:left}
	.custom-select{margin-left:-11px!important;}
</style>