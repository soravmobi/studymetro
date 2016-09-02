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
<section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="blog_box">
                                <h2>Study Abroad Article</h2>
                                <div class="blog_box_content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                8 Ways Study Abroad Has Made it simpler for Me Grow
                                               <i class="indicator glyphicon glyphicon-minus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Seek the advice of Your Study Abroad Consultant
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                The reason why I Study Abroad?
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree1">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                                Do you know the Different Study Abroad Program Types?
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree1">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog1">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse1" aria-expanded="false" aria-controls="blog1">
                                                How Come I Intern Abroad?
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blog1">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse2" aria-expanded="false" aria-controls="blog2">
                                                Using Study Abroad in the interview
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blog2">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse3" aria-expanded="false" aria-controls="blog3">
                                                Applying Financial Aid to Study Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blog3">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog4">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse4" aria-expanded="false" aria-controls="blog4">
                                                Studying Abroad and Saving Money
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse4" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog4">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog5">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse5" aria-expanded="false" aria-controls="blog5">
                                                How to Prepare for Study Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse5" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog5">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog6">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse6" aria-expanded="false" aria-controls="blog6">
                                                Stay Connected
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse6" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog6">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog7">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse7" aria-expanded="false" aria-controls="blog7">
                                                Travel Documents for Study Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse7" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog7">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog8">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse8" aria-expanded="false" aria-controls="blog8">
                                                reasons to Study Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse8" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog8">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog9">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse9" aria-expanded="false" aria-controls="blog9">
                                                Study Abroad Destinations
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse9" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog9">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog10">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse10" aria-expanded="false" aria-controls="blog10">
                                                Engineering and Study Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse10" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog10">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog11">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse11" aria-expanded="false" aria-controls="blog11">
                                                Is Study Abroad that Important!
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse11" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog11">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog12">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse12" aria-expanded="false" aria-controls="blog12">
                                                Study Abroad in Italy or Spain
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse12" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog12">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog13">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse13" aria-expanded="false" aria-controls="blog13">
                                                Study Abroad Program
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse13" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog13">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog14">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse14" aria-expanded="false" aria-controls="blog14">
                                                Study Work Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse14" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog14">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                         <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog15">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse15" aria-expanded="false" aria-controls="blog15">
                                                Why Study Abroad
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse15" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog15">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog16">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse16" aria-expanded="false" aria-controls="blog16">
                                                Study Guide
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="blogcollapse16" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog16">
                                            <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a 
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                   
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-3">
                            
                            <div class="search_form_box">
                                <div class="search_head">
                                    Contact Form
                                </div>
                                <div class="search_content">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="name">
                                        </div>
                                       <div class="form-group">
                                            <input type="email" class="form-control" placeholder="email">
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control" placeholder="phone">
                                        </div>
                                         <div class="form-group">
                                           <textarea class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="select_box">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>

                                                <select class="form-control" id="sel1">
                                                 <option>--Select Level--</option>
                                                  <option>Certificate</option>
                                                  <option>Language</option>
                                                  <option>Under Graduate</option>
                                                  <option>Post Graduate</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="submit" class="submit_btn sub_btn">
                                        </div>

                                </div>
                                </form>
                            </div>
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


