<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($loggeduser['image'] != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $loggeduser['image']; ?>" class="img-circle" />
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" class="img-circle" />
            <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php if(isset($loggeduser['name'])){ echo $loggeduser['name']; } ?></p> 
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php if($this->request->params['controller'] == 'Dashboard' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Users' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/users">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="<?php if($this->request->params['controller'] == 'Categories' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/categories">
            <i class="fa fa-cube"></i> <span>Project Category</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="<?php if($this->request->params['controller'] == 'Organisations' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/organisations">
            <i class="fa fa-sitemap"></i> <span>Organisation</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="<?php if($this->request->params['controller'] == 'Perks' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/perks">
            <i class="fa fa-sitemap"></i> <span>Perks</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>

         <li class="<?php if($this->request->params['controller'] == 'Deals' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/deals">
            <i class="fa fa-cubes"></i> <span>Deal Type</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
 
        
        <li class="<?php if($this->request->params['controller'] == 'Campaigns' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/campaigns">
            <i class="fa fa-product-hunt"></i> <span>Campaigns</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="<?php if($this->request->params['controller'] == 'Invests' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/invests">
            <i class="fa fa-money"></i> <span>Investment</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        

       <!-- <li class="<?php if($this->request->params['controller'] == 'Orders' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/orders">
            <i class="fa fa-first-order"></i> <span>Orders</span>  
            <span class="pull-right-container">    
            </span>
          </a>
        </li> -->
      
        <li class="<?php if($this->request->params['controller'] == 'Staticpages' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/staticpages">
            <i class="fa fa-file"></i> <span>Pages</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <!-- <li class="<?php if($this->request->params['controller'] == 'Articles' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/articles">
            <i class="fa fa-pencil-square-o"></i> <span>Articles</span>  
            <span class="pull-right-container">  
            </span>
          </a>  
        </li> -->

        <li class="<?php if($this->request->params['controller'] == 'Contacts' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/contacts">
            <i class="fa fa-address-card"></i> <span>Contact Request</span>  
            <span class="pull-right-container">  
            </span>
          </a>  
        </li>
        
        <!-- <li class="<?php if($this->request->params['controller'] == 'Orders' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/orders/payments">
            <i class="fa fa-money"></i> <span>Payments</span>      
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->
        
        <!-- <li class="<?php if($this->request->params['controller'] == 'Reviews' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/reviews">
            <i class="fa fa-comments-o"></i> <span>Reviews</span>        
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->

         <li class="<?php if($this->request->params['controller'] == 'Frontbanners' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/frontbanners">
            <i class="fa fa-image"></i> <span>Front Banner</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Settings' ) { echo "active"; }?>">
          <a href="<?php echo $this->request->webroot; ?>admin/settings">
            <i class="fa fa-cog"></i> <span>Settings</span>  
            <span class="pull-right-container">
            </span>
          </a>
        </li>
  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>