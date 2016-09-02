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
<section class="visa_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="left_wrap_visa">
                                <div class="video_visa_wrap">
                                    <div class="video_visa_box">
                                        <iframe width="420" height="315" src="https://www.youtube.com/embed/mRe7IEOCYgc" frameborder="0" allowfullscreen></iframe>
                                        <div class="video_bottom"><span class="price">150 $</span>
                                            <button type="button" class="enroll_btn" data-toggle="modal" data-target="#model_visa"><i class="fa fa-shopping-cart"></i> Enroll Now</button></div>
                                    </div>
                                    <div class="highlight_box">
                                        <h3>Highlights</h3>
                                        <div class="highlight_list">
                                            <li>Apply SM50 Coupons Code to Save 50 USD</li>
                                            <li>F1 USA Visa E- leaning Training and Visa Webinar </li>
                                            <li>F1 Visa Mock Interview </li>
                                            <li>F1 DS160 and SEVIS Information </li>
                                            <li>Call 8088-867-867 and Visit: www.studymetro.com Email admission@studymetro.com</li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="left_wrap_visa">
                                <div class="item_wrap">
                                    <div class="item_level">
                                        <img src="<?php echo base_url(); ?>assets/images/certificate_icon.png">
                                        <a href="javascript:void(0);" class="name_item">Certificate</a>
                                        <span class="level_stu">no</span>
                                    </div>
                                    <div class="item_level">
                                        <img src="<?php echo base_url(); ?>assets/images/icon-students.png">
                                        <a href="javascript:void(0);" class="name_item">Level</a>
                                        <span class="level_stu">Beginner</span>
                                    </div>
                                    <div class="item_level">
                                        <img src="<?php echo base_url(); ?>assets/images/icon-lauguage.png">
                                        <a href="javascript:void(0);" class="name_item">Language</a>
                                        <span>English (US)</span>
                                    </div>
                                </div>
                                <div class="instructor_wrap">
                                    <h4>About Instructor</h4>
                                    <div class="instructor_content">
                                        <img src="<?php echo base_url(); ?>assets/images/instructor.jpg">
                                        <h3>Abhishek</h3> The Course is designed by Immigration Lawyer and Our visa team will
                                        closely look for Visa assignment and will provide you Mock interview similar like
                                        real Interview. Which will help you to increase 80% of chances to get USA Visa. Call
                                        Advisor at 8088-867-867 or Email admisison@studymetro.com Visit studymetro.com for
                                        more Information. Thanks.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-7 col-sm-7">
                            <div class="course_details">
                                <div class="head_course">COURSE DETAILS</div>
                                <h3>SAY 'NO' to VISA REJECTION - Use SM50 Coupons Code to Save 50 USD </h3>
                                <p>Got rejected for F1 USA visa? No problem. Here's the solution. Join our F1 Visa E-learning
                                    programme designed by US immigration lawyer and pursue your education in US. </p>
                                <p>We are pleased to inform you that we have created F1 E-learning Visa training for indian
                                    students, Which increase 80-90% students visa rate after successfully completing course.
                                    The course material designed by USA Immigration Lawyer, which contain each and every
                                    small information about F1 Visa Requirement.</p>
                                <p><span>Module 1 : </span> Student Visa:-Introduction</p>
                                <p><span>Module 2 : </span> Are you a Serious Student? </p>
                                <p><span>Module 3 : </span> Being Truthful </p>
                                <p><span>Module 4 : </span> Financial Ability Assignments </p>
                                <p><span>Module 5 : </span> Home Ties Assignments </p>
                                <p><span>Module 6 : </span> Conclusion Assignments</p>
                                <p><span>Module 7 : </span> Webinar </p>
                                <p>Call Advisor at 8088-867-867 or Email admisison@studymetro.com Visit studymetro.com for more
                                    Information. Thanks. </p>
                            </div>
                            <div class="course_details visa_accordian">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 1:</span>   F1 Visa Webinar by Abbie </a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <i class="indicator glyphicon glyphicon-minus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne1">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 2:</span>   F1 Visa Training  </a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1" aria-expanded="true"
                                                    aria-controls="collapseOne1">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 2: Assignment 1: The Visa Interview & Video</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  1 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 3: Assignment 2: Preparing to Apply for an F-1 Student Visa</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  17 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 4: Assignment 3: Recommended Documents to Take to the Visa Inte</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  15 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 5: Assignment 4: Section 214(b) of the U.S. Immigration </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 6: Assignment 5: Article from US Embassy Website</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 7: Assignment 6: Student and Exchange Visitor Program (SEVP) </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne2">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 3:</span>   Are you Serious Student ?</a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="true"
                                                    aria-controls="collapseOne2">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne2">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 2: Assignment 1: The Visa Interview & Video</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  1 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 3: Assignment 2: Preparing to Apply for an F-1 Student Visa</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  17 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 4: Assignment 3: Recommended Documents to Take to the Visa Inte</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  15 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 5: Assignment 4: Section 214(b) of the U.S. Immigration </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 6: Assignment 5: Article from US Embassy Website</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 7: Assignment 6: Student and Exchange Visitor Program (SEVP) </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne3">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 4:</span>   Being Truthful</a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne3" aria-expanded="true"
                                                    aria-controls="collapseOne3">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne3">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 2: Assignment 1: The Visa Interview & Video</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  1 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 3: Assignment 2: Preparing to Apply for an F-1 Student Visa</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  17 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 4: Assignment 3: Recommended Documents to Take to the Visa Inte</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  15 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 5: Assignment 4: Section 214(b) of the U.S. Immigration </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 6: Assignment 5: Article from US Embassy Website</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 7: Assignment 6: Student and Exchange Visitor Program (SEVP) </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne2">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 5:</span>   Module Four : Financial Ability</a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne4" aria-expanded="true"
                                                    aria-controls="collapseOne4">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne4">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 2: Assignment 1: The Visa Interview & Video</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  1 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 3: Assignment 2: Preparing to Apply for an F-1 Student Visa</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  17 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 4: Assignment 3: Recommended Documents to Take to the Visa Inte</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  15 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 5: Assignment 4: Section 214(b) of the U.S. Immigration </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 6: Assignment 5: Article from US Embassy Website</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 7: Assignment 6: Student and Exchange Visitor Program (SEVP) </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne5">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 6:</span>   Module Five : Home Ties</a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne5" aria-expanded="true"
                                                    aria-controls="collapseOne5">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne5">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 2: Assignment 1: The Visa Interview & Video</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  1 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 3: Assignment 2: Preparing to Apply for an F-1 Student Visa</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  17 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 4: Assignment 3: Recommended Documents to Take to the Visa Inte</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  15 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 5: Assignment 4: Section 214(b) of the U.S. Immigration </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 6: Assignment 5: Article from US Embassy Website</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 7: Assignment 6: Student and Exchange Visitor Program (SEVP) </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne6">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 7:</span>  Module Six : Conclusion Assignments</a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne6" aria-expanded="true"
                                                    aria-controls="collapseOne6">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne6">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Online Webinar </a>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 2: Assignment 1: The Visa Interview & Video</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  1 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 3: Assignment 2: Preparing to Apply for an F-1 Student Visa</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  17 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 4: Assignment 3: Recommended Documents to Take to the Visa Inte</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  15 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 5: Assignment 4: Section 214(b) of the U.S. Immigration </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 6: Assignment 5: Article from US Embassy Website</a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 7: Assignment 6: Student and Exchange Visitor Program (SEVP) </a>
                                                    <span><i class="fa fa-slideshare" aria-hidden="true"></i>  5 slide </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne7">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 8:</span>   Visa Training Webinar </a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne7" aria-expanded="true"
                                                    aria-controls="collapseOne7">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne7">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: Online Webinar </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne8">
                                            <h4 class="panel-title">
                                                <a href="#"><span>Chapter 9:</span>   F1 Visa Training Video and Student Expereince</a>
                                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne8" aria-expanded="true"
                                                    aria-controls="collapseOne8">
                                                    <i class="indicator glyphicon glyphicon-plus"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne8">
                                            <div class="panel-body">
                                                <div class="left_count">1</div>
                                                <div class="right_panel_body">
                                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>

                                                    <a href="#">Lecture 1: F1 Visa Training Video and Student Expereince</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <section class="video_wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/EUhV6Bjg4qE" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">Piyush F1 USA Visa Interview for Midwestern State University</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/VNR1HTPYcGE" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">F1 Visa Training by Abbie as Student</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/h1yCp9Wn-Cw" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">F1 Visa Training by Abbie as Student (2nd Attempt) </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/NQ2VGqv3E7E" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">Visa Applied Students </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/Aj0J7So1dxA" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video"> F1 USA Visa Training Lecture by Abbie </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/kLEr5VhWrvY" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">DS 160 Forms Step by Step Information by Study Metro </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/k2_Z-ZkSG9g" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">DS 160 step by step second Video</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/EYJOyljqjr8" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">Bhavesh is from Indore and explained about DS160, SEVIS, Visa experience</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/EYJOyljqjr8" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">other student Visa interview practice </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/k2_Z-ZkSG9g" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video"> Student got Visa expaining OFC step by step</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/UmGhuU1EJA8" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video">Student got Visa expaining documentation
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/_kPRwLwqaKI" frameborder="0" allowfullscreen></iframe>
                            <p class="meta_video"> abbie as student giving visa interview</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="video_box">
                            <iframe width="100%" height="370" src="https://www.youtube.com/embed/_kPRwLwqaKI " frameborder="0 " allowfullscreen></iframe>
                            <p class="meta_video">Raja from USA
                            </p>
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

  <!-- Modal -->
<div class="modal fade" id="model_visa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
             <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#Register" aria-controls="Register" role="tab" data-toggle="tab"><span class="number">1</span>Register</a></li>
                <li role="presentation"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"><span class="number">2</span> Order and payment</a></li>
                <li role="presentation"><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab"><span class="number">3</span> Finish checkout</a></li>
  
            </ul>
         </h4>
      </div>
      <div class="modal-body">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="Register">
                <div class="sign_in">
                    <h3>Sign In</h3>
                    <form>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" placeholder="Email " id="exampleInputEmail1 " class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1 ">Password</label>
                        <input type="password" placeholder="Password " id="exampleInputPassword1 " class="form-control ">
                    </div>

                    <div class="checkbox">
                        <label>
                        <input type="checkbox"> Remember me
                    </label>
                        <span class="pull-right"><a href="#">Forgot your password </a></span>
                    </div>
                    <div class="login_button">
                        <button class="btn btn-default" type="submit">sign in and continue</button>
                    </div>

                    </form>
                </div>
                <div class="register">
                    <h3>New Member</h3>
                    <form>
                    <div class="row ">
                        <div class="col-md-6 cosl-sm-6 ">
                        <div class="form-group">
                            <label for="firstname ">first name</label>
                            <input type="text " placeholder=" " id="firstname " class="form-control ">
                        </div>
                        </div>
                        <div class="col-md-6 cosl-sm-6 ">
                        <div class="form-group ">
                            <label for="last name">last name</label>
                            <input type="text " placeholder=" " id="lastname " class="form-control ">
                        </div>
                        </div>

                        <div class="col-md-6 cosl-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1 ">Email address</label>
                            <input type="email" placeholder=" " id="exampleInputEmail1 " class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6 cosl-sm-6 ">
                        <div class="form-group ">
                            <label for="Password">Password</label>
                            <input type="password" placeholder=" " id="password" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6 cosl-sm-6">
                        <div class="form-group">
                            <label for="Passwordconfirm ">confirm Password</label>
                            <input type="password" placeholder=" " id="Passwordconfirm " class="form-control">
                        </div>
                        </div>
                        <div class="col-md-12 cosl-sm-12">
                        <div class="login_button">
                            <button class="btn btn-default" type="submit">Resister and continue </button>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
             </div>
            <div role="tabpanel" class="tab-pane" id="payment">
                <div class="row ">
                    <div class="col-md-4 col-sm-4">
                        <div class="checkout_left">
                            <div class="chkl_img">
                               <a href="#"> <img src="<?php echo base_url(); ?>assets/images/us.png "></a>
                               <a href="#" class="education ">Education</a>
                            </div>
                            <div class="chkl_data">
                                <a href="#">F1 USA E-VISA TRAINING </a>
                                <div class="author_name">
                                    By <a href="#">Abhisheak</a>
                                </div>
                            </div>
                            <div class="chkl_ftr">
                                <div class="star_rating ">
                                    <i class="fa fa-star "></i>
                                    <i class="fa fa-star "></i>
                                    <i class="fa fa-star "></i>
                                    <i class="fa fa-star "></i>
                                </div>
                                <div class="rate_price ">$150</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="check_out_right">
                            <form>
                                <div class="form_coupnecode paypal coupne ">
                                    <label>Coupon code</label>
                                    <input type="text" placeholder="Enter coupon code " id="coupne_paypal ">
                                    <button class="btn btn_appy ">Apply</button>
                                </div>
                                <div class="total_payment ">Total Payment <span class="price ">$150</span></div>
                                <table class="table table_pay">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Price($)</th>
                                            <th>Duration</th>
                                            <th>Access Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" id="radio1"></td>
                                            <td>$ 150.00</td>
                                            <td>15 days</td>
                                            <td>Unlimited</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="paypal_bg">
                                    <img src="<?php echo base_url(); ?>assets/images/paypal_bg.jpg ">
                                </div>
                                <button type="submit " class="btn_course ">Buy Course</button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
            <div role="tabpanel" class="tab-pane" id="checkout">...</div>
           
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal enroll end -->


