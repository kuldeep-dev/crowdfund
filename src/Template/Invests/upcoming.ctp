
<section class="st_content">
    <section class="trip-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-sec">
              <div class="head-sec">
                <h2>My Upcoming Trips</h2>
              </div>
              <div class="trip-list">
                        

                <ul>
                <?php if(!empty($yourorders)){
                	$count  = 0;
                        foreach($yourorders as $order){
                          
                          if (strtotime($order['start_date']) >= time())
                          {
                            $count = 1;
                        ?>
                  <li>
                    <span class="img-crafting">
                    <a href="<?php echo $this->request->webroot."products/booking/" . $order['product']['id'];?>">
                      <img src="<?php echo $this->request->webroot."images/products/".$order['product']['image']; ?>" alt="Boat Image"></a>
                    </span>
                    <h5><a href="<?php echo $this->request->webroot."products/booking/" . $order['product']['id'];?>"><?php echo $order['product']['name'] ?></a></h5>
                    <ul class="details">
                      <li>
                         <label>Date: <?php echo " ". $order['start_date'] ?><?php echo " " ?><?php echo " To "." ". $order['end_date'] ?></label> 
                      </li>
                      <li>
                        <label>Time:</label> <?php echo " ". $order['start_time'] ?><?php echo " " ?><?php  echo " - "." ". $order['end_time'] ?>
                      </li>
                      <li>
                        <label>Price:</label> $<?php echo " ". $order['total_price']?>
                      </li>
                    <li>
                        <label>Review:</label><?php echo " ".$order['review']['review']?>
                      </li>
                      <div class="star_rating">
                  <?php
                        $star =  $order['review']['rating'];
                      for ($i=1; $i <= $star; $i++) {
                          echo "<i class='sr_icon'></i>";
                       } ?>
                      
                    </div>

                    </ul>
                    <div class="pull-right" style="margin-top: 10px;"> 
                        <?php //if($order['review'] == ""){ ?>
                        <!-- <button type="button" class="btn btn-warning pull-right addreview" id="addreview" data-productid="<?php echo $order['product']['id']; ?>" data-orderid="<?php //echo $order['id']; ?>">Write a review</button> -->
                        <?php //}else{ ?>
                        <!-- <button type="button" class="btn btn-warning pull-right" disabled="disabled">Reviewed</button> -->
                        <?php //} ?>
                    </div>
                   
                  </li>
                  <?php } }  if($count == 0)
                {
                  echo "No upcoming trips.";
                }} 

                
                ?> 
                  
                </ul>
                


              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </section><!-- Contact Section End Here -->
  </section><!-- Content Section End Here -->
 
<!-- Modal -->
<div id="reviewModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rating & Review</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="alert alert-success" style="display:none;">Your Review has been successfully submitted.</div>
            <div class="review_sec">
            <form method="post" id="review-form">
                <div class="star-reviw">
                    <div class="star rating" id="rating"> 
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <input type="hidden" name="rating" id="ratings1">  
                    </div>   
                </div>
                <div class="form-group">
                    <label for="email">Write a Review:</label>
                    <textarea class="form-control" name="review"></textarea>
                </div>
                <input type="hidden" name="order_id" />
                <input type="hidden" name="product_id" />
                <button type="button" id="sbt-rev" class="btn btn-success pull-right no-border">Submit</button>
            </form>    
            </div>
        </div>
      </div>
      
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover'
    });
});

$(".addreview").click(function(){
  var order_id = $(this).attr('data-orderid');
  var product_id = $(this).attr('data-productid');
  $('input[name="order_id"]').val(order_id);
  $('input[name="product_id"]').val(product_id);
  $("#reviewModal").modal();
  
});

$('.rating i').each(function(){
  $(this).click(function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).prevAll().addClass('active');
      var rate = $('#rating .active').length;
    }else{
      $(this).nextAll().removeClass('active');
      var rate = $('#rating .active').length;
    }

    $('#ratings1').val(rate);
     
  });
});

$(document).delegate('#sbt-rev', 'click', function(){
  
  var rating = $("#ratings1").val();
  var review = $('textarea[name="review"]').val();
  if(rating == 0){
    alert("Please give star rating");
  }else if(review == ''){
    alert("Please give review");
  }else{
    $.ajax({
      url: '<?php echo $this->request->webroot ?>reviews/addreview',
      data: $("#review-form").serialize(),
      method: 'post',
      success: function(response){
        if(response == 'success'){
          $('#reviewModal .alert').css('display', 'block');
          $('#reviewModal .review_sec').css('display', 'none');
          
          $(document).click(function(){
            location.reload();
          });
        }
      }
    });
  }
});


$('#sbt-rev').click(function() {
    $('#reviewModal').modal('hide');
    location.reload();
});

</script>