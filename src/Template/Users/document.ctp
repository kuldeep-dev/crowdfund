<section class="attach-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tab-content-outer">
						<?= $this->Form->create($user, ['id' => 'document-form', 'enctype' => 'multipart/form-data']) ?>
							<div class="head-sec">
								<h5>Document Page</h5>
							</div>
							<div class="body-sec">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">		
										<div class="form-wrap">
											<div class="form-group">
												<label>Attach Document</label>
												<div class="row">
													<div class="xs-12 col-sm-12 col-md-12 col-lg-12">
														<div class="image">

															<?php if($user['document']){ ?>
																<embed class="currentimg" src="https://drive.google.com/viewerng/
																viewer?embedded=true&url=https://gurpreet.gangtask.com<?php echo $this->request->webroot."images/users/documents/".$user['document']; ?>" width="500" height="375">
                        										<?php }else{ ?>
																	<img class="currentimg" src="<?php echo 		$this->request->webroot."images/website/placeholder.png";?>" 	alt="Image">
																<?php } ?>
														</div>
														<div class="btn-file">
														<?php echo $this->Form->control('document', ['label' => false,'type' => 'file','id'=>'img', 'class'=>'form-control','accept'=>'application/pdf ,application/msword,.doc,.docx,' , 'data-msg-accept'=>'Please select only PDF and Doc file.']); ?>
															<span class="custom-btn-file">Add</span>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Company ID</label>
												<?php echo $this->Form->control('company_id', ['type'=>'text', 'class' => 'form-control', 'label' => false,'placeholder'=>'Enter your company ID']); ?>
											</div>
											
											<div class="form-group">
												<label>Profitability Plan link</label>
												<?php echo $this->Form->control('profitability_plan', ['class' => 'form-control', 'label' => false,'placeholder'=>'Enter your profitability plan doc link']); ?>
											</div>
											<div class="form-group">
												<label>Tax Report link</label>
												<?php echo $this->Form->control('tax_report', ['class' => 'form-control', 'label' => false,'placeholder'=>'Tax report doc link']); ?>
											</div>
											<div class="form-group">
												<label>Criminal Registry link</label>
												<?php echo $this->Form->control('criminal_registry', ['class' => 'form-control', 'label' => false,'placeholder'=>'Criminal registry doc link']); ?>
											</div>
											<div class="form-group btn-group">
												<?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary btn-theme']) ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?= $this->Form->end() ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
  
   $(document).ready(function() {
	$("#document-form").validate({  
		ignore: "",
		rules: {
			company_id: {required:true},
			profitability_plan: {required:true},
			tax_report: {required:true},
			criminal_registry: {required:true},
		},
		messages: {
			company_id: "Please enter company id.",
			profitability_plan: "Please enter profitability plan document link.",
			tax_report: "Please enter tax_report document link.",
            criminal_registry: "Please enter criminal registry document link.",
		}
	});
}); 

</script>   