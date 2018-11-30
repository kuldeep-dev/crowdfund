<section class="content-header">
  
    <h1>
    Payment History 
    <small></small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders</li>
    </ol>
    
   
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        <?php echo $this->Flash->render(); ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
             <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Order ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Seller Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Seller Paypal Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total Pay') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pay to Seller') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Admin Comission') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
                <tbody>
                  <?php foreach ($orders as $info): ?>
                    
                    
            <tr>
                <td><?= $this->Number->format($info->id) ?></td>
                <td><?= h($info->name) ?></td>    
                <td><?= h($info['seller']['name']) ?></td>
                <td><?= h($info['seller']['paypal_email']) ?></td>
                <td><?= h($info->total) ?></td>
                <td><?= h($info->total - $info->commission_amount) ?></td>
                <td><?= h($info->commission_amount) ?></td>
                <td><?= h($info->created) ?></td> 
                 <td><?php if($info->order_status == 1){ echo "Pending"; }elseif($info->order_status == 2){ echo "Processing";  }elseif($info->order_status == 3){ echo "Complete";  }elseif($info->order_status == 4){ echo "Cancel";  } ?></td> 
                <td class="actions">  
                   <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $info->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info btn-xs']
                    ) ?>
                    
                    <?php if($info->order_status == 3){ if($info['status'] == 1){ ?>    
                      <a href="#" class="btn btn-danger btn-xs">Paid </a> 
                    <?php }else{ ?>
                    <?= $this->Form->postLink(__('Pay Now'), ['action' => 'markpay', $info->id], ['confirm' => __('Are you sure you want to change status # {0}?', $info->id),'class' => 'btn btn-success btn-xs']) ?>     
                    <?php } } ?>
                </td>  
            </tr>
            <?php endforeach; ?>  
                </tbody>
     
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>  
    </div>
</section>        