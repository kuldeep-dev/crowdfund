<section class="content-header">
  <h1>
   <?= __('Product') ?>
   <small></small>
 </h1>

</section>

<section class="content">
	<div class="row">
    <div class="col-xs-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Add Product') ?></h3> 
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($product, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
        <div class="box-body">
          <div class="form-group">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false]); ?>
            </div> 

            <?php echo $this->Form->control('user_id',['class' => 'form-control','label'=>'Seller']);?>
            <?php echo $this->Form->control('cat_id',['class' => 'form-control','label'=>'Category']);?>


            <div class="form-group"> 
              <label>Condition</label>  
              <?php echo $this->Form->select('conditions',['New'=>'New','Old'=>'Old'],['class' => 'form-control','label'=>'Conditions']);?>  
            </div>
            <?php echo $this->Form->control('price',['class' => 'form-control','min'=>1]);?> 
            <!-- <?php echo $this->Form->control('quantity',['class' => 'form-control']);?>    -->
            <?php echo $this->Form->control('description',['class' => 'form-control']);?> 
            
            <?php // echo $this->Form->control('delivery_details', ['class' => 'form-control', 'label' => 'Delivery Details']); ?>

            <?php echo $this->Form->control('color',['type'=>'text','class' => 'form-control']);?> 

            <div class="form-group">  
              <label>Where is your craft located?</label>
              <input class="form-control tlt_form_field" name="address" id="txtPlaces" type="text" placeholder="Enter your location">
              <input type="hidden" id="latitude" name="lat" class="form-control" />
              <input type="hidden" id="longitude" name="long" class="form-control" />
              <?php echo $this->Form->error('address', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div> 



            <div class="form-group">
              <label>Pick Location</label>
              <input class="form-control tlt_form_field" name="pick_location" id="pick_location" type="text" placeholder="Enter your location">
              <?php echo $this->Form->error('pick_location', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div>


            <div class="form-group">
              <label>Drop Location</label>
              <input class="form-control tlt_form_field" name="drop_location" id="drop_location" type="text" placeholder="Enter your location">
              <?php echo $this->Form->error('drop_location', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div> 



            <?php echo $this->Form->control('image',['class' => 'form-control','type'=>'file']);?>
            <div class="form-group">
             <label for="exampleInputEmail1">Status</label>
             <?php echo $this->Form->select('status', [
               '1' => 'Active',
               '0' => 'Deactive'
             ],['label' => 'Status','class' => 'form-control']);
             ?>  
           </div>


         </div>
         <!-- /.box-body -->

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
  })
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