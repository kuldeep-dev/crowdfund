<section class="subbanner-sec">
		<img src="<?php echo $this->request->webroot."images/website/contactpage-banner.png";?>" alt="Banner">
		<div class="overlay">
			<h1>Contact Us</h1>
		</div>
	</section><!-- Banner Section-->
	<section class="contactpage-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="sign-flash">
              <?= $this->Flash->render() ?>   
              </div>
					<div class="getin_touch-sec">
						<h5>Contact Us</h5>
						<address>
							<p>1600 Battle Lorem Road<br /> Morrow, GA 30260</p>
							<p>Open Monday – Friday from 8 a.m. – 5 p.m.</p>
							<p>+123456789</p>
							<span>Company Registration Number: 07014587</span>
						</address>
					</div>
					<div class="contact-form">
                    <?= $this->Form->create(null, ['type' => 'file','id' => 'contact-form' , 'class'=>'form_contact']) ?>  
                                <div class="form-group">
                                    <?php echo $this->Form->control('name', ['class' => 'form-control' ,'placeholder'=>'Name' , 'label'=> false ,'value'=> isset($userdata->name) ? $userdata->name : '']); ?> 
                                   
                                </div>

                                <div class="form-group">
                                    <?php echo $this->Form->control('email', ['placeholder'=>'Email','class' => 'form-control','type'=>'email','label'=> false,'value'=> isset($userdata->email) ? $userdata->email : '']); ?> 
                         
                                </div>

                                <div class="form-group">
                                    <?php echo $this->Form->control('phone', ['placeholder'=>'Phone','class' => 'form-control','type'=>'text','label'=> false ,'value'=> isset($userdata->phone) ? $userdata->phone : '']); ?> 
                         
                                </div>

                                <div class="form-group">
                                   <?php echo $this->Form->control('subject', ['placeholder'=>'Subject','class' => 'form-control','type'=>'text','label'=> false]); ?> 
                                </div>
                                <div class="form-group">
                                    <?php echo $this->Form->control('message', ['placeholder'=>'Message','class' => 'form-control','type'=>'textarea','rows'=>3,'label'=> false]); ?> 
                                   
                                </div>
                                <div class="btn-sec">
                                    <button type="submit" class="btn btn-primary btn-theme">Send Message</button>
                                </div>
                            
                            <?= $this->Form->end() ?>
					</div>
				</div><!--/.left-sec-->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="map-sec">
						<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13719.679330087241!2d76.84325505!3d30.72065405!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1541140202048" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
    </section><!--/.contactpage-sec-->
    

    <script>
$().ready(function() {
  $("#contact-form").validate({
    rules: {
      name: "required",
      message: "required",
      phone : "required",
      subject : "required",
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      name: "Please enter your name",
      email: "Please enter a valid email address",
      message: "Please enter your message",
      phone: "Please enter your phone number",
      subject : "Please enter subject",
    }
  });
});
</script>   