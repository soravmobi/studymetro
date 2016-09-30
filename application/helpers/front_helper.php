<?php

if(!function_exists('checkUserSession')) {
	function checkUserSession($types)
	{
		$ci =&get_instance();
	    if ($ci->session->userdata('user_id')==TRUE && in_array($ci->session->userdata('user_type'), $types))
	    {
	        $ci->session->set_userdata('user_activity',time());
	    }
	    else
	    {
	        redirect('/');
	    }
	}
}

if(!function_exists('load_front_view')) {
	function load_front_view($view_path, $data = array(), $header = true, $footer = true) {
		if(!empty($view_path)) {
			$ci =&get_instance();

			/* Load Header */
			if($header) {
				$ci->load->view(FRONT_INCLUDES.'header', $data);
			}

			/* Load content section */
			$ci->load->view($view_path, $data);

			/* Load footer */
			if($footer) {
				$ci->load->view(FRONT_INCLUDES.'footer', $data);
			}
		} else {
			show_error('Unable to load content view, please check again.');
		}
	}
}

if(!function_exists('getmenus')) {
	function getmenus()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(STATIC_PAGE,'page_no','ASC',array('status' => 1));
	    return $results;
	}
}

if(!function_exists('getUserDetails')) {
	function getUserDetails()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsById(USER,array('id' => $ci->session->userdata('user_id')));
	    return $results;
	}
}

if(!function_exists('getUserDetailsBy')) {
	function getUserDetailsBy($column,$value)
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsById(USER,array($column => $value));
	    return $results;
	}
}

if(!function_exists('getUniversity')) {
	function getUniversity($id="")
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsByOrder(UNIVERSITIES,'name','ASC');
	    if(empty($id)){
	    	return $results;
	    }else{
	    	$univesities = array();
	    	foreach($results as $r){
	    		$row[$r['id']] = $r['name'];
	    		array_push($univesities, $row);
	    	}
	    	$universities = end($univesities);
	    	return $universities[$id];
	    }
	}
}

if(!function_exists('getphotogallery')) {
	function getphotogallery()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(PHOTOS,'id','DESC',array('types' => 0));
	    return $results;
	}
}

if(!function_exists('getvideogallery')) {
	function getvideogallery()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(PHOTOS,'id','DESC',array('types' => 1));
	    return $results;
	}
}

if(!function_exists('gettestimonials')) {
	function gettestimonials()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(TESTIMONIALS,'id','DESC',array('status' => 0));
	    return $results;
	}
}

if(!function_exists('getevents')) {
	function getevents()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(EVENTS,'id','DESC',array('status' => 0));
	    return $results;
	}
}

if(!function_exists('getCountries')) {
	function getCountries()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(COUNTRY,'nicename','ASC');
	    return $results;
	}
}

if(!function_exists('getEducationLevels')) {
	function getEducationLevels()
	{
		$education = array('Pre-High School','Secondary (in progress)','Secondary (completed)','Associates or Equivalent (in progress)','Associates or Equivalent (completed)','Bachelors or Equivalent (in progress)','Bachelors or Equivalent (completed)','Masters or Equivalent (in progress)','Masters or Equivalent (completed)','PhD (in progress)','PhD (completed)');
	    return $education;
	}
}

if(!function_exists('getProfession')) {
	function getProfession()
	{
		$profession = array('Administration/Clerical','Agronomist','Computers/Technology','Customer Service','Dentist','Design','Education','Engineering/Architecture','Executive','Finance/Accounting/Banking','Fine Arts','Human Resources','Information Technology','Law and Law Enforcement','Manufacturing','Marketing','Medical/Pharmaceutical','Other','Psychologist','Public work','Retail','Sciences','Security','Social Work','Student','Transportation','Unemployed','Veterinarian');
	    return $profession;
	}
}

if(!function_exists('documents')) {
	function documents()
	{
		$documents = array('Passport/ID','Transcript','Certificate/Diploma','Resume/CV','Financial Support','GMAT/GRE/SAT Scores','Other');
	    return $documents;
	}
}

if(!function_exists('profile_types')) {
	function profile_types()
	{
		$profile_types = array('Language Courses','Undergraduate/Community College/Technical','Secondary','Extension / Certificate / Diploma','Graduate/Postgraduate','MBA Program','Online Distance Learning','Vocational/ Career / Technical');
	    return $profile_types;
	}
}

if(!function_exists('program_types')) {
	function program_types()
	{
		$program_types = array('Language','Secondary','Undergrad','Postgrad','MBA','Short-Term','Vocational','Online');
	    return $program_types;
	}
}

if(!function_exists('top_degrees')) {
	function top_degrees()
	{
		$top_degrees = array('Associates','Bachelors','Masters','Doctorals','Post Doctorals');
	    return $top_degrees;
	}
}

if(!function_exists('getservices')) {
	function getservices()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(SERVICES,'id','DESC',array('status' => 0));
	    return $results;
	}
}

if(!function_exists('getSeacrhStudyPrograms')) {
	function getSeacrhStudyPrograms()
	{
		$html = '<div class="banner_search_wrap about_page"> <div class="container"> <div class="row"> <div class="col-md-12 col-sm-12"> <form class="search_form"> <div class="head_search"> <div class="txt_search"> Find your ideal study program </div></div><div class="search_form_content about_content"> <div class="form-group"> <div class="select_box"> <select class="form-control"> <option>Choose a country</option> <option>2</option> </select> <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i> </div></div><div class="form-group"> <div class="select_box"> <select class="form-control"> <option>Choose a area</option> <option>1</option> </select> <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i> </div></div><div class="form-group"> <div class="select_box"> <select class="form-control"> <option>Choose a level</option> <option>3</option> </select> <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i> </div></div><div class="form-group"> <div class="button_box"> <button type="submit">Search </button> </div></div></div></form> </div></div></div></div>';
		return $html;
	}
}

if(!function_exists('getSideBarVideos')) {
	function getSideBarVideos()
	{
		$html = '';
		$html .= '<div class="left_video_bar">';
		$html .= '<div class="head_left_video "> Videos <a href="javascript:void(0);" class="pull-right"><i class="fa fa-video-camera" aria-hidden="true"></i></a> </div>';
		$html .= '<div class="head_left_video_content"><div id="video_slider" class="owl-carousel owl-theme">';
		foreach(getvideogallery() as $v)
		{
			$html .= '<div class="item"><iframe width="100%" height="200" frameborder="0" allowfullscreen="" src="'.$v['name'].'"></iframe></div>';
		}
		$html .= '</div></div></div>';
		return $html;
	}
}

if(!function_exists('getSideBarEvents')) {
	function getSideBarEvents()
	{
		$html = '';
		$html .= '
		<div class="left_video_bar"><div class="head_left_video "> Event <a href="javascript:void(0);" class="pull-right"><i class="fa fa-flag" aria-hidden="true">
		</i></a> </div> <div id="events_slider" class="owl-carousel">';
		
		foreach(getevents() as $e)
		{
			$dateArr = explode("-", $e['date']);
			$html .= '<div class="item"><div class="head_left_video_content event" style="background-image:url(assets/images/event_bg.jpg);">';
			$html .= '<div class="event_left"><div class="date_box"><div class="date_box_top"> '.$dateArr[2].' </div><div class="date_box_bottom"> '.$dateArr[1].' <span>'.$dateArr[0].'</span> </div></div><span>Posted in: '.$e['posted_in'].'</span></div>';
			$html .= '<div class="event_right"><div class="head_event_right"> Upcoming Event </div><p title="'.$e['content'].'">'.substr($e['content'],0,80).'</p></div></div></div>';
		}
		$html .= '</div></div>';
		return $html;
	}
}

if(!function_exists('getOurServices')) {
	function getOurServices()
	{
		$html = '';
		$html .= '<section class="our_services"><div class="container"><div class="common_head footer_head"><h2>Our Services Includes:</h2><div class="head_border"><span><i aria-hidden="true" class="fa fa-ioxhost"></i></span></div></div> <div class="our_services_content"><div class="row"><div class=""><ul class="list_services">';
		foreach(getservices() as $s)
		{
			$html .= '<li><i class="fa fa-check" aria-hidden="true"></i>'.$s['title'].'</li>';
		}
		$html .= '</ul></div></div></div></div></section>';
		return $html;
	}
}

if(!function_exists('getPhotosGallery')) {
	function getPhotosGallery()
	{
		$html = '';
		$html .= '<section class="gallery_wrap"><div class="container"><div class="common_head footer_head"><h2>Photo Gallery</h2><div class="head_border"><span><i class="fa fa-ioxhost" aria-hidden="true"></i></span></div></div><div class="gallery_content clearfix"><div id="my-gallery-container" class="">';
		foreach(getphotogallery() as $p) {
			$html .= '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 padding"><div class="item"><a href="'.$p['name'].'" class="gallery"> <img src="'.$p['name'].'"></a></div></div>';
		}
		$html .= '</div></div></div></section>';
		return $html;
	}
}

if(!function_exists('getScholarshipForm')) {
	function getScholarshipForm()
	{
		$html = '';
		$html .= '<section class="apply_sec"><div class="apply_bg" style="background-image:url('.base_url().'assets/images/apply_bg.jpg);"><div class="container"><div class="row"><div class="col-md-12 col-sm-12"><div class="apply_form"><div class="row"><div class="col-md-6 col-sm-6"><div class="our_program"><div class="head_program">Top Programs in <span>Abroad!</span></div><div class="content_program"><ul>';
		$html .= '<li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Work and Study program in USA</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i>Co-Op Program in Canada with Paid Internship</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i>Free Education in Germany </a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Paid Internship in France</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> SVP Visa process in Australia</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Study in New Zealand With Paid Internship</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Study Abroad Program</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i>Study in Ireland with Internship</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i>Study in Europe at Indian Cost</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Unique Programs Available</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Study in UK- Worlds Best Education System</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Study-Work-Settle in Ireland</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Study in Malaysia at Indian Cost</a></li><li><a href="javascript:void(0);"><i class="fa fa-check"> </i> Study and Work Singapore </a></li>';
		$html .= '</ul></div></div></div><div class="col-md-6 col-sm-6"><form class="form_apply" method="post" action="'.base_url().'front/home/doEnquiry"> <div class="head_program "> <span>Apply for Scholarship Today</span> </div><div class="form-apply_content"> <div class="form-group"> <input type="text" class="form-control" id="Name" placeholder="Name" name="name" required> </div><div class="form-group"> <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required> </div><div class="form-group"> <input type="text" class="form-control" id="PhoneNumber" placeholder="Phone Number" name="phone" required> </div><div class="form-group"> <input type="text" class="form-control" id="City" placeholder="City" name="city" required> </div><div class="form-group"> <input type="text" class="form-control" id="InterestedCountry" placeholder="Interested Country" name="country" required> </div><div class="form-group"> <button type="submit" class="apply_btn">Apply Now</button> </div></div></form></div></div></div></div></div></div></div><div class="apply_row"><a href="javascript:void(0);"> Apply today and Talk to Advisor at 8088-867-867</a></div></section>';
		return $html;
	}
}

if(!function_exists('getTestimonails')) {
	function getTestimonails()
	{
		$html = '';
		$html .= '<section class="testimonial_bg" style="background-image:url('.base_url().'assets/images/testimoni_bg.jpg);"><div class="white_overlay"></div><div class="testimonial_sec"><div class="container"><div class="row"><div class="col-md-12 col-sm-12"><div class="common_head"><h2>Students Testimonial</h2><div class="head_border"><span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span></div></div><div class="testimonial_slider_sec"> <div id="testimonial_slider" class="owl-carousel owl-theme">';
		foreach(gettestimonials() as $t) {
			$html .= '<div class="item"><div class="item_img"><img src="'.$t['image'].'" alt="'.$t['given_by'].'"></div><div class="item_data"><p>'.$t['content'].'</p><span class="meta_slider">'.$t['given_by'].'</span></div></div>';
		}
		$html .= '</div></div></div></div></div></div><div class="newsletter"> <div class="container"> <form method="post" action="'.base_url().'front/home/doEnquiry"> <label>Newsletter Signup</label> <div class="form-group"> <input type="email" placeholder="email" class="form-control" required name="email"> <i class="fa fa-envelope"></i> </div><div class="form-group"> <input type="text" placeholder="mobile" class="form-control" required name="phone"> <i class="fa fa-mobile" aria-hidden="true"></i> </div><div class="form-group"> <button type="submit" class="submit_btn">Submit</button> </div></form> </div></div></section>';
		return $html;
	}
}

if(!function_exists('getVideoGallerySection')) {
	function getVideoGallerySection()
	{
		$html = '';
		$html .= '<section class="home_video_sec"><div class="container"><div id="home_video">';
		foreach(getvideogallery() as $v) { 
			$html .= '<div class="item"><div class="video_box"><iframe width="100%" height="200" frameborder="0" allowfullscreen="" id="video'.$v['id'].'" src="'.$v['name'].'"></iframe><div class="more_video_box"><a class="more_photo more_video" href="javascript:void(0);" data-featherlight="#video'.$v['id'].'">Watch Now </a></div></div></div>';
		}
		$html .= '</div></div></section>';
		return $html;
	}
}

if(!function_exists('getPageName')) {
	function getPageName($key)
	{
		$pages = array(
					'1' => 'Home',
					'2' => 'About Us',
					'3' => 'University',
					'4' => 'Search Programs',
					'5' => 'Study Work Abroad',
					'6' => 'Forum',
					'7' => 'Visa',
					'8' => 'Summer Programs',
					'9' => 'Online Training',
					'10' => 'Blogs',
					'11' => 'FAQS',
					'12' => 'Contact US',
					'13' => 'Default Template',
				);
		return $pages[$key];
	}
}



?>