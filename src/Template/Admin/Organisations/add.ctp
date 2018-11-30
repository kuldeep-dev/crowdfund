<section class="content-header">
    <h1>
   <?= __('Organisation') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Home') ?></a></li>
        <li class="active"><?= __('Add Organisation') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Add Organisation') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($organisation, ['id' => 'organisation-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">
                    
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label> 
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false]); ?>
                </div> 
              </div>
              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
    </div>
</section> 
     

