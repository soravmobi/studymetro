<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct() {
        parent::__construct();
        checkUserSession(array('2'));
        $this->uid = $this->session->userdata("user_id");
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function getquote()
    {
        $data = array();
        $data['meta_title'] = 'Get Quote';
        $data['parent'] = 'quote';
        load_front_view('student/getquote', $data);
    }

    public function submitQuote()
    {
        $data = $this->input->post();
        $this->form_validation->set_rules('quote','Quotation','trim|required');
        if($this->form_validation->run()==TRUE){
        	$user = getUserDetails();
        	$data['name']  = $user[0]['first_name']." ".$user[0]['last_name'];
        	$data['email'] = $user[0]['email'];
        	$data['phone'] = $user[0]['phone_number'];
            $data['added_date'] = datetime();
            $lid = $this->common_model->addRecords(QUOTATIONS,$data);
            if(!empty($lid)){
                $this->session->set_flashdata('success','Your message has been sent successfully');
                redirect('student/getquote');
            }else{
                $this->session->set_flashdata('error', 'Failed please try again !!');
                redirect('student/getquote');
            }
        }else{
            $data['meta_title'] = 'Get Quote';
	        $data['parent']     = 'quote';
	        load_front_view('student/getquote', $data);
        }
    }

    
}

?>