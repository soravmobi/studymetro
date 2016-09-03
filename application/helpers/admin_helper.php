<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Admin Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Skin Colors attributes
* @return Array of skins attributes
*/
if(!function_exists('skin_color_attributes')) {
	function skin_color_attributes() {
		return array(
			array(
				'section' => 'Header',
				'key' => 'header',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					)
				)
			), array(
				'section' => 'Footer',
				'key' => 'footer',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					)
				)
			), array(
				'section' => 'Left Menu',
				'key' => 'left_menu',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					), array(
						'label' => 'Sub Menu Background',
						'key' => 'sub_menu_background_color'
					), array(
						'label' => 'Sub Menu Link Color',
						'key' => 'sub_menu_link_color'
					), array(
						'label' => 'Sub Menu Active Link Color',
						'key' => 'sub_menu_active_link_color'
					), array(
						'label' => 'Sub Menu Link Hover Color',
						'key' => 'sub_menu_link_hover_color',
					), array(
						'label' => 'Sub Menu Active Link Background Color',
						'key' => 'sub_menu_link_background_color'
					)
				)
			), array(
				'section' => 'Content Section',
				'key' => 'content',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					)
				)
			)
		);
	}
}

function imgUpload($filename,$subfolder,$ext,$size="",$width="",$height="")
{
    $CI = & get_instance();
    $config['upload_path']   = 'uploads/'.$subfolder.'/'; 
    $config['allowed_types'] = $ext; 
    if($size){
      $config['max_size']   = 100; 
    }
    if($width){
      $config['max_width']  = 1024; 
    }
    if($height){
      $config['max_height'] = 768;  
    }
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($filename)) {
      $error = array('error' => $CI->upload->display_errors()); 
      return $error;
    }
   else { 
      $data = array('upload_data' => $CI->upload->data()); 
      return $data;
   } 
}

function getAllPages()
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
	return $pages;
}

function countries()
{
	$list = array('Australia','Canada','China','France','Ireland','Medical','New Zealand','USA','UK');
	return $list;
}

function getCountryFlag($country)
{
	$list = array(
				'Australia'   => 'aus_flag.png',
				'Canada'      => 'canada_flag.png',
				'China'       => 'china.gif',
				'France'      => 'Flag_of_France.png',
				'Ireland'     => 'Ireland_flag.png',
				'Medical'     => 'university_top_img.png',
				'New Zealand' => 'New_zealand_flag.png',
				'USA'         => 'usa_flag.png',
				'UK'          => 'uk_flag_thumb.png'
		);
	return $list[$country];
}

/* End of file admin_helper.php */
/* Location: ./system/application/helpers/admin_helper.php */