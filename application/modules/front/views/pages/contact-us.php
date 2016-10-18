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

 <section class="video_sec contact_us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="blog_box contact_wrap">
                                <h2>Contact Us</h2>
                                <div class="contact_wrap_content">
                                    <div class="frame_address">
                                        <div style="overflow:hidden;width:750px;height:450px;resize:none;max-width:100%;">
                                            <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro+&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU">
                                            </iframe>
                                            </div>
                                            <a class="google-maps-code" href="http://www.interserver-coupons.com" id="authorize-maps-data">interserver coupons</a>
                                        </div>
                                    </div>
                                    <!-- <div class="frame_address">
                                        <div style="overflow:hidden;width:425px;height:350px;resize:none;max-width:100%;">
                                            <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro+Pvt+Ltd+-+Overseas+Education+Consultant-Study+Abroad,+Agra+Bombay+Road,+Manorama+Ganj,+Indore,+Madhya+Pradesh,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
                                            </div>
                                            <a class="google-maps-code" href="https://www.interserver-coupons.com" id="authorize-maps-data">InterserverCoupons</a>
                                        </div>

                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2>Study Metro, Mumbai</h2>
                                            <div class="address_box_describe">
                                                <p>2nd Floor, Office No 209, Jaydeep Emphasis, Next to Dutt Mandir, Wagle Estate,
                                                    Thane 400604 </p>
                                                <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                                <p>Tel: +91-8088-867-867, </p>
                                                <p>Mob: +91-7722-867-867</p>
                                                <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                                    <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=+Bangalore+Jaynagar+study+metro&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                                    <a
                                                        class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">visit them now</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2>Study Metro, Mumbai</h2>
                                            <div class="address_box_describe">
                                                <p>"Floville", Opp Wellington Catholic Gym, Near Khar Subway Santacruz West
                                                    Mumbai 400054 </p>
                                                <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                                <p>Tel: +91-8088-867-867</p>
                                                <p>Mob: +91-7722-867-867</p>
                                                <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                                    <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=+Bangalore+Jaynagar+study+metro&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                                    <a
                                                        class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">visit them now</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2>Study Metro, COIMBATORE</h2>
                                            <div class="address_box_describe">
                                                <p>NO :11&13 GROUND FLOOR, DAMODAR CENTRE , NEAR ANNA STATUE, ADJACENT TO SHREE
                                                    KRISHNA SWEETS AVINASHI ROAD COIMBATORE-641018 </p>
                                                <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                                <p>Tel: +91-8088-867-867,</p>
                                                <p>Mob: +91-7722-867-867</p>
                                                <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                                    <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro,+COIMBATORE&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                                    <a
                                                        class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">read more</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2>Study Metro, Bangalore</h2>
                                            <div class="address_box_describe">
                                                <p>No 23, 2nd Floor Canon building, opposite to pizza hut Jaynagar 3rd Block
                                                </p>
                                                <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                                <p>Tel: +91-8088-867-867,</p>
                                                <p>Mob: +91-7722-867-867</p>
                                                <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                                    <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=+Bangalore+Jaynagar+study+metro&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                                    <a
                                                        class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">visit them now</a>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2>Study Metro, Pune</h2>
                                            <div class="address_box_describe">
                                                <p>SR Rooms and Hotel 130/2 /2 ground floor Behind Sanket-Inn Hotel WAKAD Pune
                                                    411057 Near Bloomkar Chock</p>
                                                <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                                <p>Tel: +91-8088-867-867, </p>
                                                <p>Mob: +91-7722-867-867</p>
                                               <!--  <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                                    <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro,+Pune&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                                    <a
                                                        class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">click here</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2>Study Metro,Kentucky,USA</h2>
                                            <div class="address_box_describe">
                                                <p>2023 eastern pkwy #12, Louisville KY 40204 USA </p>
                                                <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                                <p>Tel: +91-8088-867-867,</p>
                                                <p>Mob: +91-7722-867-867</p>
                                                <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                                    <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro,Kentucky,USA&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                                    <a
                                                        class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">here</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="blog_box contact_wrap">
                                            <h2>Contact Us</h2>
                                            <div class="contact_wrap_content">
                                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/home/docontactus">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">Name:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" required name="name" class="form-control" id="Name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" required name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="col-sm-2 control-label">Phone:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" required name="phone" class="form-control" id="phone" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="col-sm-2 control-label">Message:</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="message" required placeholder="Message"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10 text-right">
                                                            <button type="submit" class="btn btn-default submit_btn sub_btn">submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="address_box">
                                <h2>Study Metro, Bangalore</h2>
                                <div class="address_box_describe">
                                    <p>2nd Floor,No. 121, Wood Street, Opposite to Brigade Tower Ashoknagar Brigade Road above
                                        IBACO Bangalore 560025 </p>
                                    <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                    <p>Tel: +91-8088-867-867</p>
                                    <p>Mob: +91-7722-867-867</p>
                                    <!-- <div style="overflow:hidden;width:100%;height:230px;resize:none;max-width:100%;">
                                        <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro+&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU">
                                            </iframe>
                                        </div>
                                        <a class="google-maps-code" href="http://www.interserver-coupons.com" id="authorize-maps-data">interserver coupons</a>
                                    </div> -->

                                </div>
                            </div>
                            <div class="address_box">
                                <h2>Study Metro, Indore</h2>
                                <div class="address_box_describe">
                                    <p>517, 5th Floor, Shekhar central, AB Rd, Manorama Ganj, Indore, Madhya Pradesh 452018,
                                        India. </p>
                                    <span><a href="mailto:support@studymetro.com">support@studymetro.com</a></span>
                                    <p>Tel: +91-7722-867-867, </p>
                                    <p>Mob: +91-8088-867-867</p>
                                    <!-- <div style="overflow:hidden;width:100%;height:230px;max-width:100%;">
                                        <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro+Pvt+Ltd+-+Overseas+Education+Consultant-Study+Abroad,+Agra+Bombay+Road,+Manorama+Ganj,+Indore,+Madhya+Pradesh,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
                                        </div>
                                        <a class="google-maps-code" href="https://www.interserver-coupons.com" id="authorize-maps-data">InterserverCoupons</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="address_box">
                                <h2>Study Metro, Gujarat</h2>
                                <div class="address_box_describe">
                                    <p>2nd Floor, Sigma Prime Opp UCO Bank Nr. Sardar Patel Statue V. V. Nagar - 388120, Gujarat
                                        388120, India. </p>
                                    <span><a href="mailto:riddhi@studymetro.com">riddhi@studymetro.com</a></span>
                                    <p>Tel: +91 8000 66 99 22, </p>
                                    <p>Mob: +91-9978918286, +91-8000669922</p>
                                    <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                        <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro+V+V+Nagar,+Gujarat+388120,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
                                        </div><a class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">click here</a>

                                    </div> -->
                                </div>
                            </div>
                            <div class="address_box">
                                <h2>Study Metro, North Bangalore</h2>
                                <div class="address_box_describe">
                                    <p>1177, First Main, Ambedkar Layout Kavalbyrasandra, RT Nagar Post Bangalore- 560032 India.
                                    </p>
                                    <span><a href="mailto:praveen.thachillath@studymetro.com ">praveen.thachillath@studymetro.com,</a></span>
                                    <span><a href="mailto:praveenthach@gmail.com">praveenthach@gmail.com,</a></span>
                                    <p>Tel: +91 8000 66 99 22, </p>
                                    <p>Mob: +91-9978918286, +91-8000669922</p>
                                    <!-- <div style="width:100% ;overflow:hidden;height:230px;max-width:100%;">
                                        <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro,+North+Bangalore&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                        <a
                                            class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">read more</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="address_box">
                                <h2>Study Metro, Hyderabad</h2>
                                <div class="address_box_describe">
                                    <p># 205, Diamond Towers, Beside Belson's Taj S D Road Secunderabad 500 003 </p>
                                    <span><a href="mailto:info@studymetro.com">info@studymetro.com</a></span>
                                    <p>Tel: +91-8088-867-867, </p>
                                    <p>Mob: +91-7722-867-867, 9347244900 office no. 040 27719900 & 66339594</p>
                                    <!-- <div style="width:100%;overflow:hidden;height:230px;max-width:100%;">
                                        <div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro,+Hyderabad&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
                                        <a
                                            class="google-maps-code" href="https://www.interserver-coupons.com" id="enable-map-data">read more</a>
                                    </div> -->
                                </div>
                            </div>


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


