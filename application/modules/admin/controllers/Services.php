<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* services index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new service
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Service';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_testimonial');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('add-new-service', $data);
    }

    public function addServices()
    {
		foreach($_POST['title'] as $v){
			$data = array(
						'title' => $v,
						'added_date' => date('Y-m-d H:i:s')
					);
			$this->common_model->addRecords(SERVICES, $data);
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Services'));
        redirect($this->url.'/view-all');
		
    }

    /**
	* View all services
	* @return Array of all services
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Services';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_services');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		/* Fetch Data */
        $offset = $this->uri->segment(4);
	    if(!$offset) {
		 	$offset = 0;
	    }

	    $data['offset'] = $offset;
	    $data['services'] = '';
	    $data['pagination'] = '';
	    $data['services'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(SERVICES, (isset($_GET['s'])) ? array('title') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['services']) > 0) {
	    	/* Pagination records */
	        $url = get_cms_url().$this->url.'/view-all';
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(SERVICES, (isset($_GET['s'])) ? array('title') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
	    }

		/* Load admin view */
		load_admin_view('view-all-services', $data);
    }

    /**
    * Delete services
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(SERVICES, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Service'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}