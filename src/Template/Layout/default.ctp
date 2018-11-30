<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= $cakeDescription ?> Crowd Funding</title>
<link rel="icon" type="image/x-icon" href="<?php echo $this->request->webroot."images/website/favicon-32x32.png";?>" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<?= $this->Html->css( array('custom/swiper.min.css',
							'custom/bootstrap.css',
							'custom/bootstrap-grid.css',
							'custom/bootstrap-reboot.css',
							'custom/style.css') ) ?>  
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
<?= $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery-ui.min.js', 'jquery.dataTables.min.js','docsupport/chosen.js')) ?>      
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>     
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.11/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.11/sweetalert2.min.css">


<style>
       .alert-danger{text-align: center;}
       .alert-success{text-align: center;}
       .alert-success{
		padding: 10px;
		font-size: 15px;
		margin: 0px;
	}
	.message.error{
		background: #cc0000;
		padding: 10px;
		color: #fff;
		font-size: 15px;
		margin: 0px 0px 0px 0px;
	}
        .my-error-class{
            color:red !important;
        }
		.error{
            color:red !important;
        }
        .my-valid-class{
          color:#49BA64 !important;  
        }
        #added_items h4{text-align: center; }
        .stock {color: red;} 
            
    </style>   
</head>
<body>
<main class="main-wrapper">
<header class="main-header">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a href="<?php echo $this->request->webroot . "users/home"; ?>" class="navbar-brand"><img src="<?php echo $this->request->webroot."images/website/AroCrowdfund.png";?>" alt="Logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="main-menu">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php echo ($this->request->params['action'] == 'home' ) ?  "active" : ''; ?>">
						<a class="nav-link" href="<?php echo $this->request->webroot . "users/home"; ?>">Home</a>
					</li>
					<li class="nav-item <?php echo ($this->request->params['action'] == 'howitworks' ) ?  "active" : ''; ?>" >
						<a class="nav-link" href="<?php echo $this->request->webroot . "staticpages/howitworks"; ?>">How it works</a>
					</li>
					<li class="nav-item <?php echo ($this->request->params['action'] == 'invest' ) ?  "active" : ''; ?>">
						<a class="nav-link" href="<?php echo $this->request->webroot ?>campaigns/invest">Invest</a>
					</li>

					<?php if(!$loggeduser){ ?>  
						<li class="nav-item <?php echo ($this->request->params['action'] == 'login' ) ?  "active" : ''; ?>">
							<a class="nav-link" href="<?php echo $this->request->webroot ?>users/login">Get Funded</a>
						</li>
					<?php }else{?>
						<li class="nav-item <?php echo ($this->request->params['action'] == 'getfunded' ) ?  "active" : ''; ?>">
						<a class="nav-link" href="<?php echo $this->request->webroot ?>campaigns/getfunded">Get Funded</a>
						</li>
					<?php } ?>

					<?php if(!$loggeduser){ ?>  
						<li class="nav-item <?php echo ($this->request->params['action'] == 'add' ) ?  "active" : ''; ?>">
							<a class="nav-link" href="<?php echo $this->request->webroot ?>users/add">Register</a>
						</li>
						<li class="nav-item <?php echo ($this->request->params['action'] == 'login' ) ?  "active" : ''; ?>">
							<a class="nav-link" href="<?php echo $this->request->webroot ?>users/login">Login</a>
						</li>
					<?php }else{?>
						<li class="nav-item avatar">
						<?php if($loggeduser['image'] != ''){  ?>  
							<a class="nav-link" href="<?php echo $this->request->webroot ?>users/myaccount">  
								<img src="<?php echo $this->request->webroot."images/users/".$loggeduser['image'] ?>">
							</a>
							<?php }else{  ?>
								<a class="nav-link" href="<?php echo $this->request->webroot ?>users/myaccount"> 
							<img src="<?php echo $this->request->webroot."images/users/noimage.png"?>">
							</a>
                        <?php } ?>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo $this->request->webroot ?>users/logout">Sign Out</a>
						</li>
					<?php } ?>  

				</ul>
			</div>
		</div>
	</nav>
</header><!--/.header-->

<!--------banner section------->
<?= $this->fetch('content') ?>      
<!-----------footer-section--------------> 


<section class="client-sec">
		<div class="container">
			<div class="row">
				<div class="cust-col-5">
					<div class="inner-sec">
						<img src="<?php echo $this->request->webroot."images/website/Logo-one.png";?>" alt="Logo">
					</div>
				</div>
				<div class="cust-col-5">
					<div class="inner-sec">
						<img src="<?php echo $this->request->webroot."images/website/Logo-Two.png";?>" alt="Logo">
					</div>
				</div>
				<div class="cust-col-5">
					<div class="inner-sec">
						<img src="<?php echo $this->request->webroot."images/website/Logo-Three.png";?>" alt="Logo">
					</div>
				</div>
				<div class="cust-col-5">
					<div class="inner-sec">
						<img src="<?php echo $this->request->webroot."images/website/Logo-one.png";?>" alt="Logo">
					</div>
				</div>
				<div class="cust-col-5">
					<div class="inner-sec">
						<img src="<?php echo $this->request->webroot."images/website/Logo-Two.png";?>" alt="Logo">
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</section><!--/.Client-Section-->
</section><!--/.main-content-->
<footer class="st-footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="contact-sec">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<div class="inner-sec">
								<div class="icon-sec">
									<img src="<?php echo $this->request->webroot."images/website/foot-phone.svg";?>" alt="Phone">
								</div>
								<h5>Phone</h5>
								<p><?php echo $globalsettings[0]->meta_value; ?></p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<div class="inner-sec">
								<div class="icon-sec">
									<img src="<?php echo $this->request->webroot."images/website/foot-address.svg";?>" alt="Phone">
								</div>
								<h5>Address</h5>
								<p><?php echo $globalsettings[2]->meta_value; ?></p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<div class="inner-sec">
								<div class="icon-sec">
									<img src="<?php echo $this->request->webroot."images/website/foot-email.svg";?>" alt="Phone">
								</div>
								<h5>Email</h5>
								<p><?php echo $globalsettings[1]->meta_value; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
				<div class="foot-link">
					<h6>Quick Links</h6>
					<ul>
						<li><a href="<?php echo $this->request->webroot . "users/home"; ?>">Home</a></li>
						<li><a href="<?php echo $this->request->webroot . "staticpages/howitworks"; ?>">How it works</a></li>
						<li><a href="#">Invest</a></li>
						<li><a href="#">Get Funded</a></li>
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
				<div class="foot-link">
					<h6>About Us</h6>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
				<div class="foot-link">
					<h6>Just Giving</h6>
					<ul>
						<li><a href="<?php echo $this->request->webroot . "staticpages/term"; ?>">Terms of Use</a></li>
						<li><a href="<?php echo $this->request->webroot . "staticpages/privacy"; ?>">Privacy Policy</a></li>
						<li><a href="<?php echo $this->request->webroot . "staticpages/contact"; ?>">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
				<div class="social-link">
					<h6>Follow Us</h6>
					<ul>
						<li><a href="<?php echo $globalsettings[3]->meta_value; ?>"><img src="<?php echo $this->request->webroot."images/website/foot-facebook.svg";?>" alt="Facebook"></a></li>
						<li><a href="<?php echo $globalsettings[4]->meta_value; ?>"><img src="<?php echo $this->request->webroot."images/website/foot-linked.svg";?>" alt="Linked In"></a></li>
						<li><a href="<?php echo $globalsettings[5]->meta_value; ?>"><img src="<?php echo $this->request->webroot."images/website/foot-twitter.svg";?>" alt="Twitter"></a></li>
						<li><a href="<?php echo $globalsettings[7]->meta_value; ?>"><img src="<?php echo $this->request->webroot."images/website/foot-youtube.svg";?>" alt="Youtube"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-sec"> 
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="inner-sec">
						<p>Copyright &copy; 2018. All Rights Reserved</p> 
					</div>
				</div>
			</div>
		</div>
	</div>

</footer><!--/st-footer-->
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script type="text/javascript" src="<?php echo $this->request->webroot."js/jquery-3.3.1.slim.min.js";?>"></script> -->
<script type="text/javascript" src="<?php echo $this->request->webroot."js/popper.min.js";?>"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot."js/bootstrap.min.js";?>"></script>
<!-- Swiper Slider JavaScript Include Here -->
<script type="text/javascript" src="<?php echo $this->request->webroot."js/swiper.min.js";?>"></script>
<script>
	var swiper = new Swiper('.get-founded-sec .swiper-container', {
		slidesPerView: 3,
		spaceBetween: 30,
		autoplay: {
			delay: 5000,
		},
		// Responsive breakpoints
		breakpoints: {
			// when window width is <= 992px
			992: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			// when window width is <= 992px
			640: {
				slidesPerView: 1,
				spaceBetween: 10
			},
		}
	});
	var swiper = new Swiper('.upcoming-cam .swiper-container', {
		slidesPerView: 3,
		spaceBetween: 30,
		autoplay: {
			delay: 5000,
		},
		// Responsive breakpoints
		breakpoints: {
			// when window width is <= 992px
			992: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			// when window width is <= 992px
			640: {
				slidesPerView: 1,
				spaceBetween: 10
			},
		}
	});
	var swiper = new Swiper('.past-cam .swiper-container', {
		slidesPerView: 3,
		spaceBetween: 30,
		autoplay: {
			delay: 5000,
		},
		// Responsive breakpoints
		breakpoints: {
			// when window width is <= 992px
			992: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			// when window width is <= 992px
			640: {
				slidesPerView: 1,
				spaceBetween: 10
			},
		}
	});
	var swiper = new Swiper('.ongoing-cam .swiper-container', {
		slidesPerView: 3,
		spaceBetween: 30,
		autoplay: {
			delay: 5000,
		},
		// Responsive breakpoints
		breakpoints: {
			// when window width is <= 992px
			992: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			// when window width is <= 992px
			640: {
				slidesPerView: 1,
				spaceBetween: 10
			},
		}
	});
	// Add or Remove Class 
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		if (scroll >= 567) {
			$(".main-header").addClass("darkHeader");
		} else {
			$(".main-header").removeClass("darkHeader");
		}
	});

	  $(document).ready(function(){ 
                $('.flash-msg').delay(5000).fadeOut('slow');
        });
</script>
</body>
</html>