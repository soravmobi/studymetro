    <!--Main container sec start-->
    <div class="main_container">
    
      <section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
      
        <?php if($details['media'] == 1){ ?>
          <video controls autoplay loop id="bg_video">
                <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
                <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
              </video>
        <?php } ?>

        <div class="banner_search_wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                      <div id="rootwizard">
                            
                            
                            <div class="tab_box_content">
                            <form class="search_form">
                                 
                              <div class="navbar-inner clearfix">
                                <div class="txt_search pull-left">
                                Answer 3 simple questions to see matching programs
                              </div>
                            <ul class="pull-right">
                                <li><a href="#tab1" data-toggle="tab">1</a>
                                </li>
                                <li><a href="#tab2" data-toggle="tab">2</a>
                                </li>
                                <li><a href="#tab3" data-toggle="tab">3</a>
                                </li>
                                </li>
                             </ul>
                              </div>
                           
                            <div class="tab-content">
                                <div class="tab-pane" id="tab1">
                                
                            
                                <div class="search_form_content home_page_search">
                                  <div class="select_field">
                                    <label>Select the fields</label>
                                  </div>
                                  <div class="form-group">
                                    <div class="select_box">
                                      <select id="thechoices" class="form-control">
                                      
                                        <option class="bg_none" value="option2">Sciences</option>
                                        <option class="bg_none" value="option3">Arts</option>
                                          <option class="bg_none" value="option4">Management</option>
                                      </select>
                                      <i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
                                    </div>
                                  </div>
                                  <div id="boxes">
                                <div class="group" id="option1" style="display: none;">
                                  <ul class="list_field">
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                    <li><a href="#">Electrical Engineering</a></li>
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                    <li><a href="#">Electrical Engineering</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Civil Engineering, Construction</a></li>
                                    <li><a href="#">Architecture</a></li>
                                  
                                  </ul>
                                </div>
                                <div class="group" id="option2">
                                    <ul class="list_field">
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                    <li><a href="#">Electrical Engineering</a></li>
                                  
                                    </ul>
                                </div>
                                <div class="group" id="option3" style="display: none;">
                                  <ul class="list_field">
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                    <li><a href="#">Electrical Engineering</a></li>
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                    <li><a href="#">Electrical Engineering</a></li>
                                    </ul>
                                </div>
                                <div class="group" id="option4" style="display: none;">
                                  <ul class="list_field">
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                    <li><a href="#">Electrical Engineering</a></li>
                                    <li><a href="#">Technology, Software, Computer, IT, CS</a></li>
                                  
                                    </ul>
                                </div>
                                  </div>
                                  

                                </div>
                              </form>
                                                  
                                </div>
                                <div class="tab-pane" id="tab2">
                                 <h4> Do you have IELTS, TOEFL, GRE or GMAT scores?</h4>
                                 <div class="score_box">
                                   <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    I dont have score
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    i have score 
                                  </label>
                                </div>
                                <div class="enter_score">
                                 <label> Please enter score</label>
                                 <input type="text" class="form-control">
                                </div>
                                 </div>
                                </div>
                                <div class="tab-pane budget" id="tab3">
                                  <h4>How much funds do you have available per year to cover your education</h4>
                                  <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                   $0 to $15000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    $15000 to $20000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    $20000 to $25000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option2">
                                    $25000 to $30000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    $30000 to $35000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios4" value="option2">
                                    $35000 to $40000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    $40000 to $45000 
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2">
                                   $50000+ 
                                  </label>
                                </div>
                                </div>
                               
                                
                                <ul class="pager wizard button_box">
                                    <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                    <li class="previous"><a href="#"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a></li>

                                    <li class="next last" style="display:none;"> <a href="#">Last</a> </li>
                                    <li class="next"><a href="#">Continue <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></li>

                                </ul>
                            </div>	
                        </div>
					
                
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="why_us">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="head_why_us">
                Welcome to Study Metro
              </div>
              <div class="content_why_us">
                <?php echo $details['content']; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="video_sec">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-3">
              <?php 
                echo getSideBarVideos();
                echo getSideBarEvents();
              ?>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="video_box">
                <div class="video_head">
                  Watch our Company Video
                </div>
                <div class="video_content">
                  <iframe width="100%" height="500" src="https://www.youtube.com/embed/SMGc8rWrjl0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php if($details['photo_gallery'] == 0) { 
    echo getPhotosGallery();
} ?>

<section class="how_works_wrap">
  <div class="container">
    <div class="common_head footer_head">
      <h2>How it works</h2>
      <div class="head_border">
        <span><i aria-hidden="true" class="fa fa-ioxhost"></i></span>
      </div>
    </div>
    <div class="how_works_content">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="work_block">
            <div class="work_block_head">
              <div class="wbh_number pull-left">
                01
              </div>
              <div class="wbh_icon pull-right">
                <i class="flaticon-the-white-house-in-eeuu"></i>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="work_block_content">
              <img src="<?php echo base_url(); ?>assets/images/img1.jpg" class="img-responsive">
              <span class="meta_work_img">Call us   8088-867-867</span>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="work_block">
            <div class="work_block_head">
              <div class="wbh_number pull-left">
                02
              </div>
              <div class="wbh_icon pull-right">
                <i class="flaticon-the-white-house"></i>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="work_block_content">
              <img src="<?php echo base_url(); ?>assets/images/img2.jpg" class="img-responsive">
              <span class="meta_work_img">Get Advice for Work and Study in Abroad </span>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="work_block">
            <div class="work_block_head">
              <div class="wbh_number pull-left">
                03
              </div>
              <div class="wbh_icon pull-right">
                <i class="flaticon-sydney-opera-house"></i>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="work_block_content">
              <img src="<?php echo base_url(); ?>assets/images/img3.jpg" class="img-responsive">
              <span class="meta_work_img">Apply for Visa and Study at your Preferred University</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if($details['scholar_form'] == 0) { 
    echo getScholarshipForm();
} ?>

<?php if($details['is_testimonails'] == 0) { 
    echo getTestimonails();
} ?>

<?php if($details['video_gallery'] == 0) { 
    echo getVideoGallerySection();
} ?>

    </div>

    <!--Main container sec end-->
