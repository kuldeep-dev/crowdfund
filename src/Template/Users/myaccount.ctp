<section class="profile-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sgn_bner1">
                <?= $this->Flash->render() ?> 
            </div>
					<div class="profile-inner">      
						<div class="title-sec">
							<h5>Profile</h5>
							<div class="status-button">		
								<span class="activate">Activate</span>
								<label class="switch">
									<input type="checkbox" <?php if($userdata['camp_status'] == 1) { ?> checked="checked" <?php } ?> id="disable">
									<span class="slider"></span>
								</label>
								<span class="deactivate">Deactivate</span>
							</div>
						</div>
						<div class="avatar-sec">
							<div class="avater">
                                <?php if(isset($userdata->image)){  ?>    
                                    <img src="<?php echo $this->request->webroot."images/users/".$userdata->image; ?>">
                                    <?php }else{  ?>
                                    <img src="<?php echo $this->request->webroot."images/users/noimage.png"?>">
                                <?php } ?>
                            </div>
							<div class="edit-btn">
								<a href="<?php echo $this->request->webroot; ?>users/edit"><img src="<?php echo $this->request->webroot."images/website/edit.svg";?>" Alt="Edit-Icon"></a>
							</div>
							<div class="attact-sec">
							<a href="<?php echo $this->request->webroot; ?>users/document"><span>Attach Documents</span></a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="details-inner">
									<table class="table table-striped table-bordered table-hover">
										<tbody>
											<tr>
												<td>Name</td>
												<td><?php echo (isset($userdata->name)) ? $userdata->name . ' ' . $userdata->last_name :''; ?></td>
											</tr>
											<tr>
												<td>Company Name</td>
												<td><?php echo (isset($userdata->company)) ? $userdata->company : ''; ?></td>
											</tr>
											<tr>
												<td>Phone Number</td>
												<td><?php echo (isset($userdata->phone)) ? $userdata->phone : '';  ?></td>
											</tr>
											<tr>
												<td>Date of Birth</td>
												<td><?php echo (isset($userdata->dob))? $userdata->dob : ''; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="details-inner">
									<table class="table table-striped table-bordered table-hover">
										<tbody>
											<tr>
												<td>Email</td>
												<td><?php echo (isset($userdata->email))? $userdata->email : ''; ?></td>
											</tr>
											<tr>
												<td>Street</td>
												<td><?php echo (isset($userdata->address))? $userdata->address : ''; ?></td>
											</tr>
											<tr>
												<td>City Province</td>
												<td><?php echo (isset($userdata->city))? $userdata->city : ''; ?></td>
											</tr>
											<tr>
												<td>Country</td>
												<td><?php echo (isset($userdata->country))? $userdata->country : ''; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="btn-sec">
									<a href="<?php echo $this->request->webroot . "users/mycampaign"; ?>" class="btn btn-gray">Campaign Management</a>
									<a href="<?php echo $this->request->webroot . "users/investhistory"; ?>" class="btn btn-gray">My Investments</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="btn-sec">
									<a href="<?php echo $this->request->webroot . "users/paymentdetails"; ?>" class="btn btn-theme">Payment Mode</a>
									<a href="<?php echo $this->request->webroot . "users/changepassword"; ?>" class="btn btn-theme">Change Password</a>
								</div>
							</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!--/.End Here -->

	<script>
		jQuery(document).ready(function() {
			jQuery('#disable').change(function() {
				if ($(this).prop('checked')) {
					$(this).prop('checked',false)
					swal({
						title: 'Info',
						text: "You won't be able to activate.Please contact admin",
						type: 'info',
					});
				}
				else {
					swal({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, deactivate it!'
						}).then((result) => {
						if (result.value) {
							var id = '<?php echo $userdata->id ; ?>';
								console.log(id);
							$.ajax({
									url: '<?php echo $this->request->webroot; ?>users/disable',
									data: {id:id},
									method: 'post',
									dataType: 'json',
									success: function(data){
										console.log(data) 
										if (data.isSucess == 'false') {
											swal(
												'Error',
												'Your all campaign status is not changed.',
												'error'
												)  
										} else {
											swal(
												'Success!',
												'Your all campaign status is deactivated.',
												'success'
												)
										}
									}
								});  
						}else{
							$(this).prop('checked',true)
						}
						})
				}
			});
		});
	</script>