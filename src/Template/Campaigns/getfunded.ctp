<section class="get_funded-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="head-sec">
						<div class="top-sec">
							<h5>Campaign Management</h5>
							<a href="<?php echo $this->request->webroot . "campaigns/add"; ?>" class="btn btn-primary btn-dark ml-auto">Start Campaign</a>
						</div>
						<div class="bottom-sec">
							<div class="right-sec ml-auto">
								<div class="input-group">
									<select class="form-control" id="category">
									<option selected disabled>Categories</option>
									<?php foreach($categories as $cat){ ?>
										<option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
									<?php }	?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="body-sec upcoming-cam">
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
											<p><?php echo substr($camp['aim'],0,100); ?></p>
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
						</div>
					</div>
				</div>
			</div>

		</div>
	</section><!--/.get_funded-page-->

	<script>
		$('#category').change(function() {    
			var item=$(this);
			var id = btoa(item.val());
    		//alert(item.val())
			window.location.href = "<?php echo $this->request->webroot ?>campaigns/getfunded/"+id;
		});
	</script>