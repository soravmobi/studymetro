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
                            </ul>
                        </div>
                    </div>