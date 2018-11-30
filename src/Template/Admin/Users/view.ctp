<section class="content-header">
    <h1>
    Users
     <?= $this->Flash->render() ?> 
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
         
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($user->name .' '.$user->last_name) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
          
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <?php if($user->name){ ?>
        <tr>
          <th><?= __('Name') ?></th>
          <td><?= h($user->name .' '.$user->last_name) ?></td>
        </tr>
        <?php } ?>
        <?php if($user->email){ ?>
        <tr>
          <th><?= __('Email') ?></th>
          <td><?= h($user->email) ?></td>
        </tr>
        <?php } ?> 

        <?php if($user->phone){ ?>
        <tr>
          <th><?= __('Phone') ?></th>
          <td><?= h($user->phone) ?></td>
        </tr>
         <?php } ?>

        <?php if($user->dob){ ?>
        <tr>
          <th><?= __('Dob') ?></th>
          <td><?= h($user->dob) ?></td>
        </tr>
        <?php } ?>
        
        <?php if($user->paypal_id){ ?>
        <tr>
          <th><?= __('Paypal Id') ?></th>
          <td><?= h($user->paypal_id) ?></td>
        </tr>
         <?php } ?>

         <?php if($user->address){ ?>
        <tr>
          <th><?= __('Address') ?></th>
          <td><?= h($user->address) ?></td>
        </tr>
         <?php } ?>

         <?php if($user->city){ ?>
        <tr>
          <th><?= __('City') ?></th>
          <td><?= h($user->city) ?></td>
        </tr>
         <?php } ?>

        <?php if($user->country){ ?>
        <tr>
          <th><?= __('Country') ?></th>
          <td><?= h($user->country) ?></td>
        </tr>
         <?php } ?>

         <?php if($user->company){ ?>
        <tr>
          <th><?= __('Company') ?></th>
          <td><?= h($user->company) ?></td>
        </tr>
         <?php } ?>

         <?php if($user->company_id){ ?>
        <tr>
          <th><?= __('Company Id') ?></th>
          <td><?= h($user->company_id) ?></td>
        </tr>
         <?php } ?>

        <?php if($user->image){ ?>
        <tr>
          <th><?= __('Image') ?></th>
          <td>
            <?php if($user->image != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo $user->image; ?>" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/users/noimage.png" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
          </td>
        </tr>
         <?php } ?>

     
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section> 
  

<?php if($user['role'] != 'admin'){ ?>
<section class="content" >
	<div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title">Documents</h3>  
  </div>
  <!-- /.box-header -->
  <div style="display: flex;">
            <?php if($user->document){ ?>
            <embed src="https://drive.google.com/viewerng/viewer?embedded=true&url=https://gurpreet.gangtask.com<?php echo $this->request->webroot."images/users/documents/".$user->document; ?>" width="480" height="250">
            <?php }else{ ?>
                <img class="currentimg" style="width: calc(100% / 4);" src="<?php echo	$this->request->webroot."images/website/placeholder.png";?>" 	alt="Image">
              <?php } ?>
              <div style="margin-left: 15px;">
                <p>
              <?php if($user->profitability_plan){ ?><span>Profitability plan document link</span> : <a href="<?php echo $user->profitability_plan ?>">Profitability Plan</a><?php }?></p>
<p>
<?php if($user->tax_report){ ?><span>Tax report document link</span> : <a href="<?php echo $user->tax_report ?>">Tax report</a><?php }?></p>
<p>
<?php if($user->criminal_registry){ ?><span>Criminal registry document link</span> : <a href="<?php echo $user->criminal_registry ?>">Criminal registry</a><?php }?></p>
              </div>
            </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>  
<?php } ?>