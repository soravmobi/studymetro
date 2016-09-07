<div class="main_container">

<section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
    <?php if($details['media'] == 1){ ?>
        <video controls autoplay loop id="bg_video" muted>
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
        </video>
    <?php } ?>
    <?php if($details['study_program'] == 0) { 
        echo getSeacrhStudyPrograms();
    } ?>
</section>

<div class="col-md-12 col-sm-12">
<div class="university_wrap">
    <br/>
    <div class="head_university">
        <label>Filter:</label>
        <div class="form-group">
        <?php foreach(countries() as $c) { ?>
            <input id="<?php echo $c; ?>" name="country" value="<?php echo $c; ?>" class="BSswitch select_country" type="radio" data-off-text="False" data-on-text="True" <?php if(isset($_GET['country']) && $_GET['country'] == $c) { echo "checked"; } else if(!isset($_GET['country']) && $c == 'USA') { echo "checked"; } ?>>
            <label for="<?php echo $c; ?>"><?php echo $c; ?></label>
        <?php } ?>
        </div>
    </div>
    <div class="university_wrap_content">
        <div class="row">
        <?php foreach($universities as $u) { ?>
            <div class="col-md-3 col-sm-3">
                <div class="university_box">
                    <div class="country_flag">
                        <a href="<?php echo base_url(); ?>university/details/<?php echo encode($u['id']); ?>"><img src="<?php echo base_url(); ?>assets/images/<?php echo getCountryFlag($u['country']); ?>" class="img-responsive"></a>
                    </div>
                    <div class="img_ub">
                        <a href="<?php echo base_url(); ?>university/details/<?php echo encode($u['id']); ?>"><img src="<?php echo (!empty($u['logo'])) ? $u['logo'] : base_url().'assets/images/not-available.jpg'; ?>" class="img-responsive"></a>
                    </div>
                    <div class="head_ub"><a href="<?php echo base_url(); ?>university/details/<?php echo encode($u['id']); ?>"><?php echo $u['name']; ?></a></div>
                    <div class="description_ub">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i></span> <?php echo $u['location']; ?>
                        <?php echo $u['country']; ?> Cost of living: <?php echo $u['estimated_cost']; ?> CAD/year</div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
</div>
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
            <div class="about_content">
                <?php echo $details['content']; ?>
            </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('.select_country').on('switchChange.bootstrapSwitch', function (event, state) {
            var country = $(this).val();
            window.location.href = "<?php echo base_url(); ?>university?country="+country;
        })
    });
</script>

