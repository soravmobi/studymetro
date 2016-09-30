<div class="main_container">

<section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
    <?php if($details['media'] == 1){ ?>
        <video controls autoplay muted loop id="bg_video">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
        </video>
    <?php } ?>
    <?php if($details['study_program'] == 0) { 
        echo getSeacrhStudyPrograms();
    } ?>
</section>

<section class="video_sec">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
                            <div class="search_box">
                                
                                     <div class="head_university" >
                                    <label>Filter:</label>
                                    <div class="form-group">
                                        <?php foreach(countries() as $c) { ?>
                                            <input id="<?php echo $c; ?>" name="country" value="<?php echo $c; ?>" class="BSswitch select_country" type="radio" data-off-text="False" data-on-text="True" <?php if(isset($_GET['country']) && $_GET['country'] == $c) { echo "checked"; } else if(!isset($_GET['country']) && $c == 'USA') { echo "checked"; } ?>>
                                            <label for="<?php echo $c; ?>"><?php echo $c; ?></label>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="search_box_content" style="margin-top:0px;">
                                    <div class="univer_box">
                                        <div class="univ_logo">
                                            <a href="#"> <img src="<?php echo base_url(); ?>assets/images/univ_logo.png"></a>
                                            <div class="univ_meta">
                                                <span class="univ_name"><a href="#">university name</a></span>
                                                <p><i class="fa fa-map-marker"></i> Regina, Saskatchewan, Canada </p>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li><span> <i class="fa fa-university" aria-hidden="true"></i>  Founded in : </span>                                                2000</li>
                                            <li> <span> <i class="fa fa-university" aria-hidden="true"></i> Institution Type :</span>                                                Public </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Estimated Cost of living :</span>                                                $10334.0 USD per year </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Tuition Fee : </span> $10012.0
                                                USD - $18380.0 USD per year</li>
                                        </ul>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachlor of Arts - Anthropology (Biological Anthropology)

                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                                <i class="fa fa-star star"></i>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="more_info">
                                            <input type="checkbox" class="read-more-state" id="post-1" />
                                            <label for="post-1" class="read-more-trigger"></label>
                                            
                                            <div class="read-more-wrap">
                                                <div class="read-more-target">
                                                     <div class="read_more_info">
                                                         Length: <b>2 year graduate certificate including 1 semester (4 months) of paid co-op.       </b>
                                                     </div>
                                                      <div class="read_more_info">
                                                         Tuition: <b> $11,368 CAD/year</b>
                                                         <p>Application Fee: </p>
                                                         <p> <span class="new_price">$80.75 CAD</span></p>
                                                     </div>
                                                     <div class="read_more_info">
                                                         Average processing time: <b>30 days</b>        
                                                     </div>
                                                    </div>
                                                </div>
                                            </div>     
                                        </div>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachlor of Human Resource
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                                 <i class="fa fa-star star"></i>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                           <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachlor of Arts 
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                                 <i class="fa fa-star star"></i>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachlor of commerce
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                                 <i class="fa fa-star star"></i>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="search_box_content">
                                    <div class="univer_box">
                                        <div class="univ_logo">
                                            <a href="#"> <img src="<?php echo base_url(); ?>assets/images/univ_logo1.png"></a>
                                            <div class="univ_meta">
                                                <span class="univ_name"><a href="#">Rice university</a></span>
                                                <p><i class="fa fa-map-marker"></i> Newyork, USA </p>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li><span> <i class="fa fa-university" aria-hidden="true"></i>  Founded in : </span>                                                2000</li>
                                            <li> <span> <i class="fa fa-university" aria-hidden="true"></i> Institution Type :</span>                                                Public </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Estimated Cost of living :</span>                                                $10334.0 USD per year </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Tuition Fee : </span> $10012.0
                                                USD - $18380.0 USD per year</li>
                                        </ul>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                Master of science
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachelor of Science - Geology
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                                 <i class="fa fa-star star"></i>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachelor of Science - Geology
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="univer_box course_detail">
                                        <div class="univ_logo">
                                            <div class="univ_meta">
                                                <a href="#"> 
                                                 Bachelor of Engineering
                                                 <span class="course_meta"> 4 year bachelor degree</span>       
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li>$18212.0 USD/year</li>
                                        </ul>
                                        <div class="apply_now_wrap pull-right">
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                            <a href="#" class="appy_btn">apply to this program</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <br/>
                            </div>
    </div>
</div>
</section>

<?php if($details['is_services'] == 0) { 
    echo getOurServices();
} ?>

<?php if($details['photo_gallery'] == 0) { 
    echo getPhotosGallery();
} ?>

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

<script>
$(document).ready(function(){
    $('.select_country').on('switchChange.bootstrapSwitch', function (event, state) {
        var country = $(this).val();
        window.location.href = "<?php echo base_url(); ?>search-programs?country="+country;
    })
    $('.star').click(function(){
        $(this).toggleClass('clicked');
    });
});
</script>

