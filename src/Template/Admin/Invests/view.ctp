<section class="content-header">
    <h1>
    <?= __('Order') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Home') ?> </a></li>
        <li class="active"><?= __('View') ?></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-xs-12"> 
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title">Order Id :- <?= h($order->id) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
  
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($order->user->name) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($order->user->email) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($order->user->phone) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($order->user->address) ?></td>
        </tr>
    
        <!-- <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($order->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($order->state) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($order->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($order->country) ?></td>
        </tr> -->
        
        <tr>
            <th scope="row"><?= __('Hourly Price') ?></th>
            <td>$<?= h($order->hourly_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Hours') ?></th>
            <td><?= h($order->total_hours) ?></td>
        </tr>

         <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td>$<?= h($order->total_price) ?></td>    
        </tr>
         <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?php if($order->order_status == 1){ echo "Pending"; }elseif($order->order_status == 2){ echo "Processing";  }elseif($order->order_status == 3){ echo "Complete";  }elseif($order->order_status == 4){ echo "Cancel";  } ?></td>    
        </tr> 
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>

      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
            
            
        <div class="col-xs-12"> 

        
<div class="box">
<div class="box-header">
<h3 class="box-title"><?= __('Order Detail') ?></h3>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">

<div class="trip-list">


<ul>
  <li>
    <span class="img-crafting">
      <img src="<?php echo $this->request->webroot."images/products/".$order->product->image; ?>" alt="Boat Image">
    </span>
    <h5><?php echo $order->product->name ?></h5>
    <ul class="details">
      <li>
        <label>Date: <?php echo " ". $order->start_date ?><?php echo " " ?><?php echo " To "." ". $order->end_date ?></label> 
      </li>
      <li>
        <label>Time:</label> <?php echo " ". $order->start_time ?><?php echo " " ?><?php  echo " - "." ". $order->end_time ?>
      </li>
      <li>
        <label>Price:</label> $<?php echo " ". $order->total_price?>
      </li>
   

    </ul>
   
  </li>
</ul>



</div>



</div>
<!-- /.box-body -->
</div>




</div>     
    
    
    
    
    
    
    
</div>




      
        
</section>       