<section class="subbanner-sec">
		<img src="<?php echo $this->request->webroot."images/website/banner-top.png";?>" alt="Banner">
		<div class="overlay">
			<h1>How it Works</h1>
		</div>
</section><!-- Banner Section-->
<section class="how-it-works-sec page-howit">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<div class="inner-sec">
						<div class="head-sec">
						</div>
						<div class="content-part">
							<p><?php if ($howitworks->content) {
		                        echo $howitworks->content;
	                        } ?></p>
						</div>
					</div>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="image-wrap">
						<img src="<?php echo $this->request->webroot."images/website/how-we-work.png";?>" alt="Banner">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 m-auto">
					<div class="inner-sec">
						<div class="content-part">
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
