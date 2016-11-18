<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Common Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Send mail
* @param Message, Subject, Email address
* @return true OR false
*/
if (!function_exists('send_mail')) {
	function send_mail($message, $subject, $email_address,$from="") {
	    $ci =&get_instance();
		$ci->load->library('email');
		$config['mailtype'] = 'html';
		$ci->email->initialize($config);
		if(!empty($from)){
			$ci->email->from($from);
		}else{
			$ci->email->from(get_option('site_email'));
		}	
		$ci->email->to($email_address);
		$ci->email->subject($subject);
        $ci->email->message($message);
        
		if($ci->email->send()) {	
			return true;
		} else {
			return false;
		}
	}
}

/**
* print_r formatting
* @param Array $array
* @return formatted array including <pre> tag.
*/
if(!function_exists('p')) {
	function p($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
		die;
	}
}

function datetime()
{
  $datetime = date('Y-m-d H:i:s');
  return $datetime;
}

function convertDateTime($datetime)
{
  $convertedDateTime = date('d F Y, h:i A', strtotime($datetime));
  return $convertedDateTime;
}

function encode($str){
    $one = serialize($str);
    $two = @gzcompress($one,9);
    $three = addslashes($two);
    $four = base64_encode($three);
    $five = strtr($four, '+/=', '-_.');
    return $five;
}

function decode($str){
  $one = strtr($str, '-_.', '+/=');
    $two = base64_decode($one);
    $three = stripslashes($two);
    $four = @gzuncompress($three);
    if ($four == '') {
        return "z1"; //Please use the correct code / data string which you get.
    } else {
        $five = unserialize($four);
        return $five;
    }
}

/**
* check for required value in rest api
* @param Array $chk_params, $converted_array
* @return missed params
*/
if(!function_exists('check_required_value')) {
	function check_required_value($chk_params, $converted_array) {
        foreach ($chk_params as $param) {
            if (array_key_exists($param, $converted_array) && ($converted_array[$param] != '')) {
                $check_error = 0;
            } else {
                $check_error = array('check_error' => 1, 'param' => $param);
                break;
            }
        }
        return $check_error;
	}
}

/**
* Admin assets url for all the resources Eg: css, images, js, font files
* @param NULL
* @return Application url with assets folder
*/
if(!function_exists('admin_assets')) {
	function admin_assets() {
		echo base_url().'assets/admin/';
	}
}

/**
* Admin assets url for all the resources Eg: css, images, js, font files
* @param NULL
* @return Application url with assets folder
*/
if(!function_exists('get_admin_assets')) {
	function get_admin_assets() {
		return base_url().'assets/admin/';
	}
}

/**
* Load admin view dynamically
* @param Content view path = $view_path
* @param Array $data for extra meta info
* @param $header = TRUE
* @param $sidebar = TRUE
* @param $footer = TRUE
*/
if(!function_exists('load_admin_view')) {
	function load_admin_view($view_path, $data = array(), $header = true, $sidebar = true, $footer = true) {
		if(!empty($view_path)) {
			$ci =&get_instance();

			/* Load Header */
			if($header) {
				$ci->load->view(INCLUDES.'header', $data);
			}

			/* Leaft Sidebar */
			if($sidebar) {
				$ci->load->view(INCLUDES.'left-sidebar', $data);
			}

			/* Load content section */
			$ci->load->view($view_path, $data);

			/* Load footer */
			if($footer) {
				$ci->load->view(INCLUDES.'footer', $data);
			}
		} else {
			show_error('Unable to load content view, please check again.');
		}
	}
}

/**
* Add active class on the menu
* @param CI router class by $this->router->fetch_class()
* @return active class based on the router condition
*/
if(!function_exists('add_active_class')) {
	function add_active_class($ccl = '', $class = '') {
		$ci =&get_instance();
		$currentMethod = $ci->router->fetch_method();
		$currentClass = $ci->router->fetch_class();

		if($ccl == $currentClass && $currentMethod == $class) {
			echo 'active';
		}
	}
}

/**
* Add active class on the menu tree
* @param Array of CI router class by $this->router->fetch_class()
* @return active class based on the router condition
*/
if(!function_exists('tree_active_class')) {
	function tree_active_class($ccl = '', $class = array()) {
		$ci =&get_instance();
		$currentMethod = $ci->router->fetch_method();
		$currentClass = $ci->router->fetch_class();
		
		if($ccl == $currentClass && in_array($currentMethod, $class)) {
			echo 'active';
		}
	}
}

/**
* Get pref_value based on pref_key from system_preferences entity
* @param $key = pref_key
* @return pref_value
*/
if(!function_exists('get_option')) {
	function get_option($key = '') {
		$ci =&get_instance();
		$keyArr = array('preference_key' => $key);
	    $settings = $ci->common_model->getSingleRecordById(SYSTEM_PREFERENCE, $keyArr);
	    if(!empty($settings)) {
			return $settings['preference_value'];
		}
	}
}

/**
* Add or update pref_value based on pref_key from system_preferences entity
* @param $key = pref_key
* @return pref_value
*/
if(!function_exists('update_option')) {
	function update_option($key, $val) {
		$ci =&get_instance();
		$keyArr = array('preference_key' => $key);
	    $settings = $ci->common_model->getSingleRecordById(SYSTEM_PREFERENCE, $keyArr);
	    if(!empty($settings)) {
			/* Update key value */
			$data = array('preference_value' => $val);
			$where = array('preference_key' => $key);
			$ci->common_model->updateRecords(SYSTEM_PREFERENCE, $data, $where);
		} else {
			/* Add key value */
			$postData = array('preference_key' => $key, 'preference_value' => $val);
			$ci->common_model->addRecords(SYSTEM_PREFERENCE, $postData);
		}
	}
}

/**
* Admin Meta title
* @param Meta Title dynamically from methods
* @return $title, meta title of the application
*/
if(!function_exists('admin_meta_title')) {
	function admin_meta_title($str = '') {
		$siteName = get_option('site_name');
		
		if(empty($siteName)) {
			$siteName = CMS_NAME;
		}

		if(!empty($str)) {
			$title = $str.' | '.$siteName;
		} else {
			$title = 'Admin Panel | '.$siteName;
		}
		echo $title;
	}
}

/**
* Meta title
* @param Meta Title dynamically from methods
* @return $title, meta title of the application
*/
if(!function_exists('meta_title')) {
	function meta_title($str = '') {
		$churchOption = get_option('site_name');
		if(!empty($str)) {
			$churchName = $str;
		} elseif(empty($churchOption)) {
			$churchName = get_option('site_name');
		} else {
			$churchName = 'Welcome';
		}

		$separator = get_option('meta_separator');
		if(empty($separator)) {
			$separator = '|';
		}

		$curchDescription = get_option('site_description');
		if(empty($curchDescription)) {
			$curchDescription = CMS_NAME;
		}
		$title = $churchName . ' ' . $separator . ' ' . $curchDescription;
		return $title;
	}
}

/**
* Add dymanic class to the body based on the body_class key in any methods.
* @param $class
* @return $class, which has to be added ont the body
*/
if(!function_exists('body_class')) {
	function body_class($class = '') {
		if(is_array($class)) {
			$classRet = implode(' ', $class);
		} else {
			$classRet = $class;
		}
		echo $classRet;
	}
}

/**
* Return cms url
* @param $url = 'controller/method'
* @param if browser have return_url then it's also return return_uri
*/
if(!function_exists('cms_url')) {
	function cms_url($url = '') {
		$ci =&get_instance();
		if(empty($url)) {
			echo base_url();
		} else {
			if($ci->input->get('return_uri')) {
				echo base_url().$url.'?return_uri='.urlencode($ci->input->get('return_uri'));
			} else {
				echo base_url().$url;
			}
		}
	}
}

/**
* Return cms url
* @param $url = 'controller/method'
* @param if browser have return_url then it's also return return_uri
*/
if(!function_exists('get_cms_url')) {
	function get_cms_url($url = '') {
		$ci =&get_instance();
		if(empty($url)) {
			return base_url();
		} else {
			if($ci->input->get('return_uri')) {
				return base_url().$url.'?return_uri='.urlencode($ci->input->get('return_uri'));
			} else {
				return base_url().$url;
			}
		}
	}
}

/**
* File upload
* @param Array $_FILES, $config 
*/
if(!function_exists('upload_file')) {
	function upload_file($file, $config) {
		$ci =&get_instance();
		$ci->load->library('upload', $config);
		$resp = array();
        if (!$ci->upload->do_upload($config['field_name'])) {
            $error = array('error' => $ci->upload->display_errors());
            $resp = array('message' => 'failed', 'error' => $error);
        } else {
        	$uploadPath = explode('/', $config['upload_path']);
        	$uploadPath = $uploadPath[1].'/'.$uploadPath[2].'/';
            $uploadData = array('upload_data' => $ci->upload->data());
            $filename = $uploadData['upload_data']['file_name'];
            $resp = array('message' => 'success', 'upload_data' => $uploadData, 'file_name' => $filename, 'file_path' => get_cms_url('').$uploadPath.$filename);
        }
        return $resp;
	}
}

/**
* Show selected in select tag
* @param $currentValue, $desiredValue
*/
if(!function_exists('show_selected')) {
	function show_selected($currentValue, $desiredValue) {
		if($currentValue == $desiredValue) {
			echo 'selected="selected"';
		}
	}
}

/**
* Show selected in select tag
* @param $currentValue, $desiredValue
*/
if(!function_exists('get_show_selected')) {
	function get_show_selected($currentValue, $desiredValue) {
		if($currentValue == $desiredValue) {
			return 'selected="selected"';
		}
	}
}

/**
* Error log level
* @return Array of error log level
*/
if(!function_exists('error_log_level')) {
	function error_log_level() {
		return array(
			'1' => 'Critical Errors',
			'2' => 'Warnings and Errors',
			'3' => 'Debug Level'
		);
	}
}

/**
* Admin Favicon
* @return favicon HTML
*/
if(!function_exists('admin_favicon')) {
	function admin_favicon() {
		$favicon = get_option('site_favicon');
		if(empty($favicon)) {
			$favicon = get_admin_assets().'dist/img/favicon.png';
		}
		echo '<link rel="icon" href="'.$favicon.'"/>';
	}
}

/**
* Custom Pagination
* @param 
*/
if(!function_exists('custom_pagination')) {
	function custom_pagination($url, $total_records, $results, $pull = 'right', $uri_segment = '') {
		$ci =&get_instance();
		$config['full_tag_open'] 	= '<ul class="pagination pagination-sm no-margin pull-'.$pull.'">';
		$config['full_tag_close'] 	= '</ul>';				
		$config['cur_tag_open'] 	= '<li class="activePaginationNum paginationNums">';
		$config['cur_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&raquo;';
		$config['next_tag_open'] 	= '<li class="paginationNums">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&laquo;';		
		$config['prev_tag_open'] 	= '<li class="paginationNums">';
		$config['prev_tag_close'] 	= '</li>';	
		$config['first_tag_open'] 	= '<li class="paginationNums">';
		$config['first_tag_close'] 	= '</li>';
		$config['first_link']		= '&laquo; First';	
		$config['last_tag_open'] 	= '<li class="paginationNums">';
		$config['last_tag_close'] 	= '</li>';
		$config['last_link']		= 'Last &raquo;';			
		$config['num_tag_open'] 	= '<li class="paginationNums">';
		$config['num_tag_close'] 	= '</li>';
		$config['base_url'] 		= $url;
		if(!empty($uri_segment)) {
			$config['uri_segment'] 		= $uri_segment;
		}
		$config['total_rows'] 		= $total_records;
		$config['per_page'] 		= $results;

		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}
}

/**
* Decode rest api request
* @param json
* @return array of json
*/
if(!function_exists('decode_request')) {
	function decode_request() {
		$reqArr = json_decode(file_get_contents('php://input'), TRUE);
		if(array_key_exists('reqObj', $reqArr)) {
			return $reqArr['reqObj'];
		} else {
			echo json_encode(array('error' => 'Invalid json request'));
			exit();
		}
	}
}

function getMonths(){
  $monthArr = array('January','February','March','April','May','June','July','August','September','October','November','December');
  return $monthArr ;
}


function strReplaceAttr() {
	return array(" ", '_', '.', '`', ':', ';', '+', '@', '(', ')', '{', '}', '*');
}

function getUniversityUrl($id,$name = '') {
	$ci =&get_instance();
	if(empty($name)){
		$universityData = $ci->common_model->getSingleRecordById(UNIVERSITIES, array('id' => $id));
		$univ_name = $universityData['name'];
	}else{
		$univ_name = $name;
	}
	if(!empty($universityData)) {
		$slug = strtolower(str_replace(strReplaceAttr(), '-', $univ_name));
		return base_url().'university/details/'.$id.'/'.$slug;
	}
}

function parseVideos($videoString = null){
    // return data
    $videos = array();
    if (!empty($videoString)) {
        // split on line breaks
        $videoString = stripslashes(trim($videoString));
        $videoString = explode("\n", $videoString);
        $videoString = array_filter($videoString, 'trim');
        // check each video for proper formatting
        foreach ($videoString as $video) {
            // check for iframe to get the video url
            if (strpos($video, 'iframe') !== FALSE) {
                // retrieve the video url
                $anchorRegex = '/src="(.*)?"/isU';
                $results = array();
                if (preg_match($anchorRegex, $video, $results)) {
                    $link = trim($results[1]);
                }
            } else {
                // we already have a url
                $link = $video;
            }
            // if we have a URL, parse it down
            if (!empty($link)) {
                // initial values
                $video_id = NULL;
                $videoIdRegex = NULL;
                $results = array();
                // check for type of youtube link
                if (strpos($link, 'youtu') !== FALSE) {
                    if (strpos($link, 'youtube.com') !== FALSE) {
                        // works on:
                        // http://www.youtube.com/embed/VIDEOID
                        // http://www.youtube.com/embed/VIDEOID?modestbranding=1&amp;rel=0
                        // http://www.youtube.com/v/VIDEO-ID?fs=1&amp;hl=en_US
                        $videoIdRegex = '/youtube.com\/(?:embed|v){1}\/([a-zA-Z0-9_]+)\??/i';
                    } else if (strpos($link, 'youtu.be') !== FALSE) {
                        // works on:
                        // http://youtu.be/daro6K6mym8
                        $videoIdRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                    }
                    if ($videoIdRegex !== NULL) {
                        if (preg_match($videoIdRegex, $link, $results)) {
                            $video_str = 'http://www.youtube.com/v/%s?fs=1&amp;autoplay=1';
                            $thumbnail_str = 'http://img.youtube.com/vi/%s/2.jpg';
                            $fullsize_str = 'http://img.youtube.com/vi/%s/0.jpg';
                            $video_id = $results[1];
                        }
                    }
                }
                // handle vimeo videos
                else if (strpos($video, 'vimeo') !== FALSE) {
                    if (strpos($video, 'player.vimeo.com') !== FALSE) {
                        // works on:
                        // http://player.vimeo.com/video/37985580?title=0&amp;byline=0&amp;portrait=0
                        $videoIdRegex = '/player.vimeo.com\/video\/([0-9]+)\??/i';
                    } else {
                        // works on:
                        // http://vimeo.com/37985580
                        $videoIdRegex = '/vimeo.com\/([0-9]+)\??/i';
                    }
                    if ($videoIdRegex !== NULL) {
                        if (preg_match($videoIdRegex, $link, $results)) {
                            $video_id = $results[1];
                            // get the thumbnail
                            try {
                                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
                                if (!empty($hash) && is_array($hash)) {
                                    $video_str = 'http://vimeo.com/moogaloop.swf?clip_id=%s';
                                    $thumbnail_str = $hash[0]['thumbnail_small'];
                                    $fullsize_str = $hash[0]['thumbnail_large'];
                                } else {
                                    // don't use, couldn't find what we need
                                    unset($video_id);
                                }
                            } catch (Exception $e) {
                                unset($video_id);
                            }
                        }
                    }
                }
                // check if we have a video id, if so, add the video metadata
                if (!empty($video_id)) {
                    // add to return
                    $videos[] = array(
                        'url' => sprintf($video_str, $video_id),
                        'thumbnail' => sprintf($thumbnail_str, $video_id),
                        'fullsize' => sprintf($fullsize_str, $video_id)
                    );
                }
            }
        }
    }
    // return array of parsed videos
    return $videos;
}

function getVimeoVideoIdFromUrl($url = '') {
    $regs = array();
    $id = '';
    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
        $id = $regs[3];
    }
    return $id;
}
    
/* End of file common_helper.php */
/* Location: ./system/application/helpers/common_helper.php */