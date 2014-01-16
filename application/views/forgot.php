<div class="container">
		<div class="span4 pull-right" id="login-new-container">
            <div id="error-container">
            <h1>Forgot password</h1>
             <p style="color:#49c300">Can't remember your password? Please enter your email to reset your password.</p>
          <?=(isset($error))? "<p class='alert alert-error'>".$error."</p>": null;?>
            </div>

               <div id="loginbox">            
		            <form id="loginform" class="form-vertical" method="POST" action="<?=base_url('main/forgot')?>">
		               <div class="fields">
					   <div class="control-group">
		                    <div class="controls">
		                        <div class="main_input_box">
		                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="Email" name="userlogin" id="userlogin" />
		                        </div>
		                    </div>
		                </div>
		         
		               </div>
						<div class="btn-container" style="margin: 5px 0px 15px 0px;">
								<button type="submit" name="forgot" class="btn btn-primary">Reset</button>
								<a href="<?=base_url('main/login')?>" class="button" >Cancel</a>
						</div>
		            
		            </form>
				</div>
				</div>
				
			<div class="pull-left span5" style="padding-top:100px">
			<img src="<?=base_url('assets/img/brand-logo.png')?>" />
				<h1 style="color:#fff;text-shadow:0px 1px 2px #000">Eastern Blends Food Corporation</h1>
				<h4 style="color:#fff;text-shadow:0px 1px 2px #000">Attendance Monitoring with Payroll System using Biometric device</h4>
			</div>
		 </div>