<div class="main_container">

<section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
    <?php if($details['media'] == 1){ ?>
        <video controls autoplay loop id="bg_video">
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
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo (isset($_GET['country'])) ? str_replace('%20', ' ', $_GET['country']) : 'Canada'; ?>
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <?php foreach(countries() as $c) { ?>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>university?country=<?php echo $c; ?>" title="<?php echo $c; ?>"><?php echo $c; ?></a></li>
                <li role="presentation" class="divider"></li>
            <?php } ?>
        </ul>
    </div>
    <div class="university_wrap_content">
        <div class="row">
        <?php foreach($universities as $u) { ?>
            <div class="col-md-3 col-sm-3">
                <div class="university_box">
                    <div class="country_flag">
                        <img src="<?php echo base_url(); ?>assets/images/<?php echo getCountryFlag($u['country']); ?>" class="img-responsive">
                    </div>
                    <div class="img_ub">
                        <img src="<?php echo (!empty($u['logo'])) ? $u['logo'] : base_url().'assets/images/not-available.jpg'; ?>" class="img-responsive">
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


