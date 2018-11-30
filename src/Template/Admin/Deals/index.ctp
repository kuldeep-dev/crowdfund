<section class="content-header">
    <h1>
    <?= __('Deal') ?>  <?//= $this->Html->link(__('Add Deal'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Home') ?> </a></li>
        <li class="active"><?= __('Deal') ?></li>
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
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
                <tbody>
                 <?php foreach ($deals as $deal): ?>
            <tr>
                <td><?= $this->Number->format($deal->id) ?></td>
                <td><?= h($deal->name) ?></td>
                <td style="background-color:#000;"><?php echo $this->Html->Image('/images/categories/' . $deal->image, array('width' => 50, 'height' => 50, 'alt' =>$deal->name, 'class' => 'image')); ?></td>
                <td><?= h($deal->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $deal->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success btn-xs']
                    ) ?>
                  
                     
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deal->id),'class' => 'btn btn-danger btn-xs']) ?>
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