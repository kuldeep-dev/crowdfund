
<section class="get_funded-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="sgn_bner1">
                <?= $this->Flash->render() ?> 
            </div>
					<div class="head-sec">
						<div class="top-sec">
							<h5>Invest History</h5>
							<a href="<?php echo $this->request->webroot . "campaigns/add"; ?>" class="btn btn-primary btn-dark ml-auto">Start Campaign</a>
						</div>
					</div>
                    <div class="row">
                        <?php
                            $result = 0;
							foreach ($investhistory as $amount) {
								$value = $amount['amount'];
								$result += $value;
                            } ?>
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 m-auto">
                            <h6 style="padding-left:30px;">Total Investment is : $<?php echo $result ?></h6>
                        
                            <div class="order_tbl">
                                <div class="order_tblsec table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Campaign Name</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>  
                                    <th>Status</th>
                                    <th>created</th>

                                </tr>
                                </thead>
                                    <tbody>
                                    <?php $a = 0; ?>
                                        <?php  foreach ($investhistory as $info): 
                                         $a++;
                                         ?>  
                                <tr>
                                    <td data-label="Order Name"><?= h($a) ?></td>
                                    <td data-label="Order Name"><?= h($info->campaign->name) ?></td>
                                    <td data-label="Order email">$<?= h($info->amount) ?></td>
                                    <td data-label="Order phone"><?= h($info->payment_mode) ?></td>
                                    <td data-label="Order subtotal"><?= h($info->payment_status) ?></td>
                                    <td data-label="Order created"><?= date("d-m-Y", strtotime(h($info->created))); ?></td> 
                                
                                </tr>
                                <?php endforeach; ?>
                                
                                    </tbody>
                                        
                                    </table>
                                
                                

                                </div>
                            </div> 
                        </div>     
                        </div>   



				</div>
			</div>
		</div>
	</section><!--/.get_funded-page-->

<script>
$(document).ready(function(){
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : false,
			'info'        : true,
			'autoWidth'   : false,
			'order'		  : [[ 1, "desc" ]]
		});
	});

</script>