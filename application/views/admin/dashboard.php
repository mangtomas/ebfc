
	<div class="after-nav" style="margin-top: 43px;">
      
        <div class="container" style="width:1170px;margin:0 auto">
        <img src="http://localhost/ebfc/image/?src=<?=base_url()."uploads/".$info['avatar']?>&h=75&w=75" class="img-polaroid pull-left" style="  margin-top: 7px;">
		<div class="pull-left" id="user-info">
		
		<h3><?=ucwords($info['firstname'])." ".ucwords($info['lastname'])?></h3><a href="<?=base_url()?>admin/account/information/modify"><i class="icon-info-sign"></i> Account Information</a> <a href="<?=base_url()?>admin/account/settings"><i class="icon-user"></i> Settings</a> <a href="<?=base_url()?>main/logout"><i class="icon-off"></i> Logout</a>
		</div>
        </div>
    </div>

	

    <div class="container" style="width:1170px;margin:0 auto">
	<br />
		<div class="alert alert-success">
			<strong>Welcome to EBFC</strong>-<small>Attendance Monitoring with Payroll System Using Biometric Device and Image Identification. Providing better monitoring, accuracy and generating reports for the company of Eastern Blends Food Corp. </small><button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		<?=(isset($success)) ? $success : null?>
		<h4 style="color:#468847">Incident Report</h4>
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
						$file = "<a href='".base_url()."uploads/".$v->file."' target='_blank' class='btn btn-success'>Download</a>";
							?>
							<tr><td><?=$ctr?></td><td><?=$v->employee_id?></td><td><?=$v->firstname." ".$v->lastname?></td><td><?=$file?></td><td><?=$v->_date?></td><td><?=$accept?></td></tr>
							<?php
							}
					}
				?>
			  
               
              </tbody>
			  
		</table>
		
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
						$totalx = ($v->isOut==0)? '00:00' : getDifference("".$v->_date." ".$v->_in,$v->_date." ".$v->_out);
							?>
							<tr><td><?=$ctr?></td><td><?=$v->employee_id?></td><td><?=$v->firstname." ".$v->lastname?></td> <td><?=$v->_in?></td><td><?=$v->_out?></td><td><?=$totalx?></td><td><?=$v->_date?></td></tr>
							<?php
							}
					}
				?>
			  
               
              </tbody>
            </table>

