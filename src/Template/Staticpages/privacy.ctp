<section class="subbanner-sec">
		<img src="<?php echo $this->request->webroot."images/website/privacypolicy.png";?>" alt="Banner">
		<div class="overlay">
			<h1>Privacy Policy</h1>
		</div>
	</section><!-- Banner Section-->
	<section class="how-it-works-sec page-howit">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="inner-sec">
						<div class="head-sec">
						</div>
						<div class="content-part">
							<p>
                            <?php if ($privacy->content) {
                            echo $privacy->content;
                            } ?>
                            </p>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="clear"></div>
	</section><!--/.how-it-works-sec-->