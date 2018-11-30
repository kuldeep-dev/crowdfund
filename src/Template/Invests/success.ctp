
<!-- <section class="get_funded-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="head-sec">
						<div class="top-sec">
							<h5>Payment Status</h5>
						</div>
						<div class="row">
					<div class="col-md-12">
						<div class="profile_outer">
							<div class="profile_wrap order-success">
								<div class="col-sm-6 col-sm-offset-3">
					                    <?php if ($response == 'success') { ?>
					                    <div class="order-img">
									<img src="<?php echo $this->request->webroot ?>images/order-success.png" alt="Order Success Image">
									</div>
					                    <h3>Investment Successful</h3>
					                    <div class="order_completed">
					                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
					                    </div>
					                    <h5>Success!</h5>
										<h6><span>Transation ID:</span><?php echo $_GET['tx']; ?></h6>
										<p>You paid <?php echo $invest['amount'] ?> USD to CrowdFunding.com<br/> We'll notify you when we receive the funds</p>
					                    <?php } else { ?>
					                    <h3>Investment Unsuccessful</h3>
					                    <div class="order_completed">
					                        <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
					                    </div>
					                    <?php } ?>

					            </div>
							</div>
						</div>
					</div>
				</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</section> -->
	<!--/.get_funded-page-->

<section class="get_funded-page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="head-sec">
					<div class="top-sec" style="justify-content:center;">
						<h3>Payment Status</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="profile_outer">
					<div class="profile_wrap order-success">
					<?php if ($response == 'success') { ?>
						<div class="order-img">
							<img src="<?php echo $this->request->webroot ?>images/order-success.png" alt="Order Success Image">
						</div>
						<h3 style="margin-bottom: 15px;">Investment Successful</h3>
						<h6><span>Transation ID:</span><?php echo $_GET['tx']; ?></h6>
						<p>You paid <?php echo $invest['amount'] ?> USD to CrowdFunding.com<br/> We'll notify you when we receive the funds</p>
						<?php } else { ?>
					                    <h3 style="margin-bottom: 15px; display:none;">Investment Unsuccessful</h3>
					                    <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--/.get_funded-page-->

