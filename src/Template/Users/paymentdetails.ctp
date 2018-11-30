<section class="payment-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="tab-menu">
						<ul class="nav nav-tabs flex-column">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#bank">Bank Account</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#card">Debit/Credit Card</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#paypal">Paypal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#atm">ATM</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="tab-content">
						<div class="tab-pane active" id="bank">
							<div class="head-sec">
								<h5>Select a Bank</h5>
							</div>
							<form id="" class="bankpayment" name="Payment" method="" action="">
								<div class="form-check-inline">
									<label class="form-check-label" for="sbibank">
										<input type="radio" class="form-check-input" id="sbibank" name="bank" value="SBI" checked>
										<span class="bank-avatar">
											<img src="<?php echo $this->request->webroot."images/website/SBI-Bank.png";?>" alt="Bank Logo">
										</span>
									</label>
									<label class="form-check-label" for="sibbank">
										<input type="radio" class="form-check-input" id="sibbank" name="bank" value="South Indian Bank" checked>
										<span class="bank-avatar">
											<img src="<?php echo $this->request->webroot."images/website/South-Indian-Bank.png";?>" alt="Bank Logo">
										</span>
									</label>
									<label class="form-check-label" for="fb">
										<input type="radio" class="form-check-input" id="fb" name="bank" value="Federal Bank" checked>
										<span class="bank-avatar">
											<img src="<?php echo $this->request->webroot."images/website/Federal-Bank.png";?>" alt="Bank Logo">
										</span>
									</label>
									<label class="form-check-label" for="paytm">
										<input type="radio" class="form-check-input" id="paytm" name="bank" value="Paytm" checked>
										<span class="bank-avatar">
											<img src="<?php echo $this->request->webroot."images/website/Paytm.png";?>" alt="Bank Logo">
										</span>
									</label>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
										<h5>National</h5>
										<div class="form-group">
											<label>IBAN</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Enter your IBAN number">
										</div>
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Enter your Name">
										</div>
										<h5>International</h5>
										<div class="form-group">
											<label>IBAN</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Enter your IBAN number">
										</div>
										<div class="form-group">
											<label>SWIFT</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Enter your SWIFT number">
										</div>
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Enter your Name">
										</div>
										<div class="form-group">
											<label>Country</label>
											<select class="form-control">
												<option>Select Country</option>
											</select>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-theme" value="Submit">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="card">
							<div class="head-sec">
								<h5>Debit/Credit Card</h5>
							</div>
							<form id="" class="card-payment" name="Payment" method="" action="">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
										<div class="form-group">
											<label>Card Number</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="XXXX XXXX XXXX XXXX">
										</div>
										<div class="form-group">
											<label>Card Holder Name</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Jhon Deo">
										</div>
										<div class="form-group">
											<label>CVV Number</label>
											<input type="password" class="form-control" id="" name="" value="" placeholder="***">
										</div>
										<div class="form-group">
											<label>Expiration</label>
											<input type="text" onfocus="(this.type='date')" class="form-control" id="" name="" value="" placeholder="MM/YYYY">
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-theme" value="Submit">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="paypal">
							<div class="head-sec">
								<h5>Paypal</h5>
							</div>
							<form id="" class="paypal-payment" name="Payment" method="" action="">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
										<div class="form-group">
											<label>Paypal ID</label>
											<input type="text" class="form-control" id="" name="" value="" placeholder="Enter Paypal ID">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" id="" name="" value="" placeholder="Enter your Password">
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-theme" value="Submit">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="atm">atm</div>
					</div>
				</div>
			</div>
		</div>
	</section>