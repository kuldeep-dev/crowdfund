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
						<h5>Login</h5>
						<div class="social-btn">
							<a href="javascript:void(0)" class="btn btn-fb fb_login" id="fb_login"><img src="<?php echo $this->request->webroot."images/website/foot-facebook.svg";?>" alt="Icon"> Login with Facebook</a>
						</div>
						<div class="social-btn">
							<a href="javascript:void(0)" onclick="doLinkedInLogin()" class="btn btn-linked"><img src="<?php echo $this->request->webroot."images/website/foot-linked.svg";?>" alt="Icon"> Connect with Linkedin</a>
                        </div>
                        
                        <?= $this->Form->create('Users', ['id' => 'login-form' , 'class'=>'login-form']) ?> 
							<div class="form-group">
								<input type="email" required="required" class="form-control" name="username"  placeholder="Email">
							</div>
							<div class="form-group pass-group">
								<input type="password" required="required" class="form-control" id="pwd" name="password" placeholder="Password">
								<span class="eye" onclick="show()">
									<img src="<?php echo $this->request->webroot."images/website/eye.svg";?>" id="EYE" alt="Eye">
								</span>
							</div>
							<div class="form-group form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox"> <span class="cust-check"></span> Keep me logged in
								</label>
								<a href="<?php echo $this->request->webroot ?>users/forgot">Forgot password</a>
							</div>
							<div class="btn-sec">
								<input type="submit" class="btn btn-theme" value="Login">
							</div>
                            <?= $this->Form->end() ?> 
                        
						<div class="btn-sec">
							<a href="<?php echo $this->request->webroot ?>users/add">Register</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    
   
    
    <script> 
    
$().ready(function() {
    var formlogin = $("#login-form").validate({
		rules: {
			username: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 6
			},
			
		},
		messages: {
			username: "Please enter a valid email address",
			password: "Password is required."
			
		}
    });
        

});

</script>

<!---Start-Facebook Login-->
<script type="text/javascript">
        function testAPI() {
            FB.api('/me?fields=id,email,name,birthday,locale,age_range,gender,first_name,last_name,picture', function(response) {  
                data = {
                    myid : response,
                    action:'fblogin'
                }
                $.ajax({
                    url: '<?php echo $this->request->webroot ?>users/fblogin',
                    data: data,
                    method: 'post',
                    dataType: 'json',
                    success: function(resdata){
                        console.log('resdata',resdata);
                        //window.location.href = resdata.link;
                        if(resdata.isSuccess != 'true'){                        	
                           // alert(resdata.msg);
                           // print_r(resdata);
                        }else{
                           // alert('else')
                            //location.reload();
							location.href = '<?php echo $this->request->webroot ?>users/myaccount';
                           // print_r(resdata);
                        }
                    }
                });
            });
        }
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                testAPI();
            } else {
                console.log('Please log') ;
            }
        }
        $(document).ready(function(){
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '2032239723465223',
                    cookie     : true,  
                    xfbml      : true, 
                    version    : 'v2.10' 
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            $(function() {
                $('#fb_login').on('click', function (e) {
                    e.preventDefault();
                    FB.login(function(response) {
                        checkLoginState();
                    }, {scope: 'email'});
                });
            });
        })
    </script>
<!--End-Facebook Login-->


<!---Start-linked Login-->
<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key: 77coit2ykqe7jp
    onLoad: doLinkedInLogin  //removed this line
   authorize: true
</script>

<script>
    function doLinkedInLogin(){
       IN.User.authorize(function(){
           onLinkedInAuth(); // callback function which will process LinkedIn login 
       });
    }
    function onLinkedInAuth() {
        IN.API.Profile("me").fields("id", "first-name", "last-name", "headline", "location", "picture-url", "public-profile-url", "email-address").result(function (response) {
            data = {
                    myid : response.values[0],
                    action:'linkedinlogin'
                }
            processLinkedInUserDetails(data); //call function with data as parameter if you want to do some process on data
        }).error(function (response) {
            console.log(response);
        });
    }
    processLinkedInUserDetails = function(data){
        //do your stuff with data
		console.log(data,'data2');
			$.ajax({
					url: '<?php echo $this->request->webroot ?>users/linkedinlogin',
                    data: data,
                    method: 'post',
                    dataType: 'json',
                    success: function(resdata){
                        console.log(resdata);
                        //window.location.href = resdata.link;
                        if(resdata.isSuccess != 'true'){                        	
                            alert(resdata.msg);
                            print_r(resdata);
                        }else{
                            //location.reload();
							location.href = '<?php echo $this->request->webroot ?>users/myaccount';
                            print_r(resdata);
                        }
					  }
				  });
    };


// function myFunction() {
//     var x = document.getElementById("password");
//     if (x.type === "password") {
//         x.type = "text";
//     } else {
//         x.type = "password";
//     }
// }

function show() {
var a=document.getElementById("pwd");
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

</script>
<!--End-linked Login-->