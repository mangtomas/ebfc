<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Module</legend>
	<a href="<?=base_url('xadmin/module')?>" class="btn btn-small" ><i class="icon-circle-arrow-left"></i> Back</a>
	<form action="<?=base_url('xadmin/module/'.strtolower($action))?>" method="POST" class="form-horizontal" id="role-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				<input type="hidden" name="module_id" id="module_id" value="<?=$result['module_id']?>" />
				<?php
			}
			?>
			<table id="create-new-table"  class="table" style="font: 12px 'Arial';border:none!important">
				<thead>
					<tr>
					  <th>Label</th>
					  <th>Module name</th>
					  <th>URL</th>
					  <th class="acl">Activated</th>
					  <th class="acl">Create</th>
					  <th class="acl">Read</th>
					  <th class="acl">Update</th>
					  <th class="acl">Delete</th>
					  <th class="acl">Export</th>
					  <th class="acl" style="width:35px!important">Print</th>
					</tr>
				</thead>
				<tbody>	
				<tr><td>
					<?=htmlSelect($label,'reference_id','label_id','label',$result['reference_id'])?>
					</td>
					<td>
					<input type="text" style="width:250px" name="module" id="module" value="<?=(isset($result['module']) ? $result['module'] : null)?>" />
					</td>
					<td><input type="text" style="width:120px"  name="url" id="url" value="<?=(isset($result['url']) ? $result['url'] : null)?>" /></td><td style="text-align:center"><input  type="checkbox" name="status" <?=($result['status']==1) ? 'checked' : null?> /></td><td style="text-align:center"><input  type="checkbox" name="_create" <?=($result['_create']==1) ? 'checked' : null?> /></td><td style="text-align:center"><input type="checkbox" <?php if(strtolower($action)=='add'){ echo 'checked'; }else{ if($result['_read']==1){echo 'checked';}}?> name="_read"/></td><td style="text-align:center"><input type="checkbox" name="_update" <?=($result['_update']==1) ? 'checked' : null?> /></td><td style="text-align:center"><input type="checkbox" name="_delete" <?=($result['_delete']==1) ? 'checked' : null?>/></td><td style="text-align:center"><input type="checkbox" name="_export" <?=($result['_export']==1) ? 'checked' : null?>/></td><td style="width:35px!important;text-align:center"><input type="checkbox" name="_print" <?=($result['_print']==1) ? 'checked' : null?>/></td></tr>
				</tbody>
			</table>
		<div class="action-btn-container">
			<button type="submit" class="button minibutton primary" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> or <a href="javascript:history.back()">Cancel</a> 
			<!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->

	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	var validator = $("#role-form").validate({
		rules: {
			reference_id:{
				required:true
			},module: {
				required: true,
				/*remote: "<?=base_url('xadmin/module/add')?>"*/
			},url:{
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

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
</style>