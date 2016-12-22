<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'edit_city_event_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/city_events/updateCityEvent">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Edit City Event</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Name</label>
		                  <input type="text" value="<?php echo $details['name']; ?>" name="name" placeholder="Event Name" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">City</label>
		                  <input type="text" value="<?php echo $details['city']; ?>" name="city" placeholder="Event City" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Date</label>
		                  <input type="text" value="<?php echo $details['date']; ?>" name="date" id="datepicker" placeholder="Event Date" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="status">Is Free</label>
		                  <select name="is_free" class="form-control" id="is_free">
		                  	<option value="0" <?php if($details['is_free'] == 0) echo "selected"; ?>>Yes</option>
		                  	<option value="1" <?php if($details['is_free'] == 1) echo "selected"; ?>>No</option>
		                  </select>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Registration Type</label>
		                  <select name="registartion_type" class="form-control" id="registartion_type">
		                  	<option value="Early Registration Rates (by January 31st, 2017)" <?php if($details['registartion_type'] == 'Early Registration Rates (by January 31st, 2017)') echo "selected"; ?>>Early Registration Rates (by January 31st, 2017)</option>
		                  	<option value="Regular Registration Rates (by February 24th, 2017)" <?php if($details['registartion_type'] == 'Regular Registration Rates (by February 24th, 2017)') echo "selected"; ?>>Regular Registration Rates (by February 24th, 2017)</option>
		                  	<option value="Late Registration Rates(After February 24th, 2017)" <?php if($details['registartion_type'] == 'Late Registration Rates(After February 24th, 2017)') echo "selected"; ?>>Late Registration Rates(After February 24th, 2017) </option>
		                  	<option value="Presentation" <?php if($details['registartion_type'] == 'Presentation') echo "selected"; ?>>Presentation</option>
		                  </select>
		                </div>
		                <input type="hidden" name="id" value="<?php echo $details['id']; ?>">
		                <div class="form-group price-view <?php if($details['is_free'] == 0) echo "hidden"; ?>">
		                  <label for="photos">Price</label>
		                  <input type="number" min="1" value="<?php echo $details['price']; ?>" name="price" placeholder="Price" <?php if($details['is_free'] == 1) echo "required"; ?> class="form-control margin_bottom10"/>
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
