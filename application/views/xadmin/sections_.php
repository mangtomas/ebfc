<fieldset class="title-container">
<legend style="font: bold 26px 'arial';"><i class="custom-icon-cog" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Sections</legend>
<div class="alert alert-info"><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Section to your course</div>
<p><span class="required">*</span> Indicates fields are required</p>
<form action="<?=base_url('xadmin/sections/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				<input type="hidden" name="section_id" id="section_id" value="<?=$result['section_id']?>" />
				<div class="" id="email-container">
					 <div class="control-group">
							<label class="control-label" for="course_code">Select Course <span class="required">*</span></label>
							<div class="controls">
								<select name="course_id" id="course_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
									<optgroup label="">
									<?php
										foreach($course as $k => $v){
										?>
										 <option value="<?=$v->course_id?>" <?=($result['course_id']==$v->course_id) ? "selected='selected'" : null?>><?=$v->course?></option>
										<?php
										}
									
									?>
									</optgroup>
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					  <div class="control-group">
						<label class="control-label" for="section">Section <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="section" name="section" value="<?=$result['section']?>" style="float:left"> <span class="validation-status pull-left"></span>
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
						 <div class="control-group">
							<label class="control-label" for="course_code">Select Course <span class="required">*</span></label>
							<div class="controls">
								<select name="course_id" id="course_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
									<optgroup label="">
									<?php
										foreach($course as $k => $v){
										?>
										 <option value="<?=$v->course_id?>"><?=$v->course?></option>
										<?php
										}
									
									?>
									</optgroup>
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					  
						<label class="control-label" for="section">Sections <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="section" name="section" class="span4 alphanumeric-d" style="float:left"><span class="validation-status pull-left"></span>
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
	
	var courseidx = $('#course_id').val();
		 $('#course_id').change(function(){
		 	courseidx = $(this).val();
		 });
    $('.selectpicker').selectpicker();
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			course_id:{
				required:true
			},section: {
				required: true,
				remote: {
			        url: "<?=base_url()?>xadmin/sections/validate/ajax=true/?current=<?=isset($result['course']) ? $result['course'] : null?>&mode=<?=strtolower($action)?>",
			        type: "post",
			        data: {
			          course_id: function() {
			            return $("#course_id").val();
			          }
			        }
			      }
			},status:{
				required:true
			}
		
		},messages:{
			course_id:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
			}, section:{
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
	.custom-select{margin-left:-11px!important;}
</style>