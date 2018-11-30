<section class="content-header">
    <h1>
   <?= __('Product') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> <?= __('Home') ?></a></li>
        <li class="active"><?= __('Edit Product') ?></li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Product') ?><strong>(ID: <?php echo $product->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($product, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
              	<div class="form-group">
  
                <div class="form-group">
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' =>'Name']); ?>
                </div>
                 <?php echo $this->Form->control('price',['class' => 'form-control']);?>
                  <?php //  echo $this->Form->control('quantity',['class' => 'form-control']);?>     
                 <?php echo $this->Form->control('user_id',['class' => 'form-control','label'=>'Seller']);?>
                 <?php echo $this->Form->control('cat_id',['class' => 'form-control','label'=>'Category']);?>
                 <div class="form-group"> 
                        <label>Condition</label>   
                 <select class="form-control" name="conditions" id="conditions">
                                <option value="New" <?php if($product['conditions']=='New'){ echo "selected"; } ?>>New</option>
                                <option value="Old" <?php if($product['conditions']=='Old'){ echo "selected"; } ?>>Old</option>
                 </select>
                  </div>   
                <div class="form-group">
                  <?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']); ?>
                </div>

               <div class="form-group">
                  <?php echo $this->Form->control('color', ['type' =>'text' ,'class' => 'form-control', 'label' =>'Color']); ?>
                </div>

                <div class="form-group">  
              <label>Where is your craft located?</label>

              <?php
              $lat = $product['lat'];
              $lng = trim($product['long']);
              $data = file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false&key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o");
              $output = json_decode($data);
              $status = $output->status;
              $address = ($status=="OK")?$output->results[1]->formatted_address:'';
            //  print_r($address);
              
              ?>


              <input class="form-control tlt_form_field" value="<?php echo $address; ?>"  name="address" id="txtPlaces" type="text" placeholder="Enter your location">
              <input type="hidden" id="latitude" name="lat" value="<?php echo $product['lat']; ?>" class="form-control" />
              <input type="hidden" id="longitude" name="long" value="<?php echo trim($product['long']); ?>" class="form-control" />
              <?php echo $this->Form->error('address', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div> 



            <div class="form-group">
              <label>Pick Location</label>
              <input class="form-control tlt_form_field" name="pick_location" id="pick_location" value="<?php echo $product['pick_location']  ?>" type="text" placeholder="Enter your location">
              <?php echo $this->Form->error('pick_location', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div>


            <div class="form-group">
              <label>Drop Location</label>
              <input class="form-control tlt_form_field" name="drop_location" id="drop_location" value="<?php echo $product['drop_location']  ?>" type="text" placeholder="Enter your location">
              <?php echo $this->Form->error('drop_location', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div> 


                <div class="form-group">
                  <?php // echo $this->Form->control('delivery_details', ['class' => 'form-control', 'label' => 'Delivery Details']); ?>
                </div>    
                    
                    
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select name="status" class="form-control">
                    <option value="1" <?php if($product->status==1){ echo "selected"; }?>>Active</option>
                    <option value="0" <?php if($product->status==0){ echo "selected"; }?>>Deactive</option>
        
                  </select>
                </div>   
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <?php echo $this->Form->control('image', ['id' => 'productPic', 'type' => 'file', 'class' => 'form-control', 'label' => false]); ?>
                </div>   
                <img src="<?php echo $this->request->webroot; ?>images/products/<?php echo ($product->image != '') ? $product->image : 'no-image.jpg' ?>" class="previewHolder" style="width: 135px;"/>             
              </div>


              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
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
</style>
<script>

$('#datepicker').datepicker({
  autoclose: true
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#productPic").change(function() {
  readURL(this);
});
</script>      

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&sensor=false&libraries=places"></script>   

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>

<script>
  /// google location search
  google.maps.event.addDomListener(window, 'load', function () {
    var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
    google.maps.event.addListener(places, 'place_changed', function () {
      var place = places.getPlace();
      var address = place.formatted_address;
      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();
      $("#latitude").val(latitude);
      $("#longitude").val(longitude);

      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
            // console.log("addressType:" + addressType);
            if (addressType == 'country') {
              var val = place.address_components[i].long_name;
                // console.log("val:" + val);
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
              }
            }

          });
  });

//pick location 

google.maps.event.addDomListener(window, 'load', function () {
  var places = new google.maps.places.Autocomplete(document.getElementById('pick_location'));
  google.maps.event.addListener(places, 'place_changed', function () {
    var place = places.getPlace();
    var address = place.formatted_address;
    var latitude = place.geometry.location.lat();
    var longitude = place.geometry.location.lng();
   // $("#latitude").val(latitude);
   // $("#longitude").val(longitude);
    
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
            // console.log("addressType:" + addressType);
            if (addressType == 'country') {
              var val = place.address_components[i].long_name;
                // console.log("val:" + val);
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
              }
            }

          });
});


/////drop location
//////drop location
google.maps.event.addDomListener(window, 'load', function () {
  var places = new google.maps.places.Autocomplete(document.getElementById('drop_location'));
  google.maps.event.addListener(places, 'place_changed', function () {
    var place = places.getPlace();
    var address = place.formatted_address;
    var latitude = place.geometry.location.lat();
    var longitude = place.geometry.location.lng();
   // $("#latitude").val(latitude);
  //  $("#longitude").val(longitude);
    
    for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            // console.log("addressType:" + addressType);
            if (addressType == 'country') {
                var val = place.address_components[i].long_name;
                // console.log("val:" + val);
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
            }
        }
    
  });
});


tinymce.init({
  selector: 'textarea',
  plugins: [
  "code", "charmap", "link"
  ],
  toolbar: [
  "undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
  ]
});
</script> 