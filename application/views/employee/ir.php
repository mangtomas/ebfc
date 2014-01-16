<div class="container" style="width:1170px;margin:0 auto">
	<br />

<a href="<?=base_url('admin')?>" class="btn btn-primary" style="margin-bottom: 10px;  margin-top: -8px;"><i class="icon-chevron-left icon-white"></i> Back</a>

<p class="alert alert-info">Please Submit your Incident Report</p>

<?=isset($message) ? $message : null;?>
<?=isset($success) ? $success : null;?>


	<form action="" method="POST" class="form-horizontal" id="validate-form" enctype="multipart/form-data">
					<div class="well">
						<fieldset class="title-container">
						<legend style="font: bold 16px 'arial';">Upload File</legend>
						<br />
						<p>Valid File : .doc, .docx</p>
						<input type="file" name="file" id="file" style="float:left" />
						 <span class="validation-status pull-left"></span>
						</fieldset>
						<br class="clear" />
					    <div class="form-actions" style="padding-left:20px">
						<button type="submit" class="btn btn-primary" name="submit_ir">Submit</button>
						</div>	
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
			file:{
				accept: "(.doc|.docx)",
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