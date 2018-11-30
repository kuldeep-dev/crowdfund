<section class="content-header">
  <h1>
   <?= __('Frontbanner') ?>
   <small></small>
 </h1>

</section>

<section class="content"> 
	<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Add Frontbanner') ?></h3> 
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($frontbanners, ['id' => 'frontbanner-form', 'enctype' => 'multipart/form-data']) ?>
        <div class="box-body">
          <div class="form-group">
            <label>Image (Image Dimension  width = 1366 , height = 567)</label> 
            <div class="col-md-12 text-center viewport" >
				<div id="upload-demo" style="width:350px"></div>
	  		</div>
				<input type="file" id="upload">
            <?php //echo $this->Form->control('image[]',['label'=>false ,'class' => 'form-control','type'=>'file','multiple'=>'multiple', 'accept' => '.png, .jpg, .jpeg']);?>
          <input type="hidden" id="data" name="image"/> 
         </div>
         <!-- /.box-body -->

         <div class="box-footer">
          <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success upload-result']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
  </div>





</section> 
<style type="text/css">

.datetime ,select{
  width: auto; 
  border: none;
  border-radius: 0px;
  background: #fff;
  border: 1px solid #ddd;
  padding: 7px 7px !important;
  color: #777 !important;
  font-size: 16px !important;
  box-shadow: none !important;
  margin: 0px;
}

.viewport { 
  /* height: 95vh;  */
  width: 95vw; 
}

</style>
<script>
  $('#datepicker').datepicker({
    autoclose: true
  })
</script>  

<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 684,
        height: 284,
        type: 'rectangular'
    },
    boundary: {
        width: 700,
        height: 350
    },
    showZoomer: false,
});


$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		//console.log(e.target.result);
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
    type: 'canvas',
    size: {
      width: 1366,
      height: 567
      }
	}).then(function (resp) {
    console.log(resp);
    $('#data').val(resp);
	});
});


</script>