<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* programs index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Import programs
	* @param $_POST
    */
    public function import() {
    	is_logged_in($this->url.'/import');
		$data = array();
		$data['meta_title'] = 'Import';
		$data['small_text'] = 'Import';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'import_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('programs/import-programs', $data);
    }

    public function importData(){
    	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    	require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		try {
		    $objPHPExcel = PHPExcel_IOFactory::load($file_tmp_name);
		} catch(Exception $e) {
		    die('Error loading file :' . $e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		unset($sheetData[1]);
		foreach(array_values($sheetData) as $s)
		{
			$photosArr = array($s['AB'],$s['AC'],$s['AD'],$s['AE'],$s['AF'],$s['AG'],$s['AH'],$s['AI'],$s['AJ'],$s['AK']);
			$dataArr = array(
					'name'    => $s['A'],
					'founded' => $s['B'],
					'country' => $this->input->post('country'),
					'logo'    => $s['C'],
					'image'   => $s['D'],
					'location'=> $s['E'],
					'address' => $s['F'],
					'accreditation' => $s['G'],
					'requirement'    => $s['H'],
					'institution'    => $s['I'],
					'estimated_cost' => $s['J'],
					'programs'       => $s['K'],
					'president' 	 => $s['L'],
					'total_students' => $s['M'],
					'international_students' => $s['N'],
					'institution_number' => $s['O'],
					'accommodation' => $s['P'],
					'phone'         => $s['R'],
					'email' 		=> $s['S'],
					'tution_fee'    => @$s['AO'],
					'application_fee' => @$s['AP'],
					'admission_start_month' => @$s['AQ'],
					'website'         => $s['T'],
					'facebook_link'   => $s['U'],
					'twitter_link'    => $s['V'],
					'google_plus_link'=> $s['W'],
					'linkedin_link'   => $s['X'],
					'instagram_link'  => $s['Y'],
					'youtube_link'    => $s['Z'],
					'youtube_video'   => $s['AA'],
					'photos'          => json_encode($photosArr),
					'quotes_title'   => $s['AL'],
					'quotes_content' => $s['AM'],
					'content'        => $s['AN'],
				);
			$this->common_model->addRecords(UNIVERSITIES, $dataArr);
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'University'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all programs
	* @return Array of all programs
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Programs';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		/* Fetch Data */
        $offset = $this->uri->segment(4);
	    if(!$offset) {
		 	$offset = 0;
	    }

	    $data['offset'] = $offset;
	    $data['programs'] = '';
	    $data['pagination'] = '';
	    $data['programs'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(PROGRAMS, (isset($_GET['s'])) ? array('location', 'undergraduate_courses', 'graduate_courses', 'scholarship') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['programs']) > 0) {
	    	/* Pagination records */
	        $url = get_cms_url().$this->url.'/view-all';
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(PROGRAMS, (isset($_GET['s'])) ? array('location', 'undergraduate_courses', 'graduate_courses', 'scholarship') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
	    }

		/* Load admin view */
		load_admin_view('programs/view-all-programs', $data);
    }

    /**
    * Delete program
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(PROGRAMS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Program'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

	
}