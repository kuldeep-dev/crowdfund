<style>
    .error-message{
        color: red;
    }  
</style>
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
						<h5>Register</h5>
                        <?= $this->Form->create($user, ['type' => 'file','class' => 'login-form','id' => 'user-form']) ?>
							<div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="First Name">
							</div>
							<p></p>

							<div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
							</div>
							<p></p>

							<div class="form-group">
                                <input type="email" required="required" class="form-control" name="email" placeholder="Email">
							</div>
							<p></p>

							<div class="form-group pass-group">
								<input type="password" required="required" class="form-control" id="password" name="password" placeholder="Password">
								<span class="eye" onclick="myFunction()">
									<img src="<?php echo $this->request->webroot."images/website/eye.svg";?>" id="EYE"  alt="Eye">
                                </span>
							</div>
							<p></p>

							<div class="form-group pass-group">
								<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
								<span class="eye" onclick="cmyFunction()">
									<img src="<?php echo $this->request->webroot."images/website/eye.svg";?>" id="cEYE"  alt="Eye">
                                </span>
							</div>
							<p></p>

							<div class="form-group form-check register-check">
								<label class="form-check-label">
									<input class="form-check-input error" required="required" name="tnc" type="checkbox">  By Register for an account you agree to your <a href="<?php echo $this->request->webroot . "staticpages/term"; ?>" target="_blank">Terms and Conditions</a>
								</label>
							</div>
							<p></p>
							
							<div class="btn-sec">
								<input type="submit" class="btn btn-theme" value="Register">
							</div>
                        <?= $this->Form->end() ?>
						<div class="register-login">
							<p>Do you have an account?</p>
							<a href="<?php echo $this->request->webroot ?>users/login">Login</a>
						</a>
					</div>
				</div>
			</div>
		</div>
    </section>
    
    <script> 
    
$().ready(function() {
	var form = $("#user-form").validate({
		rules: {
			name: "required",
            last_name: "required",
			email: {
				required: true,
				email: true
			},
			password: { 
				required: true,
				minlength: 6
			},
			cpassword: {
				equalTo: "#password"
			},
            tnc:"required",
		},
		messages: {
			name: "Please enter your name",
            last_name: "Please enter your last name",
			email: "Please enter a valid email address",
			password: "Atleast 6 characters need to be entered.",
            tnc:"Terms and Condition not selected",
			cpassword: {
				equalTo: "Password and confirm password should be same"
			}
		
		},
		errorElement : 'p',
    	errorLabelContainer: '.errorTxt',
		errorPlacement: function(error, element) {
		//console.log(element[0].name);
			if(element[0].name == 'tnc')
			{
				$(element).parent().parent().next('p').html(error);
			}else{
				$(element).parent().next('p').html(error);
			}
        }



	});
        
   
   
jQuery("#password2").keyup(function(event) {
    if (event.keyCode === 13) {
        jQuery("#signupbutton").click(); 
    }
});
 
 
});


// function myFunction() {
//     var x = document.getElementById("password");
//     if (x.type === "password") {
//         x.type = "text";
//     } else {
//         x.type = "password";
//     }
// }

// function cmyFunction() {
//     var x = document.getElementById("cpassword");
//     if (x.type === "password") {
//         x.type = "text";
//     } else {
//         x.type = "password";
//     }
// }


function myFunction() {
var a=document.getElementById("password");
var b=document.getElementById("EYE");
if (a.type=="password")  {
a.type="text";
b.src="<?php echo $this->request->webroot.'images/website/eye-hide.svg';?>";
}
else {
a.type="password";
b.src="<?php echo $this->request->webroot.'images/website/eye.svg';?>";
}
}

function cmyFunction() {
var a=document.getElementById("cpassword");
var b=document.getElementById("cEYE");
if (a.type=="password")  {
a.type="text";
b.src="<?php echo $this->request->webroot.'images/website/eye-hide.svg';?>";
}
else {
a.type="password";
b.src="<?php echo $this->request->webroot.'images/website/eye.svg';?>";
}
}

</script>