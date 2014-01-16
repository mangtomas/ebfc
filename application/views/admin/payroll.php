<div class="container" style="width:1170px;margin:0 auto;padding-top:10px;">

    <form class="form-inline" method="GET">
    <div class="input-append">
    <input class="span3" id="appendedInputButton" type="text" name="q">
    <button class="btn btn-success" type="submit">Search</button>
    </div>
    </form>
<?=(isset($success)) ? $success : null?>
<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                <tr>
                  <th>#</th>
                  <th>Employee ID</th>
                  <th>Employee's Name</th>
                  <th>Lates</th>
                  <th>Total Hours</th>
                  <th style="text-align:center">Date</th>
                </tr>
              </thead>
              <tbody>
				<?php
					if(is_array($result)){
						$ctr = 0;
						foreach($result as $key => $v){
						$ctr++;
						$date = date('M d, Y',strtotime($v->date_registed));
						$delete 	= "<a href='#delete' onclick=\"_delete(".$v->users_id.")\" name='users' role='button'  data-toggle='modal' class='actions delete btn btn-mini btn-warning' id='users_id_".$v->users_id."'>Delete</a>";
						$edit 		= "<a href='".base_url()."admin/employees/edit/".genKey($v->users_id)."' class='actions btn btn-mini btn-warning'>Edit</a>";
						$actions 	=  '';
							if($data['permission']['_update']==1){
							$actions .= $edit;
							}
							if($data['permission']['_delete']==1){
							$actions .= " ".$delete;
							}
						$status		= ($v->status==1) ? '<i class="icon-ok"></i>' : '<i class="icon-remove"></i>';
							?>
							<tr id="delete_<?=$v->users_id?>"><td><?=$ctr?></td><td><?=$v->employee_id?></td><td><?=$v->firstname." ".$v->lastname?></td> <td><?=$v->lates?></td><td><?=$v->total_hours?></td> <td style="text-align:center"><?=date('F j, Y',strtotime($v->_date))?></td></tr>
							<?php
							}
					}
				?>
			  
               
              </tbody>
            </table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search').datepicker();
	
	});
	
	
	function _delete(id){
	var x = confirm('Are you sure you want to delete');
		if(x){
			$.post('<?=base_url('admin/actions/delete/')?>',{row:'users_'+id,'_delete':true},function(data){
				if(data){
					$('#delete_'+id).fadeOut('slow');
					alert("Information was successfull deleted.");
				}
			})
		}
	
	}
</script>