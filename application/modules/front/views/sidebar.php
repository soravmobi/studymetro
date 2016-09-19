 <div class="col-md-3 col-sm-3">
            <?php
              $detail = getUserDetails();
              $user_type = $this->session->userdata('user_type');
            ?>
                        <div class="left_dashboard">
                        <form class="form-horizontal" id="img-form" enctype="multipart/form-data" method="post">
                            <div class="profile_content">
                                <div class="file_btn file_btn_logo">
                                 <input type="file" class="input_img1" id="edit_pic" name="userfile" style="display: inline-block;">
                                 <span class="glyphicon input_img1 logo_btn" style="display: block;">
                                 <span class="posi_logo">
                                  <?php 
                                    if(empty($detail[0]['photo'])){
                                      $file_name = 'default.jpg';
                                    }else{
                                      $file_name = $detail[0]['photo'];
                                    }
                                  ?>
                                    <img class="show_img1" src="<?php echo base_url(); ?>uploads/users/<?php echo $file_name; ?>">
                                  </span><i class="fa fa-camera"></i></span></span>
                                </div>
                                <div class="profile_name"><a href="<?php echo base_url(); ?>user/profile"><?php echo ucwords($detail[0]['first_name']); ?></a></div>
                            </div>
                            </form>
                            <ul class="list_dash">
                                <li <?php if(isset($parent) && $parent == 'dashboard') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/dashboard">Global Wall <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <!-- <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Get a Quote <i class="fa fa-chevron-right pull-right"></i></a>
                                 <ul class="dropdown-menu">
                                            <li class="active"><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                           
                                    </ul>
                                </li> -->
                                <li><a href="#">Find Schools <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <li><a href="#">Find Agents <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <li <?php if(isset($parent) && $parent == 'profile') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/profile">My Profile <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'upload_documents') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/upload_documents">Upload Documents <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3','5'))) { ?>
                                  <li><a href="https://live.vcita.com/site/33412ea9518e6493/online-scheduling?staff=4b97eb70eb924ade" target="_blank">Online Schedule Meeting <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','5'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'feedback') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/feedback">Feedback <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                  <li><a href="<?php echo base_url(); ?>faqs">Visa Guidance <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'quote') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>student/getquote">Get Quote <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'notes') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/notes">Notes <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                 <?php if(in_array($user_type, array('2','3','4','5','6'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'emails') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/emails">Emails <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'portfolio') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>student/portfolio">E-portfolio <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
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