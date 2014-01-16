
<fieldset class="title-container">
<style>
#create-new-table thead tr th.acl{width:100px!important}
#create-new-table tbody tr td{text-align:center;background:#fff}
input.error{border:1px solid red!important}
</style>
<legend style="font: bold 26px 'arial';margin-bottom:10px"><i class="custom-icon-monitor" style="margin-top:-3px"></i>Role</legend>
	<form action="<?=base_url('xadmin/role/create')?>" method="POST" class="form-horizontal" id="role-form">
		
			<fieldset>
				<legend style="font: bold 16px 'arial';">Add new role</legend>
					<table id="create-new-table"  class="table" style="font: 12px 'Arial';border:none!important">
						<thead>
							<tr>
							  <th>Role name</th>
							  <th class="acl">Create</th>
							  <th class="acl">Read</th>
							  <th class="acl">Update</th>
							  <th class="acl">Delete</th>
							</tr>
						</thead>
						<tbody>	
						<tr><td><input type="text" style="width:525px" name="role" id="role" /></td><td><input  type="checkbox" name="_create" /></td><td><input type="checkbox" checked="true" name="_read"/></td><td><input type="checkbox" name="_update" /></td><td><input type="checkbox" name="_delete" /></td></tr>
						</tbody>
					</table>
				<div class="action-btn-container">
					<input type="submit" class="btn btn-success btn-small" name="btn-submit" value="Create New" /> or <a href="javascript:history.back()">Cancel</a> 
					<!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->
				</div>
			</fieldset>
		
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	var validator = $("#role-form").validate({
		rules: {
					
			role: {
				required: true,
				//remote: "<?=base_url('xadmin/role/create-new')?>"
			},
		
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
			$('input[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			form.submit(form);
		}
	});
});
</script>