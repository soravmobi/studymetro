        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   E-portfolio
                   </div>
                 </div>
              </div>
            </div>
            <h3 align="center"><?php echo $username['username']; ?></h3>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php //$this->load->view('sidebar'); ?>
                    <div class="col-md-12 col-sm-12">
                      <div class="right_dashboard">
                            <div class="describ_box">
                                <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h1>
                                <?php if(!empty($education)) { foreach($education as $e) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $e['school']; ?></h3>
                                        
                                        <div class="descrip"><?php echo $e['degree']; ?>,<a href="javascript:void(0);"> <?php echo $e['field_of_study']; ?></a>, <?php echo $e['grade']; ?>
                                            <span><?php echo $e['days_atteend_from']; ?> – <?php echo $e['days_atteend_to']; ?></span>
                                        </div>
                                        <p><?php echo $e['activities']; ?></p>
                                        <p><?php echo $e['edu_description']; ?></p>
                                    </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Education Not Added !!</p></center>
                                </div>
                                <?php } ?>                                        
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-life-ring" aria-hidden="true"></i> Volunteers</h1>
                                <?php if(!empty($volunteers)) { foreach($volunteers as $v) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $v['organisation']; ?></h3>
                                        <div class="descrip"><?php echo $v['role']; ?>
                                            <span><?php echo $v['vo_month']; ?> <?php echo $v['vo_year']; ?></span>
                                        </div>
                                        <p><?php echo $v['cause']; ?></p>
                                        <p><?php echo $v['vo_description']; ?></p>

                                    </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Volunteers Not Added !!</p></center>
                                </div>
                                <?php } ?>  
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-plus" aria-hidden="true"></i> Interests</h1>
                                <?php if(!empty($interests)) { foreach($interests as $i) { ?>
                                <div class="content_edu">
                                    
                                    <p><?php echo $i['interests']; ?></p>
                                </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Interests Not Added !!</p></center>
                                </div>
                                <?php } ?>  
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-certificate" aria-hidden="true"></i> Certificate</h1>
                                <?php if(!empty($certifications)) { foreach($certifications as $c) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $c['certificate_name']; ?></h3>
                                        <div class="descrip"><?php echo $c['authority']; ?>
                                            <span><?php echo $c['month']; ?> <?php echo $c['year']; ?></span>
                                        </div>
                                        <p><?php echo $c['license']; ?></p>
                                        <a href="<?php echo $c['certification_url']; ?>" target="_blank"><?php echo $c['certification_url']; ?></a>

                                    </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Certificates Not Added !!</p></center>
                                </div>
                                <?php } ?> 
                            </div>

                        </div>
                   </div> 
                   
                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
        <!--Main container sec end-->
