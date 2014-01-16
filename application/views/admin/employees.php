<div class="container" style="width:1170px;margin:0 auto;padding-top:10px;">

    <form class="form-inline" method="GET">
	<?=action_button($data['permission']);?>
        <div class="input-append pull-right">
    <input class="span3" id="appendedInputButton" type="text" name="q">
    <button class="btn btn-success" type="submit">Search</button>
    </div>
    </form>
<?=(isset($success)) ? $success : null?>
<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                <tr>
                  <th>#</th>
                  <th>UID</th>
                  <th>Employee ID</th>
                  <th>Employee's Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Contact Number</th>
                  <th>Status</th>
                  <th style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php
					if(is_array($result)){
						$ctr = 0;
						foreach($result as $key => $v){
						$ctr++;
						$date = date('M d, Y',strtotime($v->date_registed));
						$delete 	= ($v->users_id!=1) ? "<a href='#delete' name='Employee' role='button'  data-toggle='modal' class='actions delete' id='users_id_".$v->users_id."'><i class='icon-remove-circle'></i> Delete</a>": '- -';
						$edit 		= ($v->users_id!=1) ? "<a href='".base_url()."admin/employees/edit/".genKey($v->users_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>" : "- - ";
						$actions 	=  '';
							if($data['permission']['_update']==1){
							$actions .= $edit;
							}
							if($data['permission']['_delete']==1){
							$actions .= " ".$delete;
							}
						$status		= ($v->status==1) ? '<i class="icon-ok"></i>' : '<i class="icon-remove"></i>';
						echo "<tr id='delete_".$v->users_id."'><td style='width:20px'>".$ctr."</td><td style='width:20px'>".$v->users_id."</td><td>".$v->employee_id."</td><td class='text-align'><strong>".$v->firstname." ".$v->lastname."</strong></td><td class='text-align' style='color:rgb(153, 153, 153);'>".$v->email_address."</td><td class='text-align' style='color:rgb(153, 153, 153);'>".ucfirst($v->gender)."</td><td class='text-align' style='color:rgb(153, 153, 153);'>".$v->contact_number."</td><td>".$status."</td><td>".$actions."</td></tr>";
		
							
							}
					}
				?>
			  
               
              </tbody>
            </table>
</div>

<script type="text/javascript">
</script>