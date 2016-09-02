        <!--Main container sec start-->
        <div class="main_container">
            <section class="banner inner_banner" style="background-image:url(../assets/images/FAQ-Banner.png);">

               
            </section>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="profile_main">
                      <div class="profile_sec">
                         <div class="top_row">
                             <h3><?php echo $detail[0]['first_name']." ".$detail[0]['last_name'];?></h3>
                          </div> 
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
                          </div>
                        </form>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/user/updateProfile">
                       <div class="profile_sec">
                         <div class="top_row">
                             <h3>Personal Details</h3>
                           
                          </div> 
                          <div class="profile_content">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
