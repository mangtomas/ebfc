<fieldset class="title-container">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-cog" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Course</legend>
<div class="alert alert-info"><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Course and information should be specific enough so that your student can use it to identify your course</div>
<p><span class="required">*</span> Indicates fields are required</p>
<form action="<?=base_url('xadmin/courses/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				<input type="hidden" name="course_id" id="course_id" value="<?=$result['course_id']?>" />
				<div class="" id="email-container">
					 <div class="control-group">
						<label class="control-label" for="course">Course <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="course" name="course" class="span4" value="<?=$result['course']?>" style="float:left"> <span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="course_code">Course Code <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="course_code" name="course_code" value="<?=$result['course_code']?>" style="float:left"> <span class="validation-status pull-left"></span>
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
						<label class="control-label" for="course">Course <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="course" name="course" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="course_code">Course Code <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="course_code" name="course_code" class="alphanumeric-d" style="float:left"><span class="validation-status pull-left"></span>
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

		<div class="action-btn-container">
			<button type="submit" class="button minibutton primary" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> or <a href="javascript:history.back()">Cancel</a> 
			<!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->
		</div>
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			course:{
				required:true,
				remote: "<?=base_url()?>xadmin/courses/validate/ajax=true/?current=<?=isset($result['course']) ? $result['course'] : null?>&mode=<?=strtolower($action)?>"
			},course_code: {
				required: true,
				//remote: "<?=base_url()?>xadmin/courses/validate/ajax=true/?current=<?=isset($result['course_code']) ? $result['course_code'] : null?>&mode=<?=strtolower($action)?>"
			},status:{
				required:true
			}
		
		},messages:{
			course:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
			}, course_code:{
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
});
</script>
<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.validation-status{margin-left: 10px;color: red;margin-top: 5px;float:left}
</style>