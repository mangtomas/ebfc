<div class="container" style="width:1170px;margin:0 auto;padding-top:10px;">
<p class="alert alert-success">Daily Time Record was successfully submit</p>
<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                <tr>
                  <th>#</th>
                  <th>Employee's Name</th>
                  <th>Lates</th>
                  <th>Total Hours</th>
                  <th>Rates</th>
                  <th style="text-align:center">Date</th>
                </tr>
              </thead>
              <tbody>
				<?php
					if(is_array($dtr)){
						$gross = 0;
						$total_hours = 0;
						$ctr = 1;
						$payroll_data = array();
						$print_data = array();
						foreach($dtr as $key => $v){
							$data = getTotalHoursPerDay($v->users_id,$v->_date);
							$per_hour = getRate($v->rate,'perhour');
							$per_minute = getRate($v->rate,'permin');
							$ifover = ((strtotime($data[$v->users_id]['total_hours'])>=strtotime('8:00')) ? 8 : date('H',strtotime($data[$v->users_id]['total_hours']))) * $per_hour;
							$total = 0;
							if((strtotime($data[$v->users_id]['total_hours'])>=strtotime('8:00'))){
								$total = 8 * $per_hour;
							}else{
								$per_h = (int)(date('H',strtotime($data[$v->users_id]['total_hours'])) * $per_hour);
								$per_m = (int)(date('i',strtotime($data[$v->users_id]['total_hours'])) * $per_minute);
								$total = ($per_h + $per_m);
							
							}
							//echo $v->_date." - ".$data[$v->users_id]['late']." - ".$data[$v->users_id]['total_hours']." - ".$total."<br />";
							//print_pre($data[$v->users_id]);
							
							?>
							<tr><td><?=($ctr++)?></td><td><?=$v->firstname." ".$v->lastname?></td><td><?=$data[$v->users_id]['late']?></td><td><?=$data[$v->users_id]['total_hours']?></td><td><?=$data[$v->users_id]['rates']?></td><td style="text-align:center"><?=$v->_date?></td></tr>
							
							<?php
						}
					
						
					}
				?>
			  
               
              </tbody>
            </table>
</div>
<?php
	print_r($payroll);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#search').datepicker();
	
	});
</script>