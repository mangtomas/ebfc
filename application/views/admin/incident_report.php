<div class="container" style="width:1170px;margin:0 auto;padding-top:10px;">
<a href="javascript:history.back()" class="btn btn-success">Back</a>
  <table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead>
                <tr style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                  <th>#</th>
                  <th>Employee Number</th>
                  <th>Employee's Name</th>
                  <th>Incident Report</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
			  <tbody>
				<?php
					if(is_array($ir)){
						$ctr = 0;
						foreach($ir as $key => $v){
						$ctr++;
						
						$accept = "<a href='".base_url()."admin/main/accept-ir/".genKey($v->ireport_id)."' class='btn btn-warning'>Accept</a>";
						$accept = ($v->stat==0) ? $accept : '----';
						$file = "<a href='".base_url()."uploads/".$v->file."' target='_blank' class='btn btn-success'>Download</a>";
							?>
							<tr><td><?=$ctr?></td><td><?=$v->employee_id?></td><td><?=$v->firstname." ".$v->lastname?></td><td><?=$file?></td><td><?=$v->_date?></td><td><?=$accept?></td></tr>
							<?php
							}
					}
				?>
			  
               
              </tbody>
			  
		</table>
</div>

<script type="text/javascript">
</script>