
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
		<h4 style="color:#468847">Your current Daily Time Record</h4>
		<table class="table table-striped" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;margin-top:10px;">
              <thead>
                <tr style="background:linear-gradient(to bottom, #004497, #003A82);color:#fff">
                  <th>#</th>
           
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Total Hours</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
				<?php
					$wxyz = "<a href='#' class='btn btn-success'>Accepted</a>";
					if(is_array($result)){
						$ctr = 0;
						$xy = '';
						
						//print_pre($in);
						
						foreach($result as $key => $v){
						$ctr++;
					
							if($in[$v->users_id][$v->id]['cntx']==0){
							$xy = '<a href="'.base_url().'myaccount/submit-ir/'.genKey($v->id).'" class="btn btn-warning">Submit IR</a>';
							
							}else{
								if($in[$v->users_id][$v->id]['res']!='false'){
									$x = explode(':',getDifference("".$v->_date." ".$v->_in,$v->_date." ".$v->_out));
							if($x[0]<4){
								if($in[$v->users_id][$v->id]['stat']==0){
								$xy = '<a href="#" class="btn btn-warning">Pending</a>';
								}else{
								
								$xy = $wxyz;
								}
							}else{
							
								$xy = "----";
							}
							}
							
							}
					
							
							
							?>
							<tr><td><?=$ctr?></td><td><?=$v->_in?></td><td><?=$v->_out?></td><td><?=getDifference("".$v->_date." ".$v->_in,$v->_date." ".$v->_out)?></td><td><?=$v->_date?></td><td><?=$xy?></td></tr>
							<?php
							
						
							}
					}
				?>
			  
               
              </tbody>
            </table>

