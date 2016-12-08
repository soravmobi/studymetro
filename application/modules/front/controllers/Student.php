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
        $data['subunique']= base_url().'user/view-portfolio?id='.encode($this->session->userdata('user_id'));
        $data['certifications'] = $this->common_model->getAllRecordsOrderById(CERTIFICATIONS,'id','DESC',array('user_id' => $this->uid));
        $data['education']      = $this->common_model->getAllRecordsOrderById(EDUCATION,'id','DESC',array('user_id' => $this->uid));
        $data['interests']      = $this->common_model->getAllRecordsOrderById(INTERESTS,'id','DESC',array('user_id' => $this->uid));
        $data['volunteers']     = $this->common_model->getAllRecordsOrderById(VOLUNTEERS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('student/portfolio', $data);
    }

    public function my_applications()
    {
        $data = array();
        $data['meta_title']     = 'My Applications';
        $data['parent']         = 'my_applications';
        $data['applications']   = $this->common_model->getAllRecordsOrderById(APPLIED_PROGRAMS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('student/my_applications', $data);
    }


    public function add_comment()
    {
        $from_id = $this->uid;
        $to_id = ADMIN_ID;

        $this->form_validation->set_rules('comment_text','Message','required');
        if($this->form_validation->run()==true)
        {
            $message = $_POST['comment_text'];
            $insertData = array('message'=>$message,'from_user_id'=>$from_id,'to_user_id'=>$to_id,'comment_date'=>date('Y-m-d'));

            $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$to_id));
            $user_email = $userEmail['email'];

            $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$from_id));
            $from_email = $userEmail['email'];

            $this->sendEmailToAdmin('User send a comment to you','Comment',$user_email,$from_email);

            $request=$this->common_model->addRecords(COMMENTS,$insertData);
            if($request)
            {
                $this->session->set_flashdata('success', "Comment added succefully");
                redirect('user/my-comments');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add Comment.");
                redirect('user/my-comments');
            }
        }
        else
        {
            $data = array();
            $data['meta_title']     = 'My Comments';
            $data['parent']         = 'my_comments';
            
            $where = array('to_user_id' =>$this->uid);
            $or_where = array('from_user_id' =>$this->uid);
            $data['comments']  = $this->common_model->getComments(COMMENTS,'id','ASC',$where,$or_where);
            load_front_view('student/my_comments', $data);
        }
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

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function set_interview_date()
    {
        $user_id = $_POST['user_id'];
        $prgrm_id = $_POST['prgrm_id'];
        $status = $_POST['interview_date'];

        $updateData = array('interview_date'=>$status);
        $where = array('id'=>$prgrm_id);
        $request = $this->common_model->updateRecords('applied_programs',$updateData,$where);

        $to_id = ADMIN_ID;
        $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$to_id));
        $user_email = $userEmail['email'];

        $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
        $from_email = $userEmail['email'];
        $from_user_name = $userEmail['first_name'].' '.$userEmail['last_name'];
        
        $this->sendEmailToAdmin('Program interview date set on"'.$status.'" by "'.$from_user_name.'"','Program Interview Date',$user_email,$from_email);

        if($request==1)
        {
            echo json_encode(array('type' => 'success', 'msg' => 'Interview Date set successfully'));
        }
        else
        {
            echo json_encode(array('type' => 'error', 'msg' => 'Unable to set interview Date'));
        }
    }

    public function my_assignments()
    {
        $user_id = $this->uid;
        $to_id = ADMIN_ID;

        $count = count($_POST);
        for($i=1;$i<=$count;$i++)
        {
            $this->form_validation->set_rules('answer_'.$i.'','Answer','required'); 
        }
        
        if($this->form_validation->run()==false)
        {   
            //print_r($_POST); die;
            $data = array();
            $data['meta_title']     = 'My Assignments';
            $data['parent']         = 'my_assignments';
            
            $data['questions'] = $this->common_model->getAllRecords(QUESTIONS);
            load_front_view('student/my_assignments', $data);
        }
        else
        { 
            $answerData = array_filter($_POST); 
            //print_r($answerData); die;

            foreach ($answerData as $key => $value)
            {
               $ques_id = explode('_',$key);

               $insertData = array('user_id'=>$user_id,'question_id'=>$ques_id[1],'answer'=>$value,'added_date'=>date('Y-m-d'));

               $request=$this->common_model->addRecords(ANSWERS,$insertData);
            }

            // $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$to_id));
            // $user_email = $userEmail['email'];

            $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
            $from_email = $userEmail['email'];
            $from_user_name = $userEmail['first_name'].' '.$userEmail['last_name'];
            
            $this->sendEmailToAdmin('Answers submitted by "'.$from_user_name.'"','Assignments',VISA_EMAIL,$from_email);

            if($request!='')
            {
                $this->session->set_flashdata('success', "Answers submitted successfully.");
                redirect('student/my-assignments');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to submit answers.");
                redirect('student/my-assignments');
            }
        }
    }
    
    
}

?>