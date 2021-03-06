       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Programs
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                      <div class="right_dashboard">
                        <form role="form" method="post" action="<?php echo base_url(); ?>university/add-new-program" id="program_form">

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
                        <label for="name">Name</label>
                        <input type="text" name="program_name" class="form-control <?php if(form_error('program_name')) { echo 'valid_error'; } ?>" id="program_name" placeholder="Enter Program Name" />
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="founded">Location</label>
                        <input type="text" name="location" class="form-control <?php if(form_error('location')) { echo 'valid_error'; } ?>" id="location" placeholder="Enter Location"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Country</label>
                        <select name="country" class="form-control select_country <?php if(form_error('country')) { echo 'valid_error'; } ?>" id="country">
                          <option value="">Select Country</option>
                          <?php foreach(countries() as $c) { ?>
                      <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                    <?php } ?>
                  </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="founded">University</label>
                        <select name="university_id" class="form-control select_university <?php if(form_error('university_id')) { echo 'valid_error'; } ?>" id="university_id">
                          <option value="">Select University</option>
                  </select>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="location">Course Type</label>
                        <select name="course_type" class="form-control <?php if(form_error('course_type')) { echo 'valid_error'; } ?>" id="course_type">
                          <option value="">Select Course Type</option>
                          <?php foreach(getCourseTypes() as $ct) { ?>
                            <option value="<?php echo $ct; ?>"><?php echo $ct; ?></option>
                          <?php } ?>
                  </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">IELTS/TOEFL/PTE</label>
                        <input type="text" name="ielts_toefl_pte" class="form-control" id="ielts_toefl_pte" placeholder="Enter IELTS/TOEFL/PTE"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">ESL Program</label>
                        <input type="text" name="esl_program" class="form-control" id="esl_program" placeholder="Enter ESL Program"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">GRE/ SAT</label>
                        <input type="text" name="gre_sat" class="form-control" id="gre_sat" placeholder="Enter GRE/ SAT"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Application Fee</label>
                        <input type="number" min="0" name="application_fee" class="form-control <?php if(form_error('application_fee')) { echo 'valid_error'; } ?>" id="application_fee" placeholder="Enter Application Fee"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Eligiblity Criteria</label>
                        <input type="text" name="criteria" class="form-control" id="criteria" placeholder="Enter Eligiblity Criteria"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Intake Date</label>
                        <input type="text" name="intake_date" class="form-control" id="intake_date" placeholder="Enter Intake Date"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Required Bank Statement For Admission</label>
                        <input type="text" name="bank_statement" class="form-control" id="bank_statement" placeholder="Enter Required Bank Statement For Admission"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Duration</label>
                        <input type="text" name="duration" class="form-control" id="duration" placeholder="Enter Duration"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Tuition Fees</label>
                        <input type="text" name="tution_fee" class="form-control" id="tution_fee" placeholder="Enter Tuition Fees"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">University Scholarship</label>
                        <select name="university_scholarship" class="form-control" id="university_scholarship">
                          <option value="">Select University Scholarship</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                  </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Website link</label>
                        <input type="url" name="website_lnik" class="form-control" id="website_lnik" placeholder="Enter Website Link"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Study Metro Scholarship</label>
                        <input type="text" name="study_metro_scholarship" class="form-control" id="study_metro_scholarship" placeholder="Enter Study Metro Scholarship"/>
                      </div>
                  </div>
                </div>

              </div><!-- .box-body -->  

              <div class="box-footer">
              <button type="submit" class="btn btn-primary" title="Add Program" id="add-university-btn">ADD</button>
              <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
              </div>
            </form>
                      </div>
                     </div> 
                    </div>
                   </div>
                 </div>
                </div>
                </div>
            </section>


        </div>
        <!--Main container sec end-->
<script type="text/javascript">

  $(document).ready(function(){

  /**************** Get University Start ***************/

  $('body').on('change','.select_country',function(){
    var country = $(this).val();
    var appendHTML = '<option value="">Select University</option>';
    if(country == ''){
      $('.select_university').html(appendHTML);
      return false;
    }else{
       $.ajax({
        url :"<?php echo base_url(); ?>admin/programs/getUniversities",
        type:"POST",
        data:{country:country},
        dataType:"JSON",
        beforeSend: function() {
          ajaxindicatorstart();
        }, 
        success: function(resp)
        {
          if(resp != ''){
            for (var i = 0; i < resp.length; i++) {
              appendHTML += '<option value="'+resp[i]['id']+'">'+resp[i]['name']+'</option>';
            }
          }
          $('.select_university').html(appendHTML);
          ajaxindicatorstop();
        },
        error:function(error)
        {
          ajaxindicatorstop();
        }
      });
    }
  }); 

  /**************** Get University End *****************/

});

</script>