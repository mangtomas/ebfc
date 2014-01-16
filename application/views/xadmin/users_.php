
<fieldset>
<legend style="font: bold 26px 'arial';margin:0"><i class="custom-icon-users" style="margin-top:-3px"></i>Users</legend>
<?=action_button($menu);?>
<script type="text/javascript">
	$("#grid").flexigrid({
	
dataType: 'json',
		colModel : [
			{display: 'Last Updated', name : 'date', width : 140, sortable : true, align: 'center'}
			],
	});  				
</script>
<div id="grid">
</div>
</fieldset>
