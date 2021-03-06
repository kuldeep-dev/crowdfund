<section class="content-header">
    <h1>
   <?= __('Deal') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Home') ?></a></li>
        <li class="active"><?= __('Add Deal') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Add Deal') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($deal, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">     
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label> 
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false]); ?>
                </div> 
                  <?php echo $this->Form->control('image',['class' => 'form-control','type'=>'file']);?>
              </div>
              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
    </div>
</section> 
     

