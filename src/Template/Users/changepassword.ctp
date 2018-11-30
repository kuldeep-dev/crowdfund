<section class="login-sec">
		<img src="<?php echo $this->request->webroot."images/website/news-back.png";?>" class="bg-image" alt="Background">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto">
                <div class="sign-flash">
                <?= $this->Flash->render() ?>   
              </div>
					<div class="form-wrapper">
                        <h5>Change Password</h5>

                        <?= $this->Form->create('', ['type' => 'file', 'id' => 'change-from' , 'class'=>'login-form']) ?>

                            <div class="form-group">
                                <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" placeholder="Enter Your Old Password" name="opassword" class="form-control" id="opassword">
                            </div>

                            <div class="form-group">
                                <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-lock"></i></span> 
                                <input type="password" class="form-control" placeholder="Enter Your New Password" name="password1" id="password1">
                            </div>

                            <div class="form-group">
                                <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password">
                            </div>

                        <div class="btn-sec">
                        <?= $this->Form->button(__('Change Password'),['class'=>'btn btn-theme']); ?>
                        </div>

                    <?= $this->Form->end() ?>
                        
					</div>
				</div>
			</div>
		</div>
    </section>
    
    <script>
 $(document).ready(function() {
         $("#change-from").validate({
                 rules: { 
                         opassword: "required",
                         password1: {
				required: true,
				minlength: 6
			},
                         password: {
                                 equalTo: "#password1"
                         }
                 },
                 messages: {
                         opassword: "Please enter your old password",
                         password1: "Atleast 6 characters need to be entered.", 
                         password: {
                                 equalTo: "Password and confirm password should be same"
                         }		
                 }
         });
 });
 </script>