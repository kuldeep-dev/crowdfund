<section class="profile-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sign-flash">
                <?= $this->Flash->render() ?>   
              </div>
					<div class="profile-inner">      
						<div class="title-sec">
							<h5>Edit Profile</h5>
                        </div>
                        <?= $this->Form->create($user, ['id' => 'edit-form', 'enctype' => 'multipart/form-data']) ?>
						<div class="avatar-sec">
							<div class="avater">
                                <?php if($user['image']){ ?>
                                <img class="currentimg" src="<?php echo $this->request->webroot."images/users/".$user['image']; ?>">
                                <?php }else{ ?>
                                <img class="currentimg" src="<?php echo $this->request->webroot."images/users/noimage.png"; ?>">
                                <?php } ?>

                            </div>
                            <?php echo $this->Form->control('image', ['class' => 'form-control file-btn','type'=>'file','id'=>'img' ,'label' => false]); ?>
							<div class="edit-btn" style="right:-20px;">
								<a href="#"><img src="<?php echo $this->request->webroot."images/website/photo-camera.svg";?>" Alt="Edit-Icon"></a>
							</div>
                        </div>
                        
                        <div class="row">
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 m-auto">
								<div class="row">								
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        
                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-user"></i></span>
                                            <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false,'placeholder'=>'First Name']); ?>
                                        </div>
                                
                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-user"></i></span>
                                            <?php echo $this->Form->control('last_name', ['class' => 'form-control', 'label' => false,'placeholder'=>'Last Name']); ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-user"></i></span>
                                            <?php echo $this->Form->control('company', ['class' => 'form-control', 'label' => false,'placeholder'=>'Company']); ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-user"></i></span>
                                            <?php echo $this->Form->control('phone', ['class' => 'form-control', 'label' => false,'placeholder'=>'Phone']); ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="glyphicon glyphicon-user"></i></span>
                                            <?php echo $this->Form->control('dob', ['class' => 'form-control', 'label' => false,'placeholder'=>'Date of birth', 'id'=>'dob']); ?>
                                        </div>
                        
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                            <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false,'placeholder'=>'Email Address','readonly']); ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns"><i class="fa fa-map-marker fnt_inc1" aria-hidden="true"></i></span>   
                                            <?php echo $this->Form->control('address', ['type'=> 'textarea','rows' => '4', 'cols' => '3', 'class' => 'form-control', 'label' => false,'placeholder'=>'Address']); ?>
                                        </div> 
                            
                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns lgh_snt"><i class="fa fa-globe" aria-hidden="true"></i></span> 
                                            <?php echo $this->Form->control('city', ['class' => 'form-control', 'label' => false,'placeholder'=>'City']); ?>
                                        </div> 

                                        <div class="form-group">
                                            <span class="input-group-addon brdr_trns lgh_snt"><i class="fa fa-globe" aria-hidden="true"></i></span> 
                                            <?php echo $this->Form->control('country', ['class' => 'form-control', 'label' => false,'placeholder'=>'Country']); ?>
                                        </div> 

									</div>
								</div>
							</div>
						</div>
                        

                        <div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="btn-sec">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-theme']) ?>
								</div>
							</div>
                        </div>
                        
                        
                           <?= $this->Form->end() ?>
                       
					</div>
				</div>
			</div>
		</div>
	</section><!--/.End Here -->

<script>
   $(document).ready(function() {
	$("#edit-form").validate({  
		ignore: "",
		rules: {
			email: {
				required: true,
				email: true
			},
                        paypal_email: { 
				required: true,
				email: true
			},
			name: {required:true},
			dob: {required:true},
                        phone: { 
                            required:true, 
                            number:true,
                        },
                        zip: {
                            required:true,
                            number:true,
                        },
			country: {
				required: true
			},
			gender: "required",
			state: "required"
			
		},
		messages: {
                          name: {     
                                  required: "Please enter your Full Name", 
                                },      
			dob: "Please select date of Birth",
			country: "Please select country",
			gender: "Please select gender",
                        email: "Please enter a valid email address",
			state: "Please enter state",
			zip: "Please enter zipcode"
		}
	});
}); 

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.currentimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function(){
    readURL(this);
});

$( "#dob").datepicker({ maxDate: '0' });

</script>    