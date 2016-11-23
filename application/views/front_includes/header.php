<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo (!empty($meta_keywords)) ? $meta_keywords : ''; ?>">
    <meta name="description" content="<?php echo (!empty($meta_description)) ? $meta_description : ''; ?>">
    <title><?php admin_meta_title((!empty($meta_title)) ? $meta_title : ''); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php admin_favicon(); ?>
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/plugin.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/featherlight.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/featherlight.gallery.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/chosen.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
      <script src="<?php echo base_url(); ?>assets/js/modernizr-custom.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
      <!-- Google Code for Remarketing Tag --> 
      <script type="text/javascript"> 
      /* <![CDATA[ */ 
      var google_conversion_id = 953824868; 

      var google_custom_params = window.google_tag_params; 

      var google_remarketing_only = true; 
      /* ]]> */ 
      </script> 

      <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"> </script> 
      <noscript> 
        <div style="display:inline;"> 
          <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/953824868/?value=0&amp;guid=ON&amp;script=0"/> 
        </div> 
      </noscript>

      <script>(function() {
        var _fbq = window._fbq || (window._fbq = []);

        if (!_fbq.loaded) {

          var fbds = document.createElement('script');

          fbds.async = true;

          fbds.src = '//connect.facebook.net/en_US/fbds.js';

          var s = document.getElementsByTagName('script')[0];

          s.parentNode.insertBefore(fbds, s);

          _fbq.loaded = true;

        }

        _fbq.push(['addPixelId', '727416350628543']);

      })();

      window._fbq = window._fbq || [];
      window._fbq.push(['track', 'PixelInitialized', {}]);
      </script>

      <noscript>
        <img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=727416350628543&amp;ev=NoScript" />
      </noscript>

      <!-- Facebook Conversion Code for Webinar With Golden Globe University -->
      <script>(function() {
        var _fbq = window._fbq || (window._fbq = []);

        if (!_fbq.loaded) {

          var fbds = document.createElement('script');

          fbds.async = true;

          fbds.src = '//connect.facebook.net/en_US/fbds.js';

          var s = document.getElementsByTagName('script')[0];

          s.parentNode.insertBefore(fbds, s);

          _fbq.loaded = true;

        }

      })();
      window._fbq = window._fbq || [];
      window._fbq.push(['track', '6022168739415', {'value':'0.01','currency':'INR'}]);
      </script>
      <noscript>
        <img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6022168739415&amp;cd[value]=0.01&amp;cd[currency]=INR&amp;noscript=1" />
      </noscript>
  </head>
  <body class="hold-transition login-page <?php body_class((!empty($body_class)) ? $body_class : ''); ?>">
    <main class="animsition">
    <!--Header sec start-->
    <header class="header_sec" id="header">
      <div class="top_bar">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <ul class="contact_list">
                <li><a href="javascript:void(0);"><i class="fa fa-phone"></i> 91-8088-867-867</a></li>
                <li><a href="mailto:admission@studymetro.com"><i class="fa fa-envelope"></i> admission@studymetro.com</a></li>
              </ul>
            </div>
            <div class="col-md-8 col-sm-8">
              <div class="facebook_like">
                <a href="https://www.facebook.com/studymetro.abroad" target="_blank">Like Us on Facebook 
                  <span><i aria-hidden="true" class="fa fa-facebook"></i>
                  </span>
                  </a>
              </div>
              <div class="login_wrap">
                <ul>
                <?php $user = $this->session->userdata("user_id"); 
                $first_name = $this->session->userdata("first_name"); 
                if(empty($user)) { ?>
                  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#register" data-keyboard="false" data-backdrop="static">Are you a member? Register  / </a></li>
                  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static">Login</a></li>
                <?php } else { ?>
                  <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php if(isset($first_name)) echo $first_name; ?>, </a>
                    <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>user/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change_password" data-keyboard="false" data-backdrop="static"><i class="fa fa-key"></i> Change Password</a></li>
                    <li><a href="<?php echo base_url(); ?>user/profile"><i class="fa fa-user"></i> My Profile</a></li>
                  </ul>
                  </li>
                  <li><a href="<?php echo base_url(); ?>front/user/logout"> Logout</a></li>
                <?php } ?>
                  <li><a href="<?php echo base_url(); ?>blogs">Blog </a></li>
                  <li><a href="<?php echo base_url(); ?>faqs">FAQs  </a></li>
                  <li><a href="<?php echo base_url(); ?>contact-us"> Contact us</a></li>
                </ul>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="navigation_wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-3">
              <div class="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive"></a>
              </div>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navigation">
                  <ul class="nav navbar-nav">
                    <?php 
                    $slug = $this->uri->segment(1);
                    $i = 1; foreach(getmenus() as $m){ if($m['page_no'] != 10 && $m['page_no'] != 11 && $m['page_no'] != 12) { ?>
                      <li <?php if($slug == $m['slug']) echo "class='active'"; ?>><a href="<?php echo base_url(); ?><?php echo $m['slug']; ?>"><?php echo $m['title']; ?></a></li>
                    <?php $i++; } } ?>
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="head_bottom_bar">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <p>Study Metro - An ISO 9001 Certified Company</p>
            </div>
            <div class="col-md-6 col-sm-6">
              <ul class="ftr_menu_list">
                  <li><a href="http://page.studymetro.com/Recorded-Webinar">Webinar</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="<?php echo base_url(); ?>forum" target="_blank">Forum</a></li>
                  <li><a href="<?php echo base_url(); ?>internship">Internship</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <div class="appy_now">
                <a href="<?php cms_url('apply-now'); ?>">Apply Now <i class="fa fa-check"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--Header sec end-->