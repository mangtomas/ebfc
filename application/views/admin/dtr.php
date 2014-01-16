<div class="container" style="width:1170px;margin:0 auto;padding-top:10px;">
<form action="<?=base_url('admin/dtr/submit')?>" method="POST">
<input type="hidden" name="cutoff" value="<?=$from."/".$to?>" />
    <button type="submit" class="btn btn-success" name="submit">Submit Payroll</button>
<strong>Current Cut-off From : <span class="label label-success"><?=date('F j, Y',strtotime($from))?></span> To : <span class="label label-success"><?=date('F j, Y',strtotime($to))?></span></strong>
</form>

<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                <tr>
                  <th>#</th>
                  <th>Employee ID</th>
                  <th>Employee's Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
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
						$date = date('M d, Y',strtotime($v->_date));
							?>
							<tr><td><?=$ctr?></td><td><?=$v->employee_id?></td><td><?=$v->firstname." ".$v->lastname?></td> <td><?=$v->_in?></td><td><?=$v->_out?></td><td><?=getDifference("".$v->_date." ".$v->_in,$v->_date." ".$v->_out)?></td><td style="text-align:center"><?=$date ?></td></tr>
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
</script>