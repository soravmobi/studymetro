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
                                <?php if(!empty($programs)) { $i = 1; foreach($programs as $p){ ?>
                                    <div class="search_box_content" <?php if($i == 1) echo "style='margin-top:0px;'"; ?>>
                                        <div class="univer_box">
                                            <div class="univ_logo">
                                                <a href="<?php echo base_url(); ?>university/details/<?php echo encode($p['id']); ?>"> <img src="<?php echo $p['logo']; ?>" class="img-responsive"></a>
                                                <div class="univ_meta">
                                                    <span class="univ_name"><a href="<?php echo base_url(); ?>university/details/<?php echo encode($p['id']); ?>"><?php echo $p['name']; ?></a></span>
                                                    <p><i class="fa fa-map-marker"></i> <?php echo $p['location']; ?>, <?php echo $p['country']; ?> </p>
                                                </div>
                                            </div>
                                            <ul class="univ_info">
                                                <li><span> <i class="fa fa-university" aria-hidden="true"></i>  Founded in : </span><?php echo $p['founded']; ?></li>
                                                <li> <span> <i class="fa fa-university" aria-hidden="true"></i> Institution Type :</span><?php echo $p['institution']; ?> </li>
                                                <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Estimated Cost of living :</span><?php echo $p['estimated_cost']; ?> </li>
                                                <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Tuition Fee : </span>$<?php echo $p['tution_fee']; ?></li>
                                            </ul>
                                        </div>
                                        <?php 
                                            $programs_list = getProgramsBy('university_id',$p['id']);
                                            if(!empty($programs_list)){ foreach($programs_list as $pl){ ?>
                                            <div class="univer_box course_detail">
                                                <div class="univ_logo">
                                                    <div class="univ_meta">
                                                        <a href="javascript:void(0)" title="<?php echo $pl['program_name']; ?>"> 
                                                        <?php echo substr($pl['program_name'], 0,40); ?>
                                                         <span class="course_meta"> <?php echo $pl['location']; ?></span>       
                                                        </a>
                                                         <i class="fa fa-star star"></i>
                                                    </div>
                                                </div>
                                                <ul class="univ_info">
                                                    <li>$<?php echo $pl['application_fee']; ?> USD/year</li>
                                                </ul>
                                                <div class="unive_data"><?php echo $pl['course_type']; ?></div>
                                                <div class="apply_now_wrap pull-right">
                                                   <a href="javascript:void(0);" class="appy_btn">apply to this program</a>
                                                    <!-- <a href="#" class="appy_btn">apply to this program</a> -->
                                                    <!-- <a href="#" class="appy_btn">apply to this program</a> -->
                                                </div>
                                                
                                            </div>
                                            <div class="clearfix"></div>
                                        <?php } } ?>
                                    </div>
                                    <!-- <div class="search_box_top">
                                        <ul id="pagination-demo" class="pagination-sm"></ul>
                                    </div> -->
                                    <?php $i++; } } else{ ?>
                                        <div class="well text-center">Programs not found</div>
                                    <?php } ?>
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
    $('.pagination-sm').twbsPagination({
        totalPages: 25,
        visiblePages: 5,
        onPageClick: function (event, page) {
            
        }
    });
});
</script>

