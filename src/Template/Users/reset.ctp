<section class="login-sec">
		<img src="<?php echo $this->request->webroot."images/website/news-back.png";?>" class="bg-image" alt="Background">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
			<div class="col-sm-12">
                    <div class="sign-flash">  
                    <?= $this->Flash->render() ?>   
                    </div>
                </div> 
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto">
					<div class="form-wrapper">
						<h5>Reset Password</h5>

						<?= $this->Form->create('', ['type' => 'file', 'class' => 'login-form','id' => 'reset-form']) ?>
                        <div class="form-group pass-group">
								<input type="password" class="form-control" name="password1" id="password1" placeholder="New Password" required="required">
								<span class="eye">
									<img src="<?php echo $this->request->webroot."images/website/eye.svg";?>" alt="Eye">
								</span>
							</div>
							<div class="form-group pass-group">
								<input type="password" class="form-control" name="password" placeholder="Confirm Password" required="required">
								<span class="eye">
									<img src="<?php echo $this->request->webroot."images/website/eye.svg";?>" alt="Eye">
								</span>
							</div>
							<div class="btn-sec">
								<input type="submit" class="btn btn-theme" value="Reset Password">
							</div>
						<?= $this->Form->end() ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<script> 
$(document).ready(function() {
	$("#reset-form").validate({ 
		rules: {
			password1: {
				required: true,
				minlength: 6
			},
			password: {
				equalTo: "#password1"
			}
		},
		messages: {
			password1: {
				required: "Please Enter New password",
				minlength: "Please enter atleast 6 characters"
			},
			password: {
				equalTo: "Both Passwords do not match"
			}		
		}
	});
        
});
</script>