
	<div class="after-nav" style="margin-top: 43px;">
      
        <div class="container" style="width:1170px;margin:0 auto">
        <img src="http://localhost/ebfc/image/?src=<?=base_url()."uploads/".$info['avatar']?>&h=75&w=75" class="img-polaroid pull-left" style="  margin-top: 7px;">
		<div class="pull-left" id="user-info">
		
		<h3><?=ucwords($info['firstname'])." ".ucwords($info['lastname'])?></h3><a href="<?=base_url()?>myaccount/information/modify"><i class="icon-info-sign"></i> Account Information</a> <a href="<?=base_url()?>myaccount/settings"><i class="icon-user"></i> Settings</a> <a href="<?=base_url()?>main/logout"><i class="icon-off"></i> Logout</a>
		</div>
        </div>
    </div>

	

    <div class="container" style="width:1170px;margin:0 auto">
	<br />
		<div class="alert alert-success">
			<strong>Welcome to EBFC</strong>-<small>Attendance Monitoring with Payroll System Using Biometric Device. Providing better monitoring, accuracy and generating reports for the company of Eastern Blends Food Corp. </small><button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		<h4 style="color:#468847">Current Daily Time Record</h4>
		<button class="btn"><i class="icon-zoom-out"></i> View Summary</button>
		<a href="<?=base_url('admin/dtr')?>" class="btn"><i class="icon-zoom-out"></i> View All</a>
		<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead>
                <tr style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                  <th>#</th>
                  <th>Employee Number</th>
                  <th>Employee's Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Total Hours</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
				<?php
					if(is_array($result)){
						$ctr = 0;
						foreach($result as $key => $v){
						$ctr++;
							?>
							<tr><td><?=$ctr?></td><td><?=$v->employee_id?></td><td><?=$v->firstname." ".$v->lastname?></td> <td><?=$v->_in?></td><td><?=$v->_out?></td><td><?=getDifference("".$v->_date." ".$v->_in,$v->_date." ".$v->_out)?></td><td><?=$v->_date?></td></tr>
							<?php
							}
					}
				?>
			  
               
              </tbody>
            </table>

