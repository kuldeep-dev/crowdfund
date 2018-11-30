<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({appId: '2032239723465223', status: true, cookie: true,
xfbml: true});
};
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol +
'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
</script>
<section class="campaign-list-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="sign-flash">
              <?= $this->Flash->render() ?>   
              </div>
					<div class="outer-box">
						<p><?php if(isset($campaign['name'])){ echo $campaign['name']; } ?></p>
						<div class="share-sec">
							<h5>Shares</h5>
							<ul class="social-share">
								<li>
									<a class="fb-icon" id="share_fb" href="javascript:void(0)"><img src="<?php  echo $this->request->webroot."images/website/foot-facebook.svg";?>" alt="Facebook">			</a>				
								</li>
								<li>
								<a class="tweet-icon" href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=<?php echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&pubid=ra-42fed1e187bae420&title=<?php echo $campaign['name'] ?>&ct=1" target="_blank">
							
								<img src="<?php echo $this->request->webroot."images/website/foot-twitter.svg";?>" alt="Twitter"></a></li>
							</ul>
						</div>
						<div class="slider-sec">
							<div class="full-swiper">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
									<?php echo $this->Html->Image("../images/campaign/".$campaign['image'], array('alt' =>$campaign['name'], 'class' => 'image')); ?>
									</div>
								</div>
								<!-- Add Pagination -->
								<div class="swiper-pagination"></div>
							</div>
						</div>
						<div class="tab-sec">
							<div class="tab-menu">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#story">Story</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#updates">Updates</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#ask-queries">Ask Queries</a>
									</li>
								</ul>
							</div>
							<div class="tab-content-outer">
								<div class="tab-content">
									<div class="tab-pane active" id="story">
										<div class="img-banner">
											<img src="<?php echo $this->request->webroot."images/campaign/".$campaign['ppt_thumbnail'];?>" alt="<?php echo $campaign['ppt_thumbnail']; ?>">
										</div>
										<p><?php if(isset($campaign['aim'])){ echo $campaign['aim']; } ?></p>
										<div class="img-banner">
											<?php 
											$link = $campaign['youtube_link'];
											$arr=explode('v=',$link);

											?>
											<iframe width="670" height="390" src="https://www.youtube.com/embed/<?php echo $arr[1] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
										<p><?php if(isset($campaign['story'])){ echo $campaign['story']; } ?></p>
                                    </div>
                                    
									<div class="tab-pane" id="updates">
										<?php foreach ($campaign['updates'] as $updates){ ?>				
                                        <div class="notes-outer">
											<div class="date_time">
												<h6 class="date"><?php echo date('d F, Y', strtotime($updates['created'])); ?></h6>
											</div>
											<div class="body">
												<div class="content-part">
													<p><?php echo $updates['updates'] ?></p>
												</div>
											</div>
                                        </div>
											<?php } ?>


                                        <div class="notes-outer">
											<div class="body">
												<div class="content-part">	

												<?= $this->Form->create(null, ['type' => 'file','id' => 'update-form' , 'class'=>'']) ?>  
					
													<div class="form-group">
														<?php echo $this->Form->control('updates', ['placeholder'=>'Write your message here','class' => 'form-control','type'=>'textarea','rows'=>3,'label'=> false]); ?> 
														
													</div>
													<input type="hidden" name="camp_id" value="<?php echo $campaign['id']?>" />

													<div class="btn-sec">
														<button type="button" id="updatesdata" class="btn btn-primary btn-theme">Save</button>
													</div>
												
												<?= $this->Form->end() ?>
                                                    
												</div>
											</div>
										</div>
                                        
                                    </div>
                                    
									<div class="tab-pane" id="ask-queries">
										<div class="queries-wrapper">
											<div class="accordion" id="queriesaccordian">
											<?php 
											$a = 0;
											foreach($campaign['faqs'] as $faqs){ 
												$a++ ;  ?>
												<div class="card">
													<div class="card-header" id="headingOne">
														<h6>
															<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#data<?php echo $faqs['id'] ?>" aria-expanded="true" aria-controls="<?php echo $faqs['id'] ?>">
																Q<?php echo $a ?>. <?php echo $faqs['question'] ?> ?
															</button>
														</h6>
													</div>

													<div id="data<?php echo $faqs['id'] ?>" class="collapse" aria-labelledby="heading<?php echo $faqs['id'] ?>" data-parent="#queriesaccordian">
														<div class="card-body">
														Ans. <?php echo $faqs['answer'] ?>
														</div>
													</div>
                                                </div>
											<?php } ?>	

												<?= $this->Form->create(null, ['type' => 'file','id' => 'ask-queriesdata' , 'class'=>'']) ?>  

												<div class="form-group">
													<?php echo $this->Form->control('question', ['class' => 'form-control' ,'placeholder'=>'Write your question here.' , 'label'=> false]); ?> 
													
												</div>

												<div class="form-group">
													<?php echo $this->Form->control('answer', ['placeholder'=>'Write your answer here.','class' => 'form-control','type'=>'textarea','rows'=>3,'label'=> false]); ?> 													
												</div>

												<input type="hidden" name="camp_id" value="<?php echo $campaign['id']?>" />

												<div class="btn-sec">
													<button type="button" id="questionqueries" class="btn btn-primary btn-theme">Save</button>
												</div>
											
											<?= $this->Form->end() ?>
											</div>
										</div>
                                    </div>
                                    
								</div><!--/.-->
								<div class="form-outer">
								<form method="post" id="payment" action="<?php echo $this->request->webroot."invests/payment";?>" >
									<div class="form-group">
										<input type="hidden" name="user_id" value="<?php echo $campaign['user_id']; ?>"/>
										<input type="hidden" name="camp_id" value="<?php echo $campaign['id']; ?>"/>
										<input type="hidden" name="payment_mode" value="paypal"/>
										<input type="number" name="amount" placeholder="$2500" class="form-control"/>
										<label for="amount"></label>
										<?php if(!$loggeduser){ ?>  
											<a href="<?php echo $this->request->webroot . "users/login"; ?>" class="btn btn-primary btn-theme ml-auto">Invest</a>
										<?php }else{?>
											<button type="submit" class="btn btn-primary btn-theme">Invest</button>
										<?php } ?> 
										</div>
									</form>
								</div>
								<?php if($loggeduser['id'] != $campaign['user_id']){ ?>  
								<div class="btn-sec"> 
									<button type="button" class="btn btn-primary btn-black" data-toggle="modal" data-target="#contactorganizer">Contact Organizer</button>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div><!--/.col-xs-12 col-sm-12 col-md-8 col-lg-8 -->
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="sidebard">
						<div class="raise-campaign">
							<p class="price">$<?php 
							$result = 0;
							foreach ($campaign['invests'] as $amount) {
								$value = $amount['amount'];
								$result += $value;
							}
							echo $result ;
							?></p>
							<p class="goal">Raised of $<?php if(isset($campaign['raise_amount'])){ echo $campaign['raise_amount']; } ?> goal</p>
							<?php 
								$percentage = $result;
								$totalWidth = $campaign['raise_amount'];
								$new_width = number_format((($percentage / $totalWidth) * 100),2) ;?>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: <?php echo $new_width ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span><?php echo $new_width ?>%</span></div>
							</div>
							<div class="supporter_time">
								<span><?php echo count($campaign['invests']); ?> Supporters</span>
								<span> 
								<?php

									//Convert to date
									$datestr =  $campaign['end_date'];//Your date
									$date=strtotime($datestr);//Converted to a PHP date (a second count)
									//Calculate difference
									$diff=$date-time();//time returns current time in seconds
									$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)

									//Report
									echo "$days"; ?> days to go</span>
							</div>
							<div class="btn-sec">
							<?php //print_r($campaign); ?>
							<?php if(!$loggeduser){ ?>  
                                <a href="<?php echo $this->request->webroot . "users/login"; ?>">Raise Campaign</a>
					        <?php }else{?>
                                <a href="<?php echo $this->request->webroot . "campaigns/add"; ?>" >Raise Campaign</a>
                            <?php } ?> 			
							</div>
						</div>
					<div class="supporter">
							<h6>Supporters (<?php echo count($campaign['invests']) ?>)</h6>
							<div class="supporter_list">
								<ul>
									<?php foreach ($campaign['invests'] as $supporter) {?>
										<li>
											<span class="supporter-avatar">
												<?php if($supporter['user']['image'] != ''){ ?>
												<img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $supporter['user']['image']; ?>" class="previewHolder"/>
												<?php }else{ ?>
												<img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" class="previewHolder"/>
												<?php } ?>
											</span>
											<p><?php echo $supporter['user']['name'] ?> Invested <span class="price">$<?php echo $supporter['amount'] ?></span></p>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="btn-sec">
						<?php if($loggeduser['id'] == $campaign['user_id']){ ?>  
							<a href="<?php echo $this->request->webroot . "campaigns/edit/". base64_encode($campaign['id']); ?>" class="btn btn-primary btn-theme">Edit</a>
							<button type="button" id="deletecampaign" class="btn btn-dark btn-gray">Delete</button>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</section>


	
<script type="text/javascript">
$(document).ready(function(){
$('#share_fb').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
title: '<?php echo $campaign['name']; ?>',
link: '<?php echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>',
image: 'https://gurpreet.gangtask.com/crowdfunding/images/campaign/1542265748BlessingsInnerChild.jpg',
image: 'https://gurpreet.gangtask.com/crowdfunding/images/campaign/<?php echo $campaign['image']; ?>',
//caption: '<?php //echo "Price: $".$product['Product']['price']; ?>',
description: '<?php echo $campaign['story']; ?>'
}); 
});
});
</script>

<script>
	jQuery(document).ready(function() {
			jQuery('#deletecampaign').click(function() {
				swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
						if (result.value) {
							var id = '<?php echo $campaign['id'] ; ?>';
							$.ajax({
									url: '<?php echo $this->request->webroot; ?>campaigns/deletecampaign',
									data: {id:id},
									method: 'post',
									dataType: 'json',
									success: function(data){
										if (data.isSucess == 'false') {
											swal(
												'Error',
												'This campaign could not be deleted. Please, try again.',
												'error'
												)  
										} else {
											swal({
												title: "Success!",
												text: "This campaign has been deleted.",
												type: "success"
											}).then(function() {
												window.location.href = '<?php echo $this->request->webroot; ?>users/mycampaign';
											});
										}
									}
								});  
						}
					})
			})
	})			
</script>

<script>
 var update = jQuery("#update-form").validate({
    rules: {
		updates: "required"
    },
    messages: {
		updates: "Please enter update."
    }
  });

  jQuery('#updatesdata').click(function(){
	  if(update.form()){
		$.ajax({
            url: '<?php echo $this->request->webroot; ?>campaigns/campaignupdatesdata',
            dataType: 'json',
            data: $('#update-form').serialize(),
            method: 'post',
            dataType: 'json',
            success: function(data){ 
				//console.log(data.isSucess);
                if (data.isSucess == 'false') {
                } else {
                        location.reload();
                }
            }
        });           
	  }
  })
</script>   


<script>
 var queries = jQuery("#ask-queriesdata").validate({
    rules: {
		question: "required",
		answer: "required"
    },
    messages: {
		question: "Please enter question",
		answer: "Please enter answer"
    }
  });

  jQuery('#questionqueries').click(function(){
	  if(queries.form()){
		$.ajax({
            url: '<?php echo $this->request->webroot; ?>campaigns/campaignaskqueries',
            dataType: 'json',
            data: $('#ask-queriesdata').serialize(),
            method: 'post',
            dataType: 'json',
            success: function(data){ 
				//console.log(data.isSucess);
                if (data.isSucess == 'false') {
                } else {
                        location.reload();
                }
            }
        });           
	  }
  })
</script>   

 <script> 
    
	$().ready(function() {
		var paymentdata = $("#payment").validate({
			rules: {
				amount: "required",
			},
			messages: {
				amount: "Please enter some amount",
			}
		});
			
	
	});
	
	</script>