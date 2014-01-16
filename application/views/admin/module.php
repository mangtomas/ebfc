<div class="container" style="width:1170px;margin:0 auto">
	<br />
<?=action_button($data['permission']);?>

<?php
echo (isset($success) ? $success :null);
?>
<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
			 <th>#</th>
			  <th>Module Name</th>
			  <th>Label</th>
			  <th class="acl">Activated</th>
			  <th class="acl">Create</th>
			  <th class="acl">Read</th>
			  <th class="acl">Update</th>
			  <th class="acl">Delete</th>
			  <th class="acl">Export</th>
			  <th class="acl">Print</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
	<?php
		foreach($modules as $k =>$v){
			$delete 	= ($v->module_id!=1) ? "<a href='#delete' name='Module' role='button'  data-toggle='modal' class='actions delete' id='module_id_".$v->module_id."'><i class='icon-remove-circle'></i> Delete</a>": '- -';
			$edit 		= ($v->module_id!=1) ? "<a href='".base_url()."xadmin/module/edit/".genKey($v->module_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>" : "- - ";
			$actions 	=  '';
			if($data['permission']['_update']==1){
			$actions .= $edit;
			}
			if($data['permission']['_delete']==1){
			$actions .= " ".$delete;
			}
			$delete 	= ($v->_delete==1) ? "icon-ok" : "icon-remove";
			$update 	= ($v->_update==1) ? "icon-ok" : "icon-remove";
			$read 		= ($v->_read==1) ? "icon-ok" : "icon-remove";
			$create 	= ($v->_create==1) ? "icon-ok" : "icon-remove";
			$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			$export 	= ($v->_export==1) ? "icon-ok" : "icon-remove";
			$print 	= ($v->_print==1) ? "icon-ok" : "icon-remove";
			$checkbox = ($v->module_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".$v->module_id."'><td style='width:20px'>".$v->module_id."</td><td class='text-align'><strong>".$v->module."</strong><br/ > <i style='color:rgb(153, 153, 153);'>/".$v->url."</i></td><td class='text-align' style='color:rgb(153, 153, 153);'><i>".$v->label."</i></td><td class='align-center'><i class='".$activated."'></i></td><td class='align-center'><i class='".$create."'></i></td><td class='align-center'><i class='".$read."'></i></td><td class='align-center'><i class='".$update."'></i></td><td class='align-center'><i class='".$delete."'></i></td><td class='align-center'><i class='".$export."'></i></td><td class='align-center'><i class='".$print."'></i></td><td>".$actions."</td></tr>";
		}
			
			
			?>
		</tbody>
	</table>
</div>
