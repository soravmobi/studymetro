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
            if($page_name == 'university'){
                $country = (isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA';
                $data['universities'] = $this->getUniversities($country);
                $result  = $this->common_model->getTotalRecordsByCondition(UNIVERSITIES,array('country' => $country));
                $data['total_count'] = round($result/16);
            }
            if($page_name == 'search-programs'){
                $data['total_count'] = 0;
                if($this->input->get()){
                    $arr_data = $this->input->get();
                    $data['programs'] = $this->common_model->searchPrograms($arr_data);
                }else{
                    $data['programs'] = $this->getPrograms((isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA',8);
                    $result  = $this->getPrograms((isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA');
                    $data['total_count'] = round(count($result)/8);
                }
            }
            if($page_name == 'blogs'){
                $data['blogs'] = $this->common_model->getAllRecordsByOrder(BLOGS,'id','DESC');
            }
            load_front_view('pages/'.$page_name, $data);
        }else{
            redirect("/");
        }
    }

    public function getUniversities($country = '')
    {
        if(empty($country)){
            $country = 'USA';
        }
        $universities = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'studymetro_scholarship','DESC',array('country' => $country),16);
        return $universities;
    }

    public function getCountryUniversities()
    {
        $country = $this->input->post('country');
        $result  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $country));
        echo json_encode($result);
    }

    public function getNextUniversities()
    {
        $page    = $this->input->post('page');
        $country = $this->input->post('country');
        $offset  = (int) $page * 16 - 16;
        $query   = $this->db->query(" SELECT * FROM ".UNIVERSITIES." WHERE `country` LIKE '".$country."' LIMIT 16 OFFSET  ".$offset);
        $results = $query->result_array();
        $final_arr = array();
        foreach($results as $r){
            $row['detail'] = getUniversityUrl($r['id'],$r['name']);
            $row['country_flag'] = base_url().'assets/images/'.getCountryFlag($r['country']);
            $row['logo'] = (!empty($r['logo'])) ? $r['logo'] : base_url().'assets/images/not-available.jpg';
            $row['name'] = $r['name'];
            $row['location'] = $r['location'];
            $row['country'] = $r['country'];
            $row['estimated_cost'] = $r['estimated_cost'];
            array_push($final_arr, $row);
        }
        echo json_encode($final_arr);
    }

    public function getPrograms($country = '',$limit='',$offset='')
    {
        if(empty($country)){
            $country = 'USA';
        }
        $query   = $this->db->query(" SELECT `university_id` FROM ".PROGRAMS." WHERE `country` LIKE '".$country."' GROUP BY `university_id` ");
        $results = $query->result_array();
        $university_ids = array_column($results, 'university_id');
        if(!empty($university_ids)){
            $limit_cond = '';
            if(!empty($limit)){
                $limit_cond = 'LIMIT '.$limit;
            }
            $offset_cond = '';
            if(!empty($offset)){
                $offset_cond = 'OFFSET '.$offset;
            }
            $query1   = $this->db->query(" SELECT `name`,`logo`,`location`,`country`,`founded`,`studymetro_scholarship`,`institution`,`estimated_cost`,`tution_fee`,`id` AS `univ_id` FROM ".UNIVERSITIES." WHERE `country` LIKE '".$country."' AND `id` IN (".implode(",", $university_ids).") ORDER BY `studymetro_scholarship` DESC ".$limit_cond." ".$offset_cond);
            $results1 = $query1->result_array();
            return $results1;
        }else{
            return array();
        }
    }

    public function getNextPrograms()
    {
        $page    = $this->input->post('page');
        $country = $this->input->post('country');
        $offset  = (int) $page * 8 - 8;
        $results = $this->getPrograms($country,8,$offset);
        $final_arr = array();
        if(!empty($results)){
            foreach($results as $r){
                $row['detail'] = getUniversityUrl($r['univ_id'],$r['name']);
                $row['logo'] = (!empty($r['logo'])) ? $r['logo'] : base_url().'assets/images/not-available.jpg';
                $row['name'] = $r['name'];
                $row['id'] = $r['univ_id'];
                $row['location'] = $r['location'];
                $row['country']  = $r['country'];
                $row['founded'] = $r['founded'];
                $row['institution'] = $r['institution'];
                $row['estimated_cost'] = $r['estimated_cost'];
                $row['tution_fee'] = $r['tution_fee'];
                $row['programs'] = getProgramsBy('university_id',$r['univ_id']);
                array_push($final_arr, $row);
            }
        }
        echo json_encode(array('universities' => $final_arr, 'courses' => getCourseTypes()));
    }

    public function faqs($country){
        $data = array();
        $data['faqs'] = $this->common_model->getAllRecordsById(FAQS,array('country' => str_replace("%20", " ", $country)));
        $data['meta_title'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_keywords'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_description'] = 'FAQS -'.str_replace("%20", " ", $country);
        load_front_view('pages/faq_detail', $data);
    }

    public function contactus(){
        $data = array();
        $data['meta_title'] = 'Contact US';
        load_front_view('pages/contact-us', $data);
    }

    public function doEnquiry(){
        $data = $this->input->post();
        $email = $data['email'];
        $fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'mx_Country', 'Value' => $data['country']),
                    array('Attribute' => 'mx_City', 'Value' => $data['city']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                    array('Attribute' => 'SearchBy', 'Value' => 'EmailAddress'),
                );
        feedCRMDetails($fields);
        $this->session->set_flashdata('success', 'Thanks for enquiry !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }

    public function doSummerProgramEnquiry(){
        $data = $this->input->post();
        $fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'mx_City', 'Value' => $data['city']),
                    array('Attribute' => 'SkypeId', 'Value' => $data['SkypeId']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                    array('Attribute' => 'SearchBy', 'Value' => 'EmailAddress'),
                );
        feedCRMDetails($fields);
        $this->session->set_flashdata('success', 'Thanks for enquiry !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }

    public function docontactus(){
        $data = $this->input->post();
        $fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                    array('Attribute' => 'SearchBy', 'Value' => 'EmailAddress'),
                );
        feedCRMDetails($fields);
        $this->session->set_flashdata('success', 'Thanks for contact us !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }


}
?>