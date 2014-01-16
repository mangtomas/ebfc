
		<div class="container">
		<div class="span4 pull-right" id="login-new-container">
		    <div id="error-container">
              <h1>Login</h1>
              <p style="color:#49c300">We are happy to see you return! Please login to continue</p>
          <?=(isset($error))? "<p class='alert alert-error'>".$error."</p>": null;?>
            </div>

              <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="<?=base_url('main/login')?>">
               <div class="fields">
                <div class="control-group">
                    <div class="controls">
                          <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Username" name="userlogin" id="userlogin" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="userauth" id="userauth" />
                        </div>
                    </div>
                </div>
               </div>
                <div class="btn-container">
                    <button type="submit" name="usersubmit" id="login-btn" class="btn btn-primary pull-left">Login</button>
                    <br class="clear" />
                </div>
              <br class="clear" />
            </form>
       
        </div>
		</div>
	
		 
	
		 
		
			<div class="pull-left span5" style="padding-top:100px">
			<img src="<?=base_url('assets/img/brand-logo.png')?>" />
				<h1 style="color:#fff;text-shadow:0px 1px 2px #000">Eastern Blends Food Corporation</h1>
				<h4 style="color:#fff;text-shadow:0px 1px 2px #000">Attendance Monitoring with Payroll System Using Biometric Device and Image Identification</h4>
			</div>
		 </div>

           