<fieldset class="title-container">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-cog" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Student</legend>
<div class="alert alert-info"><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Student to your course and section and start to manage them</div>
<p><span class="required">*</span> Indicates fields are required</p>
<form action="<?=base_url('xadmin/students/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				<input type="hidden" name="student_id" id="student_id" value="<?=$result['student_id']?>" />
				<div class="" id="email-container">
					<div class="control-group">
						<label class="control-label" for="student_number">Student Number <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="student_number" name="student_number" class="span2 alphanumeric" style="float:left" value="<?=$result['student_number']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					<div class="control-group">
						<label class="control-label" for="first_name">First Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="first_name" name="first_name" class="span4 alphanumeric" style="float:left" value="<?=$result['first_name']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					  <div class="control-group">
						<label class="control-label" for="middle_name">Middle Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="middle_name" name="middle_name" class="span4 alphanumeric" style="float:left" value="<?=$result['middle_name']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					   <div class="control-group">
						<label class="control-label" for="last_name">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="last_name" name="last_name" class="span4 alphanumeric" style="float:left" value="<?=$result['last_name']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

						 <div class="control-group">
							<label class="control-label" for="course_code">Section <span class="required">*</span></label>
							<div class="controls">
								<select name="section_id" id="section_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
									<optgroup label="">
									<?php
										foreach($section as $k => $v){
										?>
										 <option value="<?=$v->section_id?>" <?=($result['section_id']==$v->section_id) ? "selected='selected'" : null?>><?=$v->section?></option>
										<?php
										}
									
									?>
									</optgroup>
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					 
					   <div class="control-group">
					 	<label class="control-label" for="course">Course</label>
						<div class="controls">
						  <div id="course" name="course" class="" style="float:left;margin-top: 5px;"></div>
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
				
			
				</div>
				
				<?php
			}else{
				?>
				
					<div class="control-group">
						<label class="control-label" for="student_number">Student Number <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="student_number" name="student_number" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					<div class="control-group">
						<label class="control-label" for="first_name">First Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="first_name" name="first_name" class="span4 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					  <div class="control-group">
						<label class="control-label" for="middle_name">Middle Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="middle_name" name="middle_name" class="span4 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					   <div class="control-group">
						<label class="control-label" for="last_name">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="last_name" name="last_name" class="span4 alphanumeric-n" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

						 <div class="control-group">
							<label class="control-label" for="course_code">Section <span class="required">*</span></label>
							<div class="controls">
								<select name="section_id" id="section_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
									<optgroup label="">
									<?php
										foreach($section as $k => $v){
										?>
										 <option value="<?=$v->section_id?>"><?=$v->section?></option>
										<?php
										}
									
									?>
									</optgroup>
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					 
					   <div class="control-group">
					 	<label class="control-label" for="course">Course</label>
						<div class="controls">
						  <div id="course" name="course" class="" style="float:left;margin-top: 5px;"></div>
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
					  <input type="hidden" id="course_id" name="course_id" value="">

		<div class="action-btn-container">
			<button type="submit" class="button minibutton primary" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> or <a href="javascript:history.back()">Cancel</a> 
			<!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->
		</div>
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){

    $('.selectpicker').selectpicker();
	$('#student_number').numeric();
	$('.alphanumeric-n').alpha();
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			section_id:{
				required:true
			},student_number: {
				required: true,
				remote: "<?=base_url()?>xadmin/students/validate/ajax=true/?current=<?=isset($result['student_number']) ? $result['student_number'] : null?>&mode=<?=strtolower($action)?>"
			},first_name:{
				required:true
			},middle_name:{
				required:true
			},last_name:{
				required:true
			},status:{
				required:true
			}
		
		},messages:{
			course_id:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
			},first_name:{
				required : ""
			},middle_name:{
				required : ""
			},last_name:{
				required : ""
			}, student_number:{
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
		submitHandler: function(form){
			$('button[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			form.submit(form);
		}
	});

	var id = $('#section_id').val();
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

	});
});
</script>
<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.validation-status{margin-left: 10px;color: red;margin-top: 5px;float:left}
	.custom-select{margin-left:-11px!important;}
</style>