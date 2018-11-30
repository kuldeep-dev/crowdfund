<section class="main-content">
	<section class="banner-section">
		<div id="main-carousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">

				<?php if(count($frontbanners) > 1) {
					$i =0;
        			foreach($frontbanners as $slide){  ?>
					<li data-target="#main-carousel" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active' : '' ; ?>"></li>
        			<?php $i++; } } ?>
			</ol>

			<div class="carousel-inner">
			<?php if(count($frontbanners) > 1) {
				$i =1;
        foreach($frontbanners as $slide){  ?>
			<div class="carousel-item <?php echo $i == 1 ? 'active' : '' ; ?>">
			<?php echo $this->Html->Image("../images/website/".$slide->image, array('width' => 1366, 'height' => 567, 'alt' =>$slide->name, 'class' => 'image')); ?>	
					<div class="overlay"></div>
					<div class="carousel-caption">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">								
									<h1>Make good things happen</h1>
									<p>Join over 22 million people supporting charity and personal causes</p>
									<a href="#" class="btn btn-theme">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
        <?php $i++; } } else{ ?>
			<div class="carousel-item">
					<img src="<?php echo $this->request->webroot."images/website/slide.png";?>" alt="First Slide">	
					<div class="overlay"></div>
					<div class="carousel-caption">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">								
									<h1>Make good things happen</h1>
									<p>Join over 22 million people supporting charity and personal causes</p>
									<a href="#" class="btn btn-theme">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
       <?php } ?>
			
				

			</div>
		</div>
		<div class="clear"></div>
	</section><!--/.Banner-Section-->
	<section class="how-it-works-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 m-auto">
					<div class="inner-sec">
						<div class="head-sec">
							<h3>How it works</h3>
							<p>FOUR SIMPLE INSTRUMENTS TO GROW  YOUR BUSINESS</p>
						</div>
						<div class="content-part">
							<p>Moluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. No matter how many times your amazing, absolutely brilliant - Lorem ipsum dolor sit amet, vix an natum labitur eleifend, mel amet a laoreet menandri</p>
							<div class="status-part">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
										<div class="card-sec">
											<div class="card-icon">
												<img src="<?php echo $this->request->webroot."images/website/dollar.png";?>" alt="Icon">
											</div>
											<div class="card-content">
												<h6>
												<?php 
													function nice_number($n) {
														// first strip any formatting;
														$n = (0+str_replace(",", "", $n));

														// is this a number?
														if (!is_numeric($n)) return false;

														// now filter it;
														if ($n > 1000000000000) return round(($n/1000000000000), 2).' trillion';
														elseif ($n > 1000000000) return round(($n/1000000000), 2).' billion';
														elseif ($n > 1000000) return round(($n/1000000), 2).' million';
														elseif ($n > 1000) return round(($n/1000), 2).' thousand';

														return number_format($n);
													} ?>
													
													
													<?php 
												$result = 0;
												foreach ($invest as $amount) {
													$value = $amount['amount'];
													$result += $value;
												}
												echo nice_number($result);?> +</h6>
												<p>Raised</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
										<div class="card-sec">
											<div class="card-icon">
												<img src="<?php echo $this->request->webroot."images/website/user.png";?>" alt="Icon">
											</div>
											<div class="card-content">
												<h6><?php echo count($users); ?>+</h6>
												<p>Supporters</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
										<div class="card-sec">
											<div class="card-icon">
												<img src="<?php echo $this->request->webroot."images/website/bell.png";?>" alt="Icon">
											</div>
											<div class="card-content">
												<h6><?php echo count($allcampaigns); ?>+</h6>
												<p>Fundraiser</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
										<div class="card-sec">
											<div class="card-icon">
												<img src="<?php echo $this->request->webroot."images/website/contact.png";?>" alt="Icon">
											</div>
											<div class="card-content">
												<h6><?php echo $globalsettings[0]->meta_value; ?></h6>
												<p>Contact</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="clear"></div>
	</section><!--/.how-it-works-sec-->
	<section class="newsletter-sec">
	<img src="<?php echo $this->request->webroot."images/website/news-back.png";?>" class="bg-image" alt="Background">
	<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 m-auto">
					<div class="inner-sec">
						<div class="head-sec">
							<h3>Newsletter</h3>
						</div>
						<div class="content-part">
							<form class="form-newsletter" name="" method="post" action="">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><img src="<?php echo $this->request->webroot."images/website/newsletter.png";?>" alt="Icon"></span>
									</div>
									<input type="email" class="form-control" name="" value="" placeholder="ex. kuldeepjha@avainfotech.com">
								</div>
								<div class="btn-sec">
									<input type="submit" class="btn btn-theme" value="Subscribe">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</section><!--/.newsletter-sec-->
	<section class="browse-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="head-sec">
						<h3>BROWSE FUNDRAISER</h3>
						<p>Moluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat<br />cupidatat non proident, sunt in culpa qui officia deserunt</p>
					</div>
				</div>
			</div>
			<div class="row">
				
			<?php foreach($categories as $cate){  ?>
				<div class="cust-col-5">
					<div class="inner-sec">
						<img src="<?php echo $this->request->webroot."images/website/categories.png";?>" alt="Image">
						<div class="overlay">
							<a href="<?php echo $this->request->webroot ?>campaigns/invest/<?php echo base64_encode($cate['id']) ?>"><h5><?php echo $cate['name'] ?></h5></a>
						</div>
					</div>
				</div>
			<?php } ?>	
				
			</div>
		</div>
		<div class="clear"></div>
	</section><!--/.browse-sec-->

<?php if($loggeduser){  ?>
	<section class="get-founded-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="head-sec">
						<h3>Get Funded</h3>
						<p>Moluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <br />cupidatat non proident, sunt in culpa qui officia deserunt</p>
					</div>
				</div>
			</div>
			<!-- Swiper Slider HTML Include Here -->
			<div class="swiper-container">
				
			<div class="swiper-wrapper">

					<?php if(!empty($ongoingcampaigns)){
							foreach($ongoingcampaigns as $camp){ ?>

						<div class="swiper-slide">
									<div class="inner-sec">
										<div class="img-wrap">
											<img src="<?php echo $this->request->webroot."images/campaign/".$camp['image'];?>" alt="<?php echo $camp['name']; ?>">
										</div>
										<div class="content-sec">
											<h6><?php echo $camp['name']; ?></h6>
											<p><?php  echo substr($camp['aim'],0,100); ?></p>
											<?php 
											$result = 0;
											foreach ($camp['invests'] as $amount) {
												$value = $amount['amount'];
												$result += $value;
											}
											$percentage = $result;
											$totalWidth = $camp['raise_amount'];
											$new_width = number_format((($percentage / $totalWidth) * 100),2) ;?>
											<div class="progress">
												<div class="progress-bar" style="width:<?php echo $new_width ?>%"><span><?php echo $new_width ?>%</span></div>
											</div>
											<div class="founded-info">
												<span>Raised: $<?php echo $camp['raise_amount']; ?></span>
												<span>Deal: <?php echo $camp['deal']['name']; ?></span>
												<span>Investor: <?php echo count($camp['invests']); ?></span>
											</div>
											<div class="btn-sec">
												<a href="<?php echo $this->request->webroot . "campaigns/campaignupdate/". base64_encode($camp['id']); ?>" class="btn btn-theme">Get Funded</a>
											</div>
										</div>
									</div>
								</div><!--/.Slide End Here -->

					<?php } } else {?>
						<div class="swiper-slide">
							<div class="inner-sec">
								<div class="img-wrap">
									<img src="<?php echo $this->request->webroot."images/website/notfound.jpg";?>" alt="Image">
								</div>
							</div>
						</div><!--/.Slide End Here -->
					<?php	}?> 

					</div>

				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section><!--/.get-founded-sec-->
					<?php }?>

	<section class="invest-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="head-sec">
						<h3>Invest</h3>
						<p>Moluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <br />cupidatat non proident, sunt in culpa qui officia deserunt</p>
					</div>
				</div>
			</div>
			<div class="row">


				<?php if(!empty($campaigns)){
									foreach($campaigns as $camp){ ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <div class="inner-sec">
                                        <div class="img-wrap">
                                        <img src="<?php echo $this->request->webroot."images/campaign/".$camp['image'];?>" alt="<?php echo $camp['name']; ?>">
                                        </div>
                                        <div class="content-sec">
                                            <div class="price-sec">
                                                <a href="<?php echo $this->request->webroot . "campaigns/campaigninfo/". base64_encode($camp['id']); ?>" class="btn btn-theme">Invest</a>
                                                <span>Investment:$<?php echo $camp['raise_amount']; ?></span>
                                            </div>
                                            <h6><?php echo $camp['name']; ?></h6>
                                            <p><?php echo substr($camp['aim'],0,100); ?></p>
                                        </div>
                                    </div>
								</div>
                                <?php } } else {?>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                        <div class="inner-sec">
                                            <div class="img-wrap">
                                                <img src="<?php echo $this->request->webroot."images/website/notfound.jpg";?>" alt="Banner">
                                            </div>
                                        </div>
                                    </div>
						        <?php	}?>    								
			</div>
		</div>
		<div class="clear"></div>
  </section><!--/.invest-section-->