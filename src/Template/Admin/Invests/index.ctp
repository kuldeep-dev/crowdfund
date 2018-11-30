<section class="content-header">
  
    <h1>
    Investments 
    <small></small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Investments</li>
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
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Campaign name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Supporter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Payment mode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment date') ?></th>
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
            </thead>
                <tbody>
                  <?php foreach ($invests as $info): ?>
                    
            <tr>
                <td><?= $this->Number->format($info->id) ?></td>
                <td><?= h($info->campaign->name) ?></td>
                <td><?= h($info->user->name) ?></td>
                <td><?= h($info->user->email) ?></td>
                <td>$<?= h($info->amount) ?></td>
                <td><?= h($info->payment_mode) ?></td>
                <td><?= h($info->payment_status) ?></td>
                <td><?= h($info->created) ?></td> 
                <!-- <td class="actions">
                   <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $info->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info btn-xs']
                    ) ?>      
                </td>   -->
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