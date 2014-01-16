
<fieldset class="title-container">
<legend style="font: bold 26px 'arial';margin-bottom: 11px;"><i class="custom-icon-info" style="margin-top:-3px"></i>Manage Students</legend>
<?=action_button($menu);?>

<?php
echo (isset($success) ? $success :null);
?>

<table class="table table-striped table-hover table-custom display rouned-top" style="font: 12px 'Arial';margin-top:10px" id="sections">
		<thead>
			  <th valign="center" class="text-align-center" style='width:20px'><input type='checkbox' class="checkall" style='margin:0;' /></th>
			  <th>ID</th>
			  <th>Student</th>
			  <th>Course</th>
			  <th>Gradebook</th>
			  <th class="acl">Status</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
			<?php
				foreach($students as $k =>$v){
					$delete 	= "<a href='#delete' name='student' role='button'  data-toggle='modal' class='actions delete' id='student_id_".$v->student_id."'><i class='icon-remove-circle'></i> Delete</a>";
					$edit 		= "<a href='".base_url()."xadmin/students/edit/".genKey($v->student_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>";
					$actions 	=  $edit." ".$delete;
					$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
					$checkbox = "<input type='checkbox' style='margin:0;margin-left: 4px;' class='check_item' id='check_section_id_".$v->student_id."'/>";
				echo "<tr id='delete_".$v->student_id."'><td style='width:20px;' valign='bottom'>".$checkbox."</td><td style='width:20px'>".$v->student_id."</td><td class='text-align'><strong>".$v->first_name." ".$v->middle_name." ".$v->last_name."</strong><br /><i style='color:rgb(153, 153, 153);'>".$v->section."</i></td><td class='text-align'> <i style='color:rgb(153, 153, 153);'>".$v->course."</i></td><td class='text-align'> <a href='#gradebook' class='actions'><i class='icon-share'></i> View</a></td><td class='align-center'><i class='".$activated."'></i></td><td>".$actions."</td></tr>";
				}
			?>
		</tbody>
	</table>
</fieldset>
