<section class="content-header">
  
    <h1>
    Campaigns   <? //= $this->Html->link(__('Add Campaigns'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
    <small></small>
    </h1>

    
   
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
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('target_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raise_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
                <tbody>
                  <?php foreach ($campaigns as $campaign): ?>
                    
                    
            <tr>
                <td><?= $this->Number->format($campaign->id) ?></td>  
                <td><?= h($campaign->name) ?></td>
                <td>$<?= h($campaign->raise_amount) ?></td>
                <td>
                <?php 
                    $result = 0;
                    foreach ($campaign['invests'] as $amount) {
                        $value = $amount['amount'];
                        $result += $value;
                    }?>
                $<?= h($result) ?>
                </td>
                <td><?= h($campaign->user->name) ?></td>
                <td><?= h($campaign->duration) ?>Months</td> 
                <td><?php if($campaign->status==1){ echo "Active"; }else{ echo "Deactive"; } ?></td>
                <td><?= h($campaign->created) ?></td>
                <td class="actions">
                   <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $campaign->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info btn-xs']
                    ) ?> 
                     <?  //= $this->Html->link(
                        //'<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        //['action' => 'edit', $campaign->id],
                       // ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success btn-xs']
                    //) ?>  
                    <?php if($campaign['status'] == 1){ ?>    
                  <?= $this->Form->postLink(__('Disable '), ['action' => 'desable', $campaign->id], ['confirm' => __('Are you sure you want to disable # {0}?', $campaign->id),'class' => 'btn btn-success btn-xs']) ?>  
                    <?php }else{ ?>
                    <?= $this->Form->postLink(__('Enable'), ['action' => 'enable', $campaign->id], ['confirm' => __('Are you sure you want to enable # {0}?', $campaign->id),'class' => 'btn btn-danger btn-xs']) ?>     
                    <?php } ?>
                    <?= $this->Html->link(
                        'Supporters',
                        ['action' => 'supporters', $campaign->id],
                        ['escape' => false, 'title' => __('Supporters'), 'class' => 'btn btn-warning btn-xs']
                    ) ?>
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