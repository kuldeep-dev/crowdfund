<section class="get_funded-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="head-sec">
						<div class="top-sec">
                            <h5>Campaigns</h5>
                            <?php if(!$loggeduser){ ?>  
                                <a href="<?php echo $this->request->webroot . "users/login"; ?>" class="btn btn-primary btn-dark ml-auto">Start Campaign</a>
					        <?php }else{?>
                                <a href="<?php echo $this->request->webroot . "campaigns/add"; ?>" class="btn btn-primary btn-dark ml-auto">Start Campaign</a>
                            <?php } ?> 
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

                         <section class="invest-section">
                        <div class="container">
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
                </section>               

                    </div>
                </div>
			</div>
		</div>
    </section><!--/.get_funded-page-->
    
    <script>
		$('#category').change(function() {    
            var item=$(this);
            var id = btoa(item.val());
    		//alert(id);
			window.location.href = "<?php  echo $this->request->webroot ?>campaigns/invest/"+id;
		});
	</script>