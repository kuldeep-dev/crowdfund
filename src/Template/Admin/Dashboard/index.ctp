<section class="content-header">
    <h1>
    Dashboard
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
	<div class="row">
    
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>admin/users">  
                <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  
                    <span class="info-box-text">All Users</span>
                    <span class="info-box-number"><?php echo count($users); ?><small></small></span> 
                </div>
              </a>  
            </div>
        </div>


        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>admin/categories">  
                <span class="info-box-icon bg-aqua"><i class="fa fa-cube"></i></span>
                <div class="info-box-content">
                  
                    <span class="info-box-text">All Project Categories</span>
                    <span class="info-box-number"><?php echo count($categories); ?><small></small></span> 
                </div>
              </a>  
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>admin/organisations">  
                <span class="info-box-icon bg-red"><i class="fa fa-sitemap"></i></span>
                <div class="info-box-content">
                  
                    <span class="info-box-text">All Organisation</span>
                    <span class="info-box-number"><?php echo count($organisations); ?><small></small></span> 
                </div>
              </a>  
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>admin/deals">  
                <span class="info-box-icon bg-green"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                  
                    <span class="info-box-text">All Deal </span>
                    <span class="info-box-number"><?php echo count($deals); ?><small></small></span> 
                </div>
              </a>  
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>admin/campaigns">  
                <span class="info-box-icon bg-yellow"><i class="fa fa-product-hunt"></i></span>
                <div class="info-box-content">
                  
                    <span class="info-box-text">All Campaigns </span>
                    <span class="info-box-number"><?php echo count($campaign); ?><small></small></span> 
                </div>
              </a>  
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>admin/invests">  
                <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  
                    <span class="info-box-text">Total Investment </span>
                    <?php
                            $result = 0;
							foreach ($invest as $amount) {
								$value = $amount['amount'];
								$result += $value;
							} ?>
                    <span class="info-box-number">$<?php echo $result; ?><small></small></span> 
                </div>
              </a>  
            </div>
        </div>
    </div>
    

<div class="row">
    <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo count($members); ?> New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style="">
                  <ul class="users-list clearfix">
                  <?php foreach($members as $member){ ?>                
                    <li>
                      <?php if($member['image'] != ''){ ?>
                        <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" style="height:106px; width:106px;">
                        <?php }else{ ?>
                        <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" alt="User Image" style="height:106px; width:106px;">
                        <?php } ?>  
                      <a class="users-list-name" href="#"><?php echo ucwords($member['name']); ?></a>
                      <span class="users-list-date"><?php echo date('d M', strtotime($member['created'])); ?></span>
                    </li>
                    <?php } ?>

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center" style="">
                  <a href="<?php echo $this->request->webroot; ?>admin/users" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Campaings</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

                <?php foreach($campaign as $camp){ ?>
                <li class="item">
                  <div class="product-img">
                        <?php if($camp['image'] != ''){ ?>
                        <img src="<?php echo $this->request->webroot; ?>images/campaign/<?php echo $camp['image']; ?>" alt="<?php echo $camp['name']; ?>" style="height:50px; width:50px;">
                        <?php }else{ ?>
                        <img src="<?php echo $this->request->webroot; ?>images/campaign/no-image.jpg" alt="User Image" style="height:50px; width:50px;">
                        <?php } ?>  
                  </div>
                  <div class="product-info">
                    <a href="#" class="product-title"><?php echo substr($camp['name'],0,30); ?>
                      <span class="label label-warning pull-right">$<?php echo $camp['raise_amount']; ?></span></a>
                    <span class="product-description">
                        <?php echo substr($camp['aim'],0,50); ?>
                        </span>
                  </div>
                </li>
                <?php } ?> 
               
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="<?php echo $this->request->webroot; ?>admin/campaigns" class="uppercase">View All Campaings</a>
            </div>
            <!-- /.box-footer -->
          </div>
          </div>


        </div>    
    
</section>