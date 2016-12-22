<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_city_event_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/city_events/addCityEvent">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add City Event</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Name</label>
		                  <input type="text" name="name" placeholder="Event Name" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">City</label>
		                  <input type="text" name="city" placeholder="Event City" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Date</label>
		                  <input type="text" name="date" id="datepicker" placeholder="Event Date" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="status">Is Free</label>
		                  <select name="is_free" class="form-control" id="is_free">
		                  	<option value="0">Yes</option>
		                  	<option value="1">No</option>
		                  </select>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Registration Type</label>
		                  <select name="registartion_type" class="form-control" id="registartion_type">
		                  	<option value="Early Registration Rates (by January 31st, 2017)">Early Registration Rates (by January 31st, 2017)</option>
		                  	<option value="Regular Registration Rates (by February 24th, 2017)">Regular Registration Rates (by February 24th, 2017)</option>
		                  	<option value="Late Registration Rates(After February 24th, 2017) ">Late Registration Rates(After February 24th, 2017) </option>
		                  	<option value="Presentation">Presentation</option>
		                  </select>
		                </div>
		                <div class="form-group price-view hidden">
		                  <label for="photos">Price</label>
		                  <input type="number" min="1" name="price" placeholder="Price" class="form-control margin_bottom10"/>
		                </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Add City Event">ADD</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    	minDate: 0,
    	format: "yyyy-mm-dd",
        autoclose: true
    });
    $('body').on('change','#is_free',function(){
    	var type = $(this).val();
    	if(type == 0){ // free
    		$('.price-view').addClass('hidden');
    		$('input[name="price"]').attr('required',false);
    	}else{ // paid
    		$('.price-view').removeClass('hidden');
    		$('input[name="price"]').attr('required',true);
    	}
    });
  });
</script>
