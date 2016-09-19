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

    public function portfolio()
    {
        $data = array();
        $data['meta_title'] = 'E-portfolio';
        $data['parent'] = 'portfolio';
        $data['certifications'] = $this->common_model->getAllRecordsOrderById(CERTIFICATIONS,'id','DESC',array('user_id' => $this->uid));
        $data['education']      = $this->common_model->getAllRecordsOrderById(EDUCATION,'id','DESC',array('user_id' => $this->uid));
        $data['interests']      = $this->common_model->getAllRecordsOrderById(INTERESTS,'id','DESC',array('user_id' => $this->uid));
        $data['volunteers']     = $this->common_model->getAllRecordsOrderById(VOLUNTEERS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('student/portfolio', $data);
    }

    public function saveEducation()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('school','School','trim|required');
            $this->form_validation->set_rules('days_atteend_from','Dates Attended From','trim|required');
            $this->form_validation->set_rules('days_atteend_to','Dates Attended To','trim|required');
            $this->form_validation->set_rules('degree','Degree','trim|required');
            $this->form_validation->set_rules('field_of_study','Field Of Study','trim|required');
            $this->form_validation->set_rules('grade','Grade','trim|required');
            $this->form_validation->set_rules('activities','Activities and Societies','trim|required');
            $this->form_validation->set_rules('edu_description','Description','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(EDUCATION,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Education successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'school'            => form_error('school'),
                    'days_atteend_from' => form_error('days_atteend_from'),
                    'days_atteend_to'   => form_error('days_atteend_to'),
                    'degree'            => form_error('degree'),
                    'field_of_study'    => form_error('field_of_study'),
                    'grade'             => form_error('grade'),
                    'activities'        => form_error('activities'),
                    'edu_description'   => form_error('edu_description')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function saveVolunteer()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('organisation','Organisation','trim|required');
            $this->form_validation->set_rules('role','Role','trim|required');
            $this->form_validation->set_rules('cause','Cause','trim|required');
            $this->form_validation->set_rules('vo_month','Month','trim|required');
            $this->form_validation->set_rules('vo_year','Year','trim|required');
            $this->form_validation->set_rules('vo_description','Description','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(VOLUNTEERS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Volunteer successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'organisation'  => form_error('organisation'),
                    'role'          => form_error('role'),
                    'cause'         => form_error('cause'),
                    'vo_month'      => form_error('vo_month'),
                    'vo_year'       => form_error('vo_year'),
                    'vo_description'=> form_error('vo_description')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function saveInterest()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('interests','Interests','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(INTERESTS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Interests successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'interests'  => form_error('interests'),
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function saveCertificate()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('certificate_name','Certificate Name','trim|required');
            $this->form_validation->set_rules('authority','Authority','trim|required');
            $this->form_validation->set_rules('license','License','trim|required');
            $this->form_validation->set_rules('certification_url','Certification URL','trim|required');
            $this->form_validation->set_rules('month','Month','trim|required');
            $this->form_validation->set_rules('year','Year','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(CERTIFICATIONS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Certificate successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'certificate_name'              => form_error('certificate_name'),
                    'authority'         => form_error('authority'),
                    'license'           => form_error('license'),
                    'certification_url' => form_error('certification_url'),
                    'month'             => form_error('month'),
                    'year'              => form_error('year')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function deletePortfolio($table,$id)
    {
        $id = decode($id);
        if($this->common_model->deleteRecord($table,array('id' => $id))){
            $this->session->set_flashdata('success',ucwords($table).' deleted successfully');
        }else{
            $this->session->set_flashdata('error',GENERAL_ERROR);
        }
        redirect('student/portfolio');
    }
    
}

?>