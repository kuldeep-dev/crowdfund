<section class="content-header">
    <h1>
    Campaign
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
        
        <?php //print_r($campaign); ?>
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($campaign->name) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
  
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($campaign->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= h($campaign->user->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Facebook Url') ?></th>
            <td>
                <a href="<?php echo $campaign->facebook_url ?>">Facebook Url</a>
            </td>
        </tr>

        <tr>
            <th scope="row"><?= __('Facebook Message') ?></th>
            <td><?= h($campaign->facebook_message) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Twitter Url') ?></th>
            <td><a href="<?php echo $campaign->twitter_url ?>" target="_blank">Twitter Url</a></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Twitter Message') ?></th>
            <td><?= h($campaign->twitter_message) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Organisation') ?></th>
            <td><?= h($campaign->organisation->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('PPT Link') ?></th>
            <td>
            <?php if($campaign->ppt_thumbnail != ''){ ?>
            <a href="<?php echo $campaign->ppt_link ?>" target="_blank">
            <img src="<?php echo $this->request->webroot; ?>images/campaign/<?php echo $campaign->ppt_thumbnail; ?>" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            </a>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/products/no-image.jpg" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
          </td>
        </tr>


        <tr>
            <th scope="row"><?= __('Campaign Image') ?></th>
            <td>
            <?php if($campaign->image != ''){ ?>
            <img src="<?php echo $this->request->webroot; ?>images/campaign/<?php echo $campaign->image; ?>" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php }else{ ?>
            <img src="<?php echo $this->request->webroot; ?>images/products/no-image.jpg" style="width: 190px; margin-bottom: 20px;
            " class="previewHolder"/>
            <?php } ?>
          </td>
        </tr>

        <tr>
            <th scope="row"><?= __('Youtube Video') ?></th>
            <?php 
            $link = $campaign->youtube_link;
            $arr=explode('v=',$link);
            ?>
            <td>
            <iframe width="275" height="150" src="https://www.youtube.com/embed/<?php echo $arr[1] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </td>
        </tr>

        <tr>
            <th scope="row"><?= __('Project Aim') ?></th>
            <td><?= h($campaign->aim) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Project Story') ?></th>
            <td><?= h($campaign->story) ?></td>
        </tr>

         <tr>
            <th scope="row"><?= __('Raise Amount') ?></th>
            <td>$<?= h($campaign->raise_amount) ?></td>
        </tr>

         <tr>
            <th scope="row"><?= __('Stretch Target') ?></th>
            <td>$<?= h($campaign->stretch_target) ?></td>
        </tr>

         <tr>
            <th scope="row"><?= __('Do with extra money') ?></th>
            <td><?= h($campaign->extra_money) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('User Perk') ?></th>
            <td><?= h($campaign->perk->name) ?></td>
        </tr>

         <tr>
            <th scope="row"><?= __('Project Duration') ?></th>
            <td><?= h($campaign->duration) ?>Months</td>
        </tr>

         <tr>
            <th scope="row"><?= __('Live Date') ?></th>
            <td><?= h($campaign->live) ?></td>
        </tr>

         <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($campaign->end_date) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Deal') ?></th>
            <td><?= h($campaign->deal->name) ?></td>
        </tr>

  
      </tbody>  
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       