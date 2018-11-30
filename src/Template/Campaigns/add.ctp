<style>
	.not-active {
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
}
</style>
<section class="invest-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tab-menu setup-panel">
						<ul class="nav nav-tabs">
							<li class="nav-item ">
								<a class="nav-link active not-active" data-toggle="tab" href="#step-1">1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link not-active" data-toggle="tab" href="#step-2">2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link not-active" data-toggle="tab" href="#step-3">3</a>
							</li>
						</ul>
					</div>
					<div class="tab-content-outer">
						<form id="invest-form" class="invest-form" enctype="multipart/form-data" method="post" action="#">
							<div class="tab-content">
								<div class="tab-pane setup-content active" id="step-1">
									<div class="head-sec">
										<h5>Basic Information</h5>
									</div>
									<div class="body-sec">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 m-auto">		
												<div class="form-wrap">
													<div class="form-group">
														<label>Name of your Project</label>
														<input type="text" id="" class="form-control" name="name" value="" placeholder="Project Hanks">
														<?php echo $this->Form->error('name', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													<h5>Sharing your Project</h5>
													<div class="form-group">
														<label>Project Facebook Page URL</label>
														<input type="text" id="" class="form-control" name="facebook_url" value="" placeholder="https://www.facebook.com/">
														<?php echo $this->Form->error('facebook_url', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													<div class="form-group">
														<label>Sharing Message for Facebook</label>
														<textarea id="" class="form-control" name="facebook_message" value="" placeholder="Message"></textarea>
														<?php echo $this->Form->error('facebook_message', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													<div class="form-group">
														<label>Project Twitter Page URL</label>
														<input type="text" id="" class="form-control" name="twitter_url" value="" placeholder="https://www.twitter.com/">
														<?php echo $this->Form->error('twitter_url', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													<div class="form-group">
														<label>Sharing Message for Twitter</label>
														<textarea id="" class="form-control" name="twitter_message" value="" placeholder="Message"></textarea>
														<?php echo $this->Form->error('twitter_message', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													<h5>Extra Funding</h5>
													<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
													<div class="form-group form-check">
														<label class="form-check-label">
															<input type="checkbox" id="" class="form-check-input" name="term_and_condition" value="1">
															<span class="custom-check"></span>
															Allow us to share your project Details with our funding partners so they can explore whether your idea is eligible for extra funding. Details of all our partner funds and their Privacy Policy <a href="<?php echo $this->request->webroot . "staticpages/privacy"; ?>" target="_blank">Here</a>.
														</label>
														<?php echo $this->Form->error('term_and_condition', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
														<p></p>
													</div>
													
													<p>Would you be intrested in finding busioness advisors on croudfunder and working them in exchange for equity?</p>
													<div>
													<div class="form-group form-check form-radio">
														<input type="radio" id="" class="form-check-input" name="business_advisor" value="1">
														<span class="custom-radio"></span>
														<label class="form-check-label">Yes</label>
													</div>
													<div class="form-group form-check form-radio">
														<input type="radio" id="" class="form-check-input" name="business_advisor" value="0">
														<span class="custom-radio"></span>
														<label class="form-check-label">No</label>
														<?php echo $this->Form->error('business_advisor', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													</div>
													

													<h5>Type of organisation</h5>
													<div>
													<?php foreach($organisations as $org){ ?>
													<div class="form-group form-check form-radio">
														<input type="radio" id="" class="form-check-input" name="org_id" value="<?php echo $org['id']; ?>">
														<span class="custom-radio"></span>
														<label class="form-check-label"><?php echo $org['name']; ?></label>
														<?php echo $this->Form->error('org_id', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<?php }?>
													<p></p>
													</div>
													

													<h5>Project Category</h5>
													<div>
													<?php foreach($categories as $cat){ ?>
													<div class="form-group form-check form-radio">
														<label class="form-check-label">
															<input type="checkbox" id="" class="form-check-input" name="cat_id[]" value="<?php echo $cat['id']; ?>">
															<span class="custom-check"></span>
															<?php echo $cat['name']; ?>
														</label>
														<?php echo $this->Form->error('cat_id', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<?php }?>
													<p></p>
													</div>
													
													<h5>Terms of use</h5>
													<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
													<div class="form-group">
														<label>Project Presentation</label>
														<input type="text" id="" class="form-control" name="ppt_link" value="" placeholder="Enter URL">
														<?php echo $this->Form->error('ppt_link', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<div class="form-group">
														<div class="row">
															<div class="xs-12 col-sm-12 col-md-6 col-lg-6">
																<div class="image"><img class="pptthumbimg" src="<?php echo $this->request->webroot."images/website/placeholder.png";?>" alt="Image"></div>
																<div class="btn-file">
																	<input type="file" id="pptthumnail" class="form-control" name="ppt_thumbnail" value="">
																	<span class="custom-btn-file">Upload</span>
																</div>
																<p></p>
															</div>
														</div>
														<?php echo $this->Form->error('ppt_thumbnail', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													
													<div class="form-group btn-group">
														<a class="btn btn-primary nextBtn btn-theme">Save and Continue</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane setup-content" id="step-2">
									<div class="head-sec">
										<h5>Project Page</h5>
									</div>
									<div class="body-sec">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 m-auto">		
												<div class="form-wrap">
													<div class="form-group">
														<label>Add an image to your Project</label>
														<div class="row">
															<div class="xs-12 col-sm-12 col-md-6 col-lg-6">
																<div class="image"><img class="campimage" src="<?php echo $this->request->webroot."images/website/placeholder.png";?>" alt="Image"></div>
																<div class="btn-file">
																	<input type="file" id="campimages" class="form-control" name="image" value="">
																	<span class="custom-btn-file">Upload</span>
																</div>
																<p></p>
															</div>
														</div>
														<?php echo $this->Form->error('image', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>

													<div class="form-group">
														<label>Add a video to your Project</label>
														<input type="text" id="" class="form-control" name="youtube_link" value="" placeholder="Add a Youtube or Vimeo link">
														<?php echo $this->Form->error('youtube_link', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<h5>Your Story</h5>
													<div class="form-group">
														<label>Tell the crowd the aim of your project</label>
														<textarea id="" class="form-control" name="aim" value="" placeholder="Enter project aim"></textarea>
														<?php echo $this->Form->error('aim', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>			

													<div class="form-group">
														<label>Tell your story</label>
														<textarea id="" class="form-control" name="story" value="" placeholder="Story..."></textarea>
														<?php echo $this->Form->error('story', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<h5>Target</h5>
													<div>
													<div class="form-group form-check form-radio">
														<input type="radio" id="" class="form-check-input" name="target" value="1">
														<span class="custom-radio"></span>
														<label class="form-check-label">All or Nothing</label>
													</div>
													<div class="form-group form-check form-radio">
														<input type="radio" id="" class="form-check-input" name="target" value="2">
														<span class="custom-radio"></span>
														<label class="form-check-label">Keep what you raise</label>
														<?php echo $this->Form->error('target', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>
													<div>

													<div class="form-group">
														<label>How much do you want to raise</label>
														<input type="number" min="1" step="0.01" id="" class="form-control" name="raise_amount" value="" placeholder="$0.00">
														<?php echo $this->Form->error('raise_amount', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<div class="form-group">
														<label>Set a stretch target</label>
														<input type="number" min="1" step="0.01" id="" class="form-control" name="stretch_target" value="" placeholder="$0.00">
														<?php echo $this->Form->error('stretch_target', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<div class="form-group">
														<label>What will you do with extra money</label>
														<textarea id="" class="form-control" name="extra_money" value="" placeholder="Description..."></textarea>
														<?php echo $this->Form->error('extra_money', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													
													<h5>Company Keywords</h5>
													<div class="form-group">
														<label>Enter Keywords</label>
														<input type="text" id="" class="form-control" name="keywords" value="" placeholder="Enter Keywords">
														<?php echo $this->Form->error('keywords', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<div class="form-group btn-group">
														<a type="button" class="btn btn-primary btn-previous nextBtn prewBtn prewBtn" id="step2" data-id="2">Previous</a>
														<a type="button" class="btn btn-primary btn-theme nextBtn submit" >Save and Continue</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	

								<div class="tab-pane setup-content" id="step-3">
									<div class="head-sec">
										<h5>Other Details</h5>
									</div>
									<div class="body-sec">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 m-auto">		
												<div class="form-wrap">
													<h5>You Perks</h5>
													<div>
													<?php foreach($perks as $perk){ ?>
													<div class="form-group form-check form-radio">
														<input type="radio" id="" class="form-check-input" name="perks" value="<?php echo $perk['id']; ?>">
														<span class="custom-radio"></span>
														<label class="form-check-label"><?php echo $perk['name']; ?></label>
														<?php echo $this->Form->error('perks', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<?php }?>
													<p></p>
													</div>


													<h5>Project Schedule</h5>
													<div class="form-group">
														<label>How long do you want to run for?</label>
														<select class="form-control" name="duration">
														<option disabled selected>Project duration</option>  
														<?php 
															for($i=1; $i<=12; $i++)
															{
																echo "<option value=".$i.">".$i." "."Months"."</option>";
															}
															?> 
																 
														</select>
														<?php echo $this->Form->error('duration', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<div class="form-group">
														<label>Schedule a go live date</label>
														<input type="date" id="" class="form-control" name="live" value="" placeholder="dd/mm/yyyy">
														<?php echo $this->Form->error('live', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
													</div>
													<p></p>

													<h5>Deal Type</h5>

													<div class="form-group form-check radio-sec">
													<?php foreach($deals as $deal){ ?>
														<div class="radio-inner">
															<input class="form-check-input" type="radio" name="deal_id" id="<?php echo $deal['name']; ?>" value="<?php echo $deal['id']; ?>">
															<label class="form-check-label" for="<?php echo $deal['name']; ?>">
																<span class="icon">
																<?php echo $this->Html->Image('/images/categories/' . $deal->image, array('alt' =>$deal->name, 'class' => 'image')); ?>
																</span>
																<span class="text"><?php echo $deal['name'] ?></span>
															</label>
														</div>
													<?php } ?>
														<?php echo $this->Form->error('deal_id', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
														<p></p>
													</div>

													<div class="form-group btn-group">
														<a class="btn btn-primary btn-previous nextBtn prewBtn" id="step3" data-id="3">Previous</a>
														<button type="submit" class="btn btn-primary nextBtn btn-theme">Submit</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>


<script type="text/javascript">

function progress(href){
    $('div.setup-panel div a').removeClass('btn-success');
    $('div.setup-panel div a[href="#'+href+'"]').addClass('btn-success');
}

function hideshow(hide, show){
    $(hide).hide();
    $(show).show();
}
$('.prewBtn').click(function(){
	var step = $(this).attr('data-id');
    hideshow("#step-"+step, "#step-"+parseInt(step-1));
    progress('step-'+parseInt(step-1));
});

</script>

	<script>
/*** Vaildation Start ***/
var step1 = $("#invest-form").validate({
     rules:{
		name: "required",
		facebook_url: "required",
		facebook_message: "required",
		twitter_url: "required",
		twitter_message: "required",
		term_and_condition: "required",
		business_advisor: "required",
		cat_id: "required",
		org_id: "required",
		ppt_link:"required",
		ppt_thumbnail:"required",
		image:"required",
		youtube_link:"required",
		aim:"required",
		story:"required",
		target:"required",
		raise_amount:"required",
		stretch_target:"required",
		extra_money:"required",
		keywords:"required",
		perks:"required",
		duration:"required",
		live:"required",
		deal_id:"required",
    },
     messages:{
		name: "Project name is required",
		facebook_url: "Facebook page url is required",
		facebook_message: "Facebook message is required",
		twitter_url: "Twitter url is required",
		twitter_message: "Twitter message is required",
		term_and_condition: "Please allow term and condition",
		business_advisor: "This field is required",
		cat_id: "Please select campaign category",
		org_id: "please select organisation type",
		ppt_link: "Please enter your PPT link",
		ppt_thumbnail : "Please upload PPT thumbnail",
		image:"Please upload image",
		youtube_link : "Please enter youtube link",
		aim:"Please enter your campaign aim",
		story:"Please enter your story",
		target:"Please enter campaign target",
		raise_amount:"Please enter raise amount",
		stretch_target:"Please enter stretch target amount",
		extra_money:"Please enter what you want extra amount",
		keywords:"Please enter your keywords",
		perks:"Please select perks",
		duration:"Please enter time duration",
		live:"Please enter go live date",
		deal_id:"Please select deal type",
    },
	errorElement : 'p',
    errorLabelContainer: '.errorTxt',
	errorPlacement: function(error, element) {
		//console.log(element[0].name);
		if(element[0].name == 'business_advisor' || element[0].name == 'org_id' || element[0].name == 'ppt_thumbnail' || element[0].name == 'target' || element[0].name == 'image' || element[0].name == 'perks' || element[0].name == 'deal_id' )
		{
			$(element).parent().parent().find('p').html(error);
		}else if (element[0].name == 'cat_id'){
			$(element).parent().parent().parent().find('p').html(error);
		}else{
            $(element).parent().next('p').html(error);
		}
        }
});
$("#step-1 a").click(function({}) {
    if(step1.form()){
		$("#step-1").removeClass("active");
		$("ul").find("[href='#step-1']").removeClass("active");
		$("#step-2").addClass("active");
		$("ul").find("[href='#step-2']").addClass("active");
        hideshow('#step-1', '#step-2');
        progress("step-2");
    }
});
/*------------*/

var step2 = $("#invest-form").validate();
$("#step-2 .submit").click(function(event) {
    if(step2.form()){
		$("#step-2").removeClass("active");
		$("ul").find("[href='#step-2']").removeClass("active");
		$("#step-3").addClass("active");
		$("ul").find("[href='#step-3']").addClass("active");
        hideshow('#step-2', '#step-3');
        progress("step-3");
    }
});
/*** Validation End ****/


$("#step3").click(function(event) {
		$("#step-3").removeClass("active");
		$("ul").find("[href='#step-3']").removeClass("active");
		$("#step-2").addClass("active");
		$("ul").find("[href='#step-2']").addClass("active");
        hideshow('#step-3', '#step-2');
        progress("step-2");
});

$("#step2").click(function(event) {
		$("#step-2").removeClass("active");
		$("ul").find("[href='#step-2']").removeClass("active");
		$("#step-1").addClass("active");
		$("ul").find("[href='#step-1']").addClass("active");
        hideshow('#step-2', '#step-1');
        progress("step-1");
});


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.pptthumbimg').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#pptthumnail").change(function() {
  readURL(this);
});

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.campimage').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#campimages").change(function() {
  readURL2(this);
});



</script>