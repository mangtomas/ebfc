<fieldset class="title-container">
<legend style="font: bold 26px 'arial';margin-bottom: 11px;"><i class="custom-icon-info" style="margin-top:-3px"></i>Manage Test</legend>
<?=action_button($menu);?>

<?php
echo (isset($success) ? $success :null);
echo json_encode($tests);
?>

<!--
<table class="table table-striped table-hover table-custom display rouned-top" style="font: 12px 'Arial';margin-top:10px" id="sections">
		<thead>
			  <th valign="center" class="text-align-center" style='width:20px'><input type='checkbox' class="checkall" style='margin:0;' /></th>
			  <th>ID</th>
			  <th>Subjects</th>
			  <th>Course</th>
			  <th class="acl">Status</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
			<?php
				foreach($tests as $k =>$v){
					$delete 	= "<a href='#delete' name='subject' role='button'  data-toggle='modal' class='actions delete' id='section_id_".$v->subject_id."'><i class='icon-remove-circle'></i> Delete</a>";
					$edit 		= "<a href='".base_url()."xadmin/subjects/edit/".genKey($v->subject_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>";
					$actions 	=  $edit." ".$delete;
					$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
					$checkbox = "<input type='checkbox' style='margin:0;margin-left: 4px;' class='check_item' id='check_section_id_".$v->subject_id."'/>";
				echo "<tr id='delete_".$v->subject_id."'><td style='width:20px;' valign='bottom'>".$checkbox."</td><td style='width:20px'>".$v->subject_id."</td><td class='text-align'><strong>".$v->subject."</strong><br /><i style='color:rgb(153, 153, 153);'>".$v->subject_code."</i></td><td class='text-align'> <i style='color:rgb(153, 153, 153);'>".$v->course."</i></td><td class='align-center'><i class='".$activated."'></i></td><td>".$actions."</td></tr>";
				}
			?>
		</tbody>
	</table>
-->
</fieldset>
