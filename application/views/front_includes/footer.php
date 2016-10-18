  <?php $user = $this->session->userdata('userid');
    if(empty($user)){ 
  ?>
    <!-- Modal  for login start-->
    <div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Log in</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="login-form">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control email" id="exampleInputEmail1" placeholder="Email Address">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control password" id="exampleInputPassword1" placeholder="Password">
              </div>

              <div class="checkbox">
                <label>
                <input type="checkbox" checked value="1" name="remeber_me"> Remember me
              </label>
                <span class="pull-right"><a href="javascript:void(0);">Forgot your password ?</a></span>
              </div>
              <div class="login_button">
                <button type="button" class="btn btn-default login-btn">Log in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for login end-->
    <!-- Modal  for register start-->
    <div class="modal fade login register_mod" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Register</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="signup-form">
              <div class="row">
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="firstname">first name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="first_name">
                    <span class="error_form first_name"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="last name">last name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="last_name">
                    <span class="error_form last_name"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="last name">Register as</label>
                    <select class="form-control" name="user_type">
                      <option value="">Register as</option>
                      <option value="2">As Student</option>
                      <!-- <option value="3">As Agency</option> -->
                      <!-- <option value="4">As Trainer</option> -->
                      <option value="5">As University</option>
                      <!-- <option value="6">As Frainchsee</option> -->
                    </select>
                    <span class="error_form user_type"></span>
                  </div>
                </div>

                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" name="email">
                    <span class="error_form email"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <span class="error_form password"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="Passwordconfirm">confirm Password</label>
                    <input type="password" class="form-control" id="Passwordconfirm" placeholder="Confirm Password" name="confm_pswd">
                    <span class="error_form confm_pswd"></span>
                  </div>
                </div>
                <div class="col-md-12 cosl-sm-12">
                  <div class="login_button">
                    <button type="button" class="btn btn-default signup-btn">Register</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for register end-->
  <?php } ?>
    <!-- Modal  for change password start-->
    <div class="modal fade login" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Change Password</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="change-password-form">
              <div class="form-group">
                <label for="exampleInputPassword1">Current Password</label>
                <input type="password" name="current_password" class="form-control" id="exampleInputPassword1" placeholder="Current Password">
                <span class="error_form current_password"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="new_password" class="form-control" id="exampleInputPassword2" placeholder="New Password">
                <span class="error_form new_password"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password">
                <span class="error_form confirm_password"></span>
              </div>
              <div class="login_button">
                <button type="button" class="btn btn-default password-btn">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for change password end-->
    <!--Footer sec start-->
    <footer id="footer" class="footer_sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="footer_top">
              <div class="common_head footer_head">
                <h2>Accreditation</h2>
                <div class="head_border">
                  <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                </div>
              </div>
              <ul class="brand_list">
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" src="<?php echo base_url(); ?>assets/images/EAIE.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" src="<?php echo base_url(); ?>assets/images/ICEF.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" src="<?php echo base_url(); ?>assets/images/NAFSA.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" src="<?php echo base_url(); ?>assets/images/QISAN.jpeg"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" src="<?php echo base_url(); ?>assets/images/AIRC.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" src="<?php echo base_url(); ?>assets/images/AIEA.png"></a>
                </li>
              </ul>
            </div>
            <div class="footer_middle">
              <div class="common_head footer_head">
                <h2>Qualified Universities</h2>
                <div class="head_border">
                  <span><i class="flaticon-the-white-house-in-eeuu" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="footer_middle_content">
                <div class="row">
                <?php foreach(getQualifiedUniversity() as $qu){ ?>
                  <div class="col-md-3 col-sm-3">
                    <ul class="ftr_list">
                      <li><a href="<?php echo base_url(); ?>university/details/<?php echo encode($qu['id']); ?>"><?php echo $qu['name']; ?></a></li>
                    </ul>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bottom">
        <div class="social_media">
          <ul>
            <li><a href="https://www.facebook.com/studymetro.abroad"><i class="fa fa-facebook" aria-hidden="true"></i>
 </a></li>
            <li><a href="https://twitter.com/gujstudymetro"><i class="fa fa-twitter" aria-hidden="true"></i>
 </a></li>
            <li><a href="https://plus.google.com/+HTIRIndiaBangalore"><i class="fa fa-google-plus" aria-hidden="true"></i>
 </a></li>
          </ul>
        </div>
        <div class="footer_menu_wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <label>Recent Posts </label>
                <ul class="ftr_menu_list">
                  <li><a href="#">Lincoln University </a></li>
                  <li><a href="#">Greencity College </a></li>
                  <li><a href="#">SNHU </a></li>
                  <li><a href="#">California Flight Academy</a></li>
                  <li><a href="#">University Of Findlay </a></li>
                </ul>
              </div>
              <!-- <div class="col-md-4 col-sm-4">
                <ul class="list_term">
                  <li><a href="javascript:void(0);">© <?php echo date('Y'); ?>&nbsp; studymetro.com </a></li>
                  <li><a href="#">Terms of Service </a></li>
                  <li><a href="#"> Privacy Policy </a></li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--Footer sec end-->


  </main>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugin.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/featherlight.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/featherlight.gallery.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.twbsPagination.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ( $ ) {
      $("#my-gallery-container").mpmansory(
        {
          childrenClass: 'item', // default is a div
          columnClasses: 'padding', //add classes to items
          breakpoints:{
            lg: 3, 
            md: 4, 
            sm: 6,
            xs: 12
          },
          distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
          onload: function (items) {
            //make somthing with items
          } 
        }
      );
      $('.gallery').featherlightGallery({
          gallery: {
            fadeIn: 300,
            fadeOut: 300
          },
          openSpeed:    300,
          closeSpeed:   300
      });
      /*$.featherlight({
        iframe: 'editor.html',
        iframeMaxWidth: '80%',
        iframeWidth: 500,
        iframeHeight: 300
      });*/
    });
  </script>
<script type="text/javascript">
function base_url()
{
   site_url = '<?php echo base_url(); ?>';
   return site_url;
}
user_id  = "<?php echo $this->session->userdata('userid'); ?>";
$(document).ready(function(){

$("#thechoices").change(function(){
    $("#" + this.value).show().siblings().hide();
});

$("#thechoices").change();

$('#rootwizard').bootstrapWizard();
window.prettyPrint && prettyPrint()

if(user_id == ""){

$("body").on('click','.signup-btn',function() {
  var form_data = new FormData($('#signup-form')[0]);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/front/signup",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.signup-btn').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#signup-form')[0].reset();
            $('#register').modal('hide');
            showToaster('success',resp.msg);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.signup-btn').attr('disabled',false).text('Register');
        },
        error:function(error)
        {
            $('.signup-btn').attr('disabled',false).text('Register');
        }
    });
});

$("body").on('click','.login-btn',function() {
  var form_data = new FormData($('#login-form')[0]);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/front/login",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.login-btn').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
          if(resp.type == "success"){
            showToaster('success',resp.msg);
            setTimeout(function(){
                window.location.href= "<?php echo base_url(); ?>user/dashboard";
            },1000);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.login-btn').attr('disabled',false).text('Log in');
        },
        error:function(error)
        {
            $('.login-btn').attr('disabled',false).text('Log in');
        }
    });
});  

$(".email, .password").keyup(function(event){
    if(event.keyCode == 13){
        jQuery(".login-btn").trigger("click");
    }
});

}

$("body").on('click','.password-btn',function() {
  var form_data = new FormData($('#change-password-form')[0]);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/user/doChangePassword",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.password-btn').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#change-password-form')[0].reset();
            $('#change_password').modal('hide');
            showToaster('success',resp.msg);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.password-btn').attr('disabled',false).text('Submit');
        },
        error:function(error)
        {
            $('.password-btn').attr('disabled',false).text('Submit');
        }
    });
});

});

</script>
<script type="text/javascript">
<?php if($this->session->flashdata('error')){ ?>
    showToaster('error',"<?php echo $this->session->flashdata('error') ?>");    
<?php } ?>
<?php if($this->session->flashdata('success')){ ?>
    showToaster('success',"<?php echo $this->session->flashdata('success') ?>");    
<?php } ?>
</script>
</body>
</html>