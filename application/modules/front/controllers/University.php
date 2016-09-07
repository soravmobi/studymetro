<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class University extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function details($id)
    {
    	$uid = decode($id);
        $data = array();
    	$data['details'] = $this->common_model->getSingleRecordById(UNIVERSITIES,array('id' => $uid));
        $data['meta_title'] = $data['details']['name'];
        load_front_view('pages/university_detail', $data);
    }

}

?>