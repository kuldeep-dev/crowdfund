<section class="content-header">
    <h1>
   <?= __('Supporters') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> <?= __('Home') ?></a></li>
        <li class="active"><?= __('Supporters') ?></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-xs-12">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Campaign') ?><strong>(<?php echo $supporter['name']; ?>)</strong></h3>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Total Supporters') ?><strong>(<?php echo count($supporter['invests']); ?>)</strong></h3>
        </div>
        
        <div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
             <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment mode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment date') ?></th>
            </tr>
            </thead>
                <tbody>
                  <?php foreach ($supporter['invests'] as $supp): ?>
            <tr>
                <td><?= h($supp['user']['name']) ?></td>
                <td>
                <?php if($supp['user']['image'] != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $supp['user']['image']; ?>" style="width: 100px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" style="width: 100px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
                <td>$<?= h($supp['amount']) ?></td>
                <td><?= h($supp['payment_mode']) ?></td> 
                <td><?= h($supp['payment_status']) ?></td> 
                <td><?= h($supp['created']) ?></td>
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