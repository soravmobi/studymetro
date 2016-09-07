        <!--Main container sec start-->
        <div class="main_container">
            <section class="banner inner_banner" style="background-image:url(../assets/images/FAQ-Banner.png);">

               
            </section>
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Profile
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                        <div class="col-md-9 col-sm-9">
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/user/updateProfile">
                       <div class="profile_sec">
                         <div class="top_row">
                             <h3>My Contact Information</h3>
                           
                          </div> 
                          <div class="profile_content">
                              <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Username:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" value="<?php if(isset($detail[0]['username'])) echo $detail[0]['username']; ?>" placeholder="Username">
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> First Name:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="first_name" value="<?php if(isset($detail[0]['first_name'])) echo $detail[0]['first_name']; ?>" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Last Name:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="last_name" value="<?php if(isset($detail[0]['last_name'])) echo $detail[0]['last_name']; ?>" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Email:</label>
                                    <div class="col-sm-9">
                                    <input type="email" readonly class="form-control" value="<?php if(isset($detail[0]['email'])) echo $detail[0]['email']; ?>" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Date Of Birth:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" name="dob" main="past" value="<?php if(isset($detail[0]['dob'])) echo $detail[0]['dob']; ?>" placeholder="Date Of Birth">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Gender:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="gender">
                                      <option value="">Select Gender</option>
                                      <option value="Male" <?php if(isset($detail[0]['gender']) && $detail[0]['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                      <option value="Female" <?php if(isset($detail[0]['gender']) && $detail[0]['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Country:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="country">
                                      <option value="">Select Country</option>
                                      <?php foreach(getCountries() as $c) { ?>
                                        <option value="<?php echo $c['nicename']; ?>" <?php if(isset($detail[0]['country']) && $detail[0]['country'] == $c['nicename']) echo 'selected'; ?>><?php echo $c['nicename']; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> City:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" value="<?php if(isset($detail[0]['city'])) echo $detail[0]['city']; ?>" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Phone Code:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="phone_code">
                                      <option value="">Select Phone Code</option>
                                      <?php foreach(getCountries() as $c) { ?>
                                        <option value="<?php echo $c['phonecode']; ?>" <?php if(isset($detail[0]['phone_code']) && $detail[0]['phone_code'] == $c['phonecode']) echo 'selected'; ?>><?php echo $c['nicename']." +".$c['phonecode']; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Phone:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" onkeypress="return validateNumbers(event)" value="<?php if(isset($detail[0]['phone'])) echo $detail[0]['phone']; ?>" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Education Level:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="education">
                                      <option value="">Select Education Level</option>
                                      <?php foreach(getEducationLevels() as $c) { ?>
                                        <option value="<?php echo $c; ?>" <?php if(isset($detail[0]['education']) && $detail[0]['education'] == $c) echo 'selected'; ?>><?php echo $c; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Profession:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="profession">
                                      <option value="">Select Profession</option>
                                      <?php foreach(getProfession() as $c) { ?>
                                        <option value="<?php echo $c; ?>" <?php if(isset($detail[0]['profession']) && $detail[0]['profession'] == $c) echo 'selected'; ?>><?php echo $c; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Citizenship:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="citizenship">
                                      <option value="">Select Citizenship</option>
                                    </select>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Native Language:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="native_lang">
                                      <option value="">Select Native Language</option>
                                    </select>
                                    </div>
                                </div> -->
                               <span ><button class="commn_btn">UPDATE</button></span>
                               <span><a href="javascript:void(0);" class="commn_btn" onclick="cancelAction()">CANCEL</a></span>
                          </div>
                      </div>
                    
                     
                        </form>
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
        $('body').on('change','#edit_pic',function(){
        var file_name = $(this).val();
        var fileObj = this.files[0];
        var calculatedSize = fileObj.size/(1024*1024);
        var split_extension = file_name.split(".").pop();
        var ext = [ "jpg", "gif", "png", "jpeg" ];
        if($.inArray(split_extension.toLowerCase(), ext ) == -1)
        {
          $('#edit_pic').val(fileObj.value = null);
          showToaster('error','You Can Upload Only .jpg, gif, jpeg, png files !');
          return false;
        }
        else if(calculatedSize > 5)
        {
          $('#edit_pic').val(fileObj.value = null);
          showToaster('error','File size should be less than 5 MB !');
          return false;
        }
        if($.inArray(split_extension.toLowerCase(), ext ) != -1 && calculatedSize < 5)
        {
          var data = new FormData($('#img-form')[0]);
          $.ajax({
                type: "POST",
                url : "<?php echo base_url(); ?>front/user/updateProfileImage",
                data: data,
                dataType : "JSON",
                contentType: false,
                processData: false,
                success: function(resp){
                  if(resp.type == 'error'){
                    showToaster('error',resp.msg);
                  }else{
                    $('.show_img1').attr('src',resp.path);
                    showToaster('success',resp.msg);
                  }
                },
                error:function(error)
                {
                  showToaster('error','Internal server error !');  
                }
            });
          
        }
      });
      });
    </script>
