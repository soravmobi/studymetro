<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* photos index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new photos
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Photo';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_university');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('photos/add-new-photo', $data);
    }

    public function addphotos()
    {
    	$files = $_FILES['photos'];
    	$config['upload_path']   = 'uploads/photos/'; 
		$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		$this->load->library('upload', $config);
		for ($i=0; $i < count($_FILES['photos']['name']); $i++) { 
			$_FILES['photos[]']['name']     = $_FILES['photos']['name'][$i];
	        $_FILES['photos[]']['type']     = $_FILES['photos']['type'][$i];
	        $_FILES['photos[]']['tmp_name'] = $_FILES['photos']['tmp_name'][$i];
	        $_FILES['photos[]']['error']    = $_FILES['photos']['error'][$i];
	        $_FILES['photos[]']['size']     = $_FILES['photos']['size'][$i]; 
	        if ($this->upload->do_upload('photos[]')) {
	        	$photos_files = array('upload_data' => $this->upload->data()); 
	        	$photos_arr[] = $photos_files['upload_data']['file_name'];
	        }else{
	        	$error[] = $this->upload->display_errors();
	        }
		}
		if(isset($error) && !empty($error)){
			$this->session->set_flashdata('general_error', 'Failed please try again !!');
            redirect($this->url.'/add-new');
		}else{
			foreach($photos_arr as $p){
				$data = array(
							'name' => base_url().'uploads/photos/'.$p,
							'types'=> 0,
							'added_date' => date('Y-m-d H:i:s')
						);
				$this->common_model->addRecords(PHOTOS, $data);
			}
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Photos'));
            redirect($this->url.'/view-all');
		}
    }

    /**
	* View all photos
	* @return Array of all photos
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Photos';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_photo');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		/* Fetch Data */
        $offset = $this->uri->segment(4);
	    if(!$offset) {
		 	$offset = 0;
	    }

	    $data['offset'] = $offset;
	    $data['photo'] = '';
	    $data['pagination'] = '';
	    $data['photo'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(PHOTOS, (isset($_GET['s'])) ? array('name') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, array('types' => 0));
	    if(count($data['photo']) > 0) {
	    	/* Pagination records */
	        $url = get_cms_url().$this->url.'/view-all';
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(PHOTOS, (isset($_GET['s'])) ? array('name') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', array('types' => 0));
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
	    }

		/* Load admin view */
		load_admin_view('photos/view-all-photo', $data);
    }

    /**
    * Delete photos
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(PHOTOS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Photo'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}