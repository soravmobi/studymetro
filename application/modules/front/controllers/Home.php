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
                $data['programs'] = $this->getPrograms((isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA');
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
        $universities = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $country),16);
        return $universities;
    }

    public function getNextUniversities()
    {
        $page    = $this->input->post('page');
        $country = $this->input->post('country');
        $offset  = (int) $page * 16 - 16;
        $query   = $this->db->query(" SELECT * FROM `universities` WHERE `country` LIKE '".$country."' LIMIT 16 OFFSET  ".$offset);
        $results = $query->result_array();
        $final_arr = array();
        foreach($results as $r){
            $row['detail'] = base_url().'university/details/'.encode($r['id']);
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

    public function getPrograms($country = '')
    {
        if(empty($country)){
            $country = 'USA';
        }
        $programs = $this->common_model->getAllRecordsOrderById(PROGRAMS,'id','ASC',array('country' => $country));
        return $programs;
    }

    public function faqs($country){
        $data = array();
        $data['faqs'] = $this->common_model->getAllRecordsById(FAQS,array('country' => str_replace("%20", " ", $country)));
        $data['meta_title'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_keywords'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_description'] = 'FAQS -'.str_replace("%20", " ", $country);
        load_front_view('pages/faq_detail', $data);
    }

    public function doEnquiry(){
        $data = $this->input->post();
        $email = $data['email'];
        /*$fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'mx_Intrested_Country', 'Value' => $data['country']),
                    array('Attribute' => 'mx_City', 'Value' => $data['city']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                );
        $fields = json_encode($fields);
        $crmurl = "https://api.leadsquared.com/v2/LeadManagement.svc/Lead.CreateOrUpdate?postUpdatedLead=false&accessKey=".CRM_ACCESS_KEY."&secretKey=".CRM_SECRET_KEY;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $crmurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);*/
        $result = $this->common_model->getSingleRecordById(ENQUIRIES,array('email' => $email));
        if(!empty($result)){
            $this->common_model->updateRecords(ENQUIRIES, $data,array('email' => $email));
        }else{
            $data['added_date'] = datetime();
            $this->common_model->addRecords(ENQUIRIES, $data);
        }
        $this->session->set_flashdata('success', 'Thanks for enquiry !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }


}
?>