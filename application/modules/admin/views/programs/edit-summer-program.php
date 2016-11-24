<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'edit_summer_program_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" action="<?php echo base_url(); ?>admin/programs/updateSummerProgram" id="program_form">

	          <!-- Validation error and flash data -->
                <div class="alert alert-danger alert-dismissable errors-msgs hidden">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>

	          <div class="box-header with-border">
	            <h3 class="box-title">General Information</h3>
          	  </div>

	            <div class="box-body">
	            	

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="name">University</label>
			                  <input type="text" required name="university" value="<?php echo $details['university']; ?>" class="form-control" id="university" placeholder="Enter University" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="founded">Location</label>
			                  <input type="text" required name="location" value="<?php echo $details['location']; ?>" class="form-control" id="location" placeholder="Enter Location"/>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="name">Country</label>
			                  <select name="country" required class="form-control select_country" id="country">
			                  	<option value="">Select Country</option>
			                  	<?php foreach(countries() as $c) { ?>
							      	<option value="<?php echo $c; ?>" <?php if($details['country'] == $c) echo "selected"; ?>><?php echo $c; ?></option>
							      <?php } ?>
						      </select>
			                </div>
			            </div>
			           <div class="col-md-6">
			                <div class="form-group">
			                  <label for="founded">Start Date</label>
			                  <input type="text" required name="period" value="<?php echo $details['period']; ?>" class="form-control" id="period" placeholder="Enter Start Date"/>
			                </div>
			            </div>
		            </div>
		            <input type="hidden" name="id" value="<?php echo $details['id']; ?>">
		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="name">Tution Fee (Dollar)</label>
			                  <input type="text" required name="dollar_fee" value="<?php echo $details['dollar_fee']; ?>" class="form-control" id="dollar_fee" placeholder="Enter Tution Fee (Dollar)" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="founded">Tution Fee (In Rupees)</label>
			                  <input type="text" required name="inr_fee" value="<?php echo $details['inr_fee']; ?>" class="form-control" id="inr_fee" placeholder="Enter Tution Fee (In Rupees)"/>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="name">Courses</label>
			                  <input type="text" required name="courses" value="<?php echo $details['courses']; ?>" class="form-control" id="courses" placeholder="Enter Courses" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="founded">Eligibility</label>
			                  <input type="text" required name="eligibility" value="<?php echo $details['eligibility']; ?>" class="form-control" id="eligibility" placeholder="Enter Eligibility"/>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="address">Customise Programs</label>
			                  <select name="customise_programs" class="form-control" id="customise_programs">
			                  	<option value="">Select Customise Programs</option>
			                  	<option value="Yes" <?php if($details['customise_programs'] == 'Yes') echo "selected"; ?>>Yes</option>
			                  	<option value="No" <?php if($details['customise_programs'] == 'No') echo "selected"; ?>>No</option>
						      </select>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="address">Website link</label>
			                  <input type="url" name="link" value="<?php echo $details['link']; ?>" class="form-control" id="link" placeholder="Enter Website Link"/>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="address">Application Fee</label>
			                  <input type="number" required min="0" name="application_fee" value="<?php echo $details['application_fee']; ?>" class="form-control" id="application_fee" placeholder="Enter Application Fee"/>
			                </div>
			            </div>
		            </div>

	            </div><!-- .box-body -->	

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Edit Summer Program">EDIT</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

