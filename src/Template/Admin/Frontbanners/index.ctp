<section class="content-header">
  
    <h1>
    Front Banner   <?= $this->Html->link(__('Add Banner'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
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
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
                <tbody>
                  <?php foreach ($frontbanners as $product): ?>
                    
                    
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?php if($product->image != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/website/<?php echo $product->image; ?>" style="width: 100px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/products/no-image.jpg" style="width: 100px;
            " class="previewHolder"/>
            <?php } ?></td>
            <td><?php echo ($product['status'] == '0') ? 'Disabled' : 'Enabled'; ?></td>
                <td><?= h($product->created) ?></td>
                <td class="actions">
                    <?php if($product['status'] == 1){ ?>    
                  <?= $this->Form->postLink(__('Disable '), ['action' => 'desable', $product->id], ['confirm' => __('Are you sure you want to disable # {0}?', $product->id),'class' => 'btn btn-success btn-xs']) ?>  
                    <?php }else{ ?>
                    <?= $this->Form->postLink(__('Enable'), ['action' => 'enable', $product->id], ['confirm' => __('Are you sure you want to enable # {0}?', $product->id),'class' => 'btn btn-danger btn-xs']) ?>     
                    <?php } ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => 'btn btn-danger btn-xs']) ?>

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