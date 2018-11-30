
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
            <div class="col-sm-12">
                    <div class="sign-flash">  
                    <?= $this->Flash->render() ?>   
                    </div>
                </div> 
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto">
					<div class="form-wrapper">
						<h5>Forgot Password</h5>
						<?= $this->Form->create('', ['type' => 'file','class' => 'login-form' , 'id' => 'forgot-form']) ?>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" required="required" placeholder="Email">
							</div>
							<div class="btn-sec">
								<input type="submit" class="btn btn-theme" value="Send Request">
							</div>
						<?= $this->Form->end() ?>
					</div>
				</div>
			</div>
		</div>
	</section>