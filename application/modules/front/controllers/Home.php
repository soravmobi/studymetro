<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function index() {
        $data = array();
        $data['meta_title'] = 'Home';
        $data['details'] = $this->common_model->getSingleRecordById(STATIC_PAGE,array('page_no' => '1'));
        load_front_view('pages/home', $data);
    }

    public function universities() {
        $data = array();
        $data['meta_title'] = 'Universities';
        load_front_view('universities', $data);
    }

    public function pages($slug){
        $data = array();
        $data['details'] = $this->common_model->getSingleRecordById(STATIC_PAGE,array('slug' => $slug));
        if(!empty($data['details'])){
            $data['meta_title'] = $data['details']['title'];
            $data['meta_keywords'] = $data['details']['meta_keywords'];
            $data['meta_description'] = $data['details']['meta_description'];
            $page_name = strtolower(str_replace(' ', '-', getPageName($data['details']['page_no'])));
            load_front_view('pages/'.$page_name, $data);
        }else{
            redirect("/");
        }
    }

    public function faqs($country){
        $data = array();
        $data['faqs'] = $this->common_model->getAllRecordsById(FAQS,array('country' => str_replace("%20", " ", $country)));
        $data['meta_title'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_keywords'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_description'] = 'FAQS -'.str_replace("%20", " ", $country);
        load_front_view('pages/faq_detail', $data);
    }


}
?>