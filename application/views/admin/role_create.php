<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>module</th>
         
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
          
        
       
	   <?php
	   $ctr = 1;
		foreach($role as $key => $getx){
			?>
        <tr>
			<td><?=$ctr++?></td>
          <td><?=$getx->role?></td>
         
          <td>
              <a href="<?=base_url().'main/modify/'.$getx->role_id?>"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
	   </tr>
			<?php
		}
	   
	   ?>
      </tbody>
    </table>

</div>
<form action="" method="POST">
<div class="btn-toolbar">
    <button class="btn btn-primary">New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
	<input type="text" name="role" id="role" />
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>module</th>
          <th>Create</th>
          <th>read</th>
          <th>update</th>
          <th>delete</th>
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
          
        
       
	   <?php
	   
	
	   $ctr = 1;
		foreach($result as $key => $get){
			$_create = ($get->_create != 1) ? 'disabled' : null;
			$_read = ($get->_read != 1) ? 'disabled' : null;
			$_update = ($get->_update != 1) ? 'disabled' : null;
			$_delete = ($get->_delete != 1) ? 'disabled' : null;
			$_create_ = ($modules[$get->module_id]['_create'] == 1) ? 'checked' : null;
			$_read_ = ($modules[$get->module_id]['_read'] == 1) ? 'checked' : null;
			$_update_ = ($modules[$get->module_id]['_update'] == 1) ? 'checked' : null;
			$_delete_ = ($modules[$get->module_id]['_delete'] == 1) ? 'checked' : null;
		
				
			?>
        <tr>
			<td><?=$ctr++?></td>
          <td><?=$get->module?></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_create]" value="<?=$get->_create?>" <?=$_create?> <?=$_create_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_read]" value="<?=$get->_read?>" <?=$_read?> <?=$_read_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_update]" value="<?=$get->_update?>"<?=$_update?> <?=$_update_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_delete]" value="<?=$get->_delete?>"<?=$_delete?> <?=$_delete_?> /></td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
	   </tr>
			<?php
		}
	   
	   ?>
      </tbody>
    </table>
	
	<input type="submit" name="submit" value="submit" />
</div>
</form>