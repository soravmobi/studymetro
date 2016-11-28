<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class University extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->uid = $this->session->userdata("user_id");
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function details($id)
    {
    	$uid = $id;
        $data = array();
        $data['details']    = $this->common_model->getSingleRecordById(UNIVERSITIES,array('id' => $uid));
    	$data['programs']   = getProgramsBy('university_id',$uid);
        $data['meta_title'] = $data['details']['meta_title'];
        $data['meta_description'] = $data['details']['meta_descprition'];
        $data['meta_keywords'] = $data['details']['meta_keywords'];
        load_front_view('pages/university_detail', $data);
    }

    public function profile_types()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'profile_types';
        load_front_view('university/profile_types', $data);
    }

    public function saveProfileTypes()
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

    public function post_grad()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'post_grad';
        load_front_view('university/post_grad', $data);
    }

    public function mba()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'mba';
        load_front_view('university/mba', $data);
    }

    public function short_term()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'short_term';
        load_front_view('university/short_term', $data);
    }

    public function online()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'online';
        load_front_view('university/online', $data);
    }

    public function international_partnerships()
    {
        $data = array();
        $data['details'] = $this->common_model->getAllRecordsById(INTERNATIONAL,array('university_id' => $this->uid));
        $data['meta_title'] = 'International Partnerships';
        $data['parent']     = 'international_partnerships';
        load_front_view('university/international_partnerships', $data);
    }

    public function saveInternationalPartnership()
    {
        $result = $this->common_model->getSingleRecordById(INTERNATIONAL,array('university_id' => $this->uid));
        $data = $this->input->post();
        if(isset($data['country']) && !empty($data['country'])){
            $data['country'] = serialize($data['country']);
        }
        if(isset($data['programs']) && !empty($data['programs'])){
            $data['programs'] = serialize($data['programs']);
        }
        if(isset($data['top_programs']) && !empty($data['top_programs'])){
            $data['top_programs'] = serialize($data['top_programs']);
        }
        if(isset($data['top_degrees']) && !empty($data['top_degrees'])){
            $data['top_degrees'] = serialize($data['top_degrees']);
        }
        if(empty($result)){
            $data['university_id'] = $this->uid;
            $data['added_date']    = datetime();
            $lid = $this->common_model->addRecords(INTERNATIONAL,$data);
            if(!empty($lid)){
                $this->session->set_flashdata('success','Record saved successfully');
            }else{
                $this->session->set_flashdata('error','Failed please try again !!');
            }
        }else{
            $this->common_model->updateRecords(INTERNATIONAL,$data,array('university_id' => $this->uid));
            $this->session->set_flashdata('success','Record update successfully');
        }
        redirect('university/international_partnerships');
    }

    public function locations()
    {
        $data = array();
        $data['meta_title'] = 'Locations';
        $data['parent']     = 'locations';
        $data['locations']  = $this->common_model->getAllRecordsOrderById(LOCATIONS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('university/locations', $data);
    }

    public function addlocations()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('profile_type','Profile Type','trim|required');
            $this->form_validation->set_rules('campus_name','Campus Name','trim|required');
            $this->form_validation->set_rules('address','Address','trim|required');
            $this->form_validation->set_rules('city_location','City/Location','trim|required');
            $this->form_validation->set_rules('website','Website','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id'] = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(LOCATIONS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Location added successfully'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'profile_type'      => form_error('profile_type'),
                    'campus_name'       => form_error('campus_name'),
                    'address'           => form_error('address'),
                    'city_location'     => form_error('city_location'),
                    'website'           => form_error('website'),
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function deleteLocation($id)
    {
        $id = decode($id);
        if($this->common_model->deleteRecord(LOCATIONS,array('id' => $id))){
            $this->session->set_flashdata('success','Location deleted successfully');
        }else{
            $this->session->set_flashdata('error','Failed please try again !!');
        }
        redirect('university/locations');
    }

}

?>