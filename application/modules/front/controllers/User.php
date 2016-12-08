<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->uid = $this->session->userdata("user_id");
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function logout()
	{
        checkUserSession(array('2','3','4','5','6'));
		$this->session->sess_destroy();
		delete_cookie("study_metro");
		redirect('/');
	}

    public function callback_pswd_check($pswd)
    {
        checkUserSession(array('2','3','4','5','6'));
        $where  = array('id' => $this->uid, 'password' => md5($pswd));
        $result = $this->common_model->getSingleRecordById('users',$where);
        if(empty($result)){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function regex_check($str)
    {
        checkUserSession(array('2','3','4','5','6'));
        if (1 !== preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $str))
        {
            $this->form_validation->set_message('regex_check', 'Password must contain at least 6 characters, including UPPER/lower case & numbers');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function doChangePassword()
    {
        checkUserSession(array('2','3','4','5','6'));
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('current_password','Current Password','trim|required');
            $this->form_validation->set_rules('new_password','New Password','trim|required|min_length[6]|max_length[14]|callback_regex_check');
            $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[6]|max_length[14]|matches[new_password]|callback_regex_check');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                if($this->callback_pswd_check($data['current_password'])){
                    $updateArr = array(
                        'password' => md5($data['new_password']),
                    );
                    if($this->common_model->updateRecords('users',$updateArr,array('id' => $this->uid))){
                        echo json_encode(array('type' => 'success', 'msg' => 'Password successfully changed !'));exit;
                    }else{
                        echo json_encode(array('type' => 'failed', 'msg' => 'You didn`t have any changes !'));exit;
                    }
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => 'Wrong curret password !'));exit;
                }
            }else{
                $error = array(
                    'current_password' => form_error('current_password'),
                    'new_password'     => form_error('new_password'),
                    'confirm_password' => form_error('confirm_password')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function profile() {
        checkUserSession(array('2','3','4','5','6'));
        $data = array();
        $data['meta_title'] = 'My Profile';
        $data['parent'] = 'profile';
        $data['detail'] = $this->common_model->getAllRecordsById(USER,array('id' => $this->uid));
        load_front_view('profile', $data);
    }

    public function updateProfileImage()
    {
        if($this->input->is_ajax_request())
        {
            checkUserSession(array('2','3','4','5','6'));
            $imgArr = imgUpload('userfile','users','gif|jpg|png|jpeg');
            if(isset($imgArr['error'])){
                echo json_encode(array('type' => 'error', 'msg' => $imgArr['error']));die;
            }else if(isset($imgArr['upload_data'])){
                if($this->common_model->updateRecords('users',array('photo' => $imgArr['upload_data']['file_name']),array('id' => $this->uid))){
                    echo json_encode(array('type' => 'success', 'msg' => 'Profile image successfully uploaded !','path' => base_url().'uploads/users/'.$imgArr['upload_data']['file_name']));die;
                }else{
                    echo json_encode(array('type' => 'error', 'msg' => 'Image uploading failed !'));die;
                }
            }else{
                echo json_encode(array('type' => 'error', 'msg' => 'Image uploading failed !'));die;
            }
        }else{
            show_404();
        }
    }

    public function updateProfile()
    {
        checkUserSession(array('2','3','4','5','6'));
        $data = $this->input->post();
        $this->common_model->updateRecords('users',$data,array('id' => $this->uid));
        $this->session->set_flashdata('success','Profile successfully updated !');
        redirect('user/profile');
    }

    public function applytoprogram($pid)
    {
       if(!in_array($_GET['type'], array('0','1'))){
        redirect('/');
       }
        checkUserSession(array('2'));
        $data = array();
        $data['meta_title'] = 'Apply to Program';
        $data['program_id'] = $pid;
        if($_GET['type'] == 0){
            $data['detail'] = $this->common_model->getSingleRecordById(PROGRAMS,array('id' => $pid));
        }else{
            $data['detail'] = $this->common_model->getSingleRecordById(SUMMER_PROGRAMS,array('id' => $pid));
        }
        if(empty($data['detail'])){
            redirect('search-programs');
        }
        $conditions = array('user_id' => $this->uid, 'program_id' => $pid);
        $results = $this->common_model->getAllRecordsById(APPLIED_PROGRAMS,$conditions);
        if(!empty($results)){
            $this->session->set_flashdata('error','You already applied to this program !!');
            redirect('search-programs');
        }
        load_front_view('user/applytoprogram', $data);
    }

    public function dashboard()
    {
        checkUserSession(array('2','3','4','5','6'));
        $data = array();
        $data['meta_title'] = 'Dashboard';
        $data['parent'] = 'dashboard';
        $data['detail'] = $this->common_model->getAllRecordsById('users',array('id' => $this->uid));
        load_front_view('user/dashboard', $data);
    }

    public function feedback()
    {
        checkUserSession(array('2','5'));
        $data = array();
        $data['meta_title'] = 'Feedback';
        $data['parent'] = 'feedback';
        load_front_view('user/feedback', $data);
    }

    public function submitFeedback()
    {
        checkUserSession(array('2','5'));
        $data = $this->input->post();
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','Phone','required|numeric');
        $this->form_validation->set_rules('suggestion','Suggestion','required');
        if($this->form_validation->run()==TRUE){
            $data['added_date'] = datetime();
            $lid = $this->common_model->addRecords(FEEDBACKS,$data);
            if(!empty($lid)){
                $message  = "";
                $message .= "<img style='width:90px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
                $message .= "<br><br> Hello, <br/><br/>";
                $message .= $data['name']."  has provided a feedback, please follow below details.<br/><br/>";
                $message .= '<html><head><title>Feedback</title></head><body><p>User Details</p><ul>';
                $message .= '<li><b>Name:</b> '.$data['name'].'</li>';
                $message .= '<li><b>Email:</b> '.$data['email'].'</li>';
                $message .= '<li><b>Phone:</b> '.$data['phone'].'</li>';
                $message .= '<li><b>Suggestion:</b> '.$data['suggestion'].'</li>';
                $message .= '</ul></body></html>';
                send_mail($message,'New Feedback',SUPPORT_EMAIL,$data['email']);
                $this->session->set_flashdata('success','Thanks for your valuable feedback !!');
                redirect('user/feedback');
            }else{
                $this->session->set_flashdata('error', 'Failed please try again !!');
                redirect('user/feedback');
            }
        }else{
            $data['meta_title'] = 'feedback';
            $data['parent'] = 'feedback';
            load_front_view('user/feedback', $data);
        }
    }

    public function upload_documents() {
        checkUserSession(array('2','3'));
        $data = array();
        $data['meta_title'] = 'Upload Documents';
        $data['parent']     = 'upload_documents';
        $data['documents']  = $this->common_model->getAllRecordsOrderById(DOCUMENTS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('user/upload_documents', $data);
    }

    public function doUploadDocuments(){
        checkUserSession(array('2','3'));
        $data = $this->input->post();
        $this->form_validation->set_rules('document','Document','required');
        if (empty($_FILES['file']['name']))
        {
            $this->form_validation->set_rules('file', 'Document File', 'required');
        }
        if($this->form_validation->run()==TRUE){
        if(!empty($_FILES['file']['name'])){
            $document = imgUpload('file','documents','png|jpg|tif|gif');
            if(isset($document['error'])){
                $this->session->set_flashdata('error', $document['error']);
                $data['meta_title'] = 'Upload Documents';
                $data['parent']     = 'upload_documents';
                load_front_view('user/upload_documents', $data);
            }else{
                $data['file'] = base_url().'uploads/documents/'.$document['upload_data']['file_name'];
                $data['user_id'] = $this->uid;
                $data['added_date'] = datetime();
                $this->common_model->addRecords(DOCUMENTS, $data);
                $this->session->set_flashdata('success', sprintf(ITEM_ADD_SUCCESS, 'Documents'));
                redirect('user/upload_documents');
            }
        }else{
            $this->session->set_flashdata('error', 'Please select image file !!');
            $data['meta_title'] = 'Upload Documents';
            $data['parent']     = 'upload_documents';
            load_front_view('user/upload_documents', $data);
        }
        }else{
            $data['meta_title'] = 'Upload Documents';
            $data['parent']     = 'upload_documents';
            load_front_view('user/upload_documents', $data);
        }
    }

    public function deleteDocument($id) {
        checkUserSession(array('2','3'));
        $id = decode($id);
        if($id) {
            $this->common_model->deleteRecords(DOCUMENTS, 'id', $id);
            $this->session->set_flashdata('success', sprintf(ITEM_DELETE_SUCCESS, 'Document'));
            redirect('user/upload_documents');
        } else {
            $this->session->set_flashdata('error', INVALID_ITEM);
            redirect('user/upload_documents');
        }
    }

    public function notes()
    {
        checkUserSession(array('2','3'));
        $data = array();
        $data['meta_title'] = 'Notes';
        $data['parent']     = 'notes';
        $data['notes']  = $this->common_model->getAllRecordsOrderById(NOTES,'id','DESC',array('user_id' => $this->uid));
        load_front_view('user/notes', $data);
    }

    public function notesmgmt()
    {
        checkUserSession(array('2','3'));
        $data = $this->input->post();
        $this->form_validation->set_rules('notes','Note','trim|required');
        if($this->form_validation->run()==TRUE){
            $data['user_id'] = $this->uid;
            $data['added_date'] = datetime();
            unset($data['id']);
            $lid = $this->common_model->addRecords(NOTES,$data);
            if(!empty($lid)){
                $this->session->set_flashdata('success','Note successfully added');
                redirect('user/notes');
            }else{
                $this->session->set_flashdata('error', 'Failed please try again !!');
                redirect('user/notes');
            }
        }else{
            $data['meta_title'] = 'Notes';
            $data['parent']     = 'notes';
            $data['notes']  = $this->common_model->getAllRecordsOrderById(NOTES,'id','DESC',array('user_id' => $this->uid));
            load_front_view('user/notes', $data);
        }
    }

    public function deletenotes($id)
    {
        checkUserSession(array('2','3'));
        $id = decode($id);
        if($id) {
            $this->common_model->deleteRecords(NOTES, 'id', $id);
            $this->session->set_flashdata('success', sprintf(ITEM_DELETE_SUCCESS, 'Note'));
            redirect('user/notes');
        } else {
            $this->session->set_flashdata('error', INVALID_ITEM);
            redirect('user/notes');
        }
    }

    public function emails()
    {
        checkUserSession(array('2','3','4','5','6'));
        $data = array();
        $data['meta_title']  = 'Emails';
        $data['parent']      = 'emails';
        $data['inbox_email']  = $this->common_model->getAllRecordsOrderById(EMAILS,'id','DESC',array('to_email' => $this->session->userdata('email')));
        $data['sent_email']  = $this->common_model->getAllRecordsOrderById(EMAILS,'id','DESC',array('from_email' => $this->session->userdata('email')));
        load_front_view('user/emails', $data);
    }

    public function sendemail()
    {
        checkUserSession(array('2','3','4','5','6'));
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('to_email','To Email','trim|required|valid_email');
            $this->form_validation->set_rules('subject','Subject','trim|required');
            $this->form_validation->set_rules('message','Message','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $html = '';
                $msgArr = explode(PHP_EOL, $data['message']);
                foreach($msgArr as $m){
                    if(!empty($m)){
                        $html .= $m;
                    }else{
                        $html .= '<div class="m-msz-text">'.$m.'</div>';
                    }
                }
                $data['message'] = $html;
                $result = $this->common_model->getSingleRecordById(USER,array('email' => $data['to_email']));
                if(empty($result)){
                    echo json_encode(array('type' => 'failed', 'msg' => 'We could not find the user '.$data['to_email']));exit;
                }
                $data['from_email'] = $this->session->userdata('email');
                $data['added_date'] = datetime();

                /* Upload attachment */
                $attachment = '';
                // if(!empty($_FILES['attachment']['name'])) {
                //     $config['file_name']     = time().$_FILES['attachment']['name'];
                //     $config['upload_path']   = './uploads/email_attachments';
                //     $config['allowed_types'] = 'jpg|png|jpeg';
                //     $config['max_size']      = '2474898';
                //     $config['max_width']     = '100024';
                //     $config['max_height']    = '768000';
                //     $config['remove_spaces'] = true;
                //     $config['field_name']     = 'attachment';

                //     $imageData = upload_file($_FILES['attachment'], $config);
                //     if(isset($imageData) && $imageData['message'] == 'success') {
                //        $attachment = $imageData['file_path'];
                //     }
                // } else {
                //     $attachment = '';
                // }

                     $config['file_name'] = $_FILES['attachment']['name']; 
                     $config['upload_path'] ='uploads/email_attachments/'; 
                     $config['allowed_types'] = 'png|jpeg|jpg';
                     $config['max_size']      = '10000000';
                     $config['max_width']     = '100024';
                     $config['max_height']    = '768000';
                     $config['remove_spaces'] = true;
                     $config['encrypt_name'] = TRUE;
                     $this->load->library('upload', $config);
                     $this->upload->initialize($config);
                     $this->upload->set_allowed_types('*');
                     $upload_data['upload_data'] = '';
                     $attachment = '';
               
                  if (!$this->upload->do_upload('attachment'))
                   {
                       $upload_data = array('msg' => $this->upload->display_errors());
                   } 
                  else 
                      { 
                        $upload_data = array('msg' => "Upload success!");
                        
                        $upload_data['upload_data'] = $this->upload->data();
                        //print_r($data['upload_data']['file_name']); die;
                        $attachment = 'uploads/email_attachments/'.$upload_data['upload_data']['file_name'];
                        //echo $attachment; die;
                        $data['attachment'] = $attachment;
                      }
                
                $lid = $this->common_model->addRecords(EMAILS,$data);
                if(!empty($lid)){
                    send_mail($data['message'],$data['subject'],$data['to_email'],$data['from_email']);
                    echo json_encode(array('type' => 'success', 'msg' => 'Email send successfully'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'to_email' => form_error('to_email'),
                    'subject'  => form_error('subject'),
                    'message'  => form_error('message')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function getmail()
    {
        checkUserSession(array('2','3','4','5','6'));
        if($this->input->is_ajax_request())
        {
            $id   = decode($this->input->post('mail'));
            $type = $this->input->post('type');
            $result = $this->common_model->getSingleRecordById(EMAILS,array('id' => $id));
            if(!empty($result)){
                if($type == 'inbox'){
                    $user_details = getUserDetailsBy('email',$result['from_email']);
                }else{
                    $user_details = getUserDetailsBy('email',$result['to_email']);
                }
                if(empty($user_details[0]['photo'])){
                  $file = base_url().'uploads/users/default.jpg';
                }else{
                  $file = base_url().'uploads/users/'.$user_details[0]['photo'];
                }
                echo json_encode(array('type' => 'success', 'mail' => $result, 'username' => $user_details[0]['first_name']." ".$user_details[0]['last_name'],'userimg' => $file,'datetime' => date('d M, Y',strtotime($result['added_date']))));exit;
            }else{
                echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
            }
        }
    }

    public function myvideos()
    {
        checkUserSession(array('5','6'));
        $data = array();
        $data['meta_title'] = 'My Videos';
        $data['parent']     = 'myvideos';
        $data['videos']     = $this->common_model->getAllRecordsOrderById(MY_VIDEOS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('user/myvideos', $data);
    }

    public function regex_url_check($url)
    {
        checkUserSession(array('5','6'));
        if (1 !== preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url))
        {
            $this->form_validation->set_message('live_video_url', 'Please Enter Valid Youtube Video URL');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function uploadVideo()
    {
        checkUserSession(array('5','6'));
        if($this->input->is_ajax_request())
        {
            $this->load->helper('security');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('live_video_url','Video URL','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id'] = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(MY_VIDEOS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Video added successfully'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'title'      => form_error('title'),
                    'live_video_url'  => form_error('live_video_url'),
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function deleteVideo($id)
    {
        $id = decode($id);
        if($this->common_model->deleteRecord(MY_VIDEOS,array('id' => $id))){
            $this->session->set_flashdata('success','Video deleted successfully');
        }else{
            $this->session->set_flashdata('error','Failed please try again !!');
        }
        redirect('user/my-videos');
    }

    public function submitApplyProgramForm()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('first_name','First Name','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('phone_no','Phone No','trim|required');
            $this->form_validation->set_rules('address_1','Address 1','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $conditions = array('user_id' => $this->uid, 'program_id' => $data['program_id']);
                $results = $this->common_model->getAllRecordsById(APPLIED_PROGRAMS,$conditions);
                if(!empty($results)){
                    echo json_encode(array('type' => 'failed', 'msg' => 'You already applied of this program'));exit;
                }
                $data['user_id']    = $this->uid;
                $data['apply_date'] = datetime();
                if(!empty($_FILES['education_documents']['name'])){
                    $data['education_documents'] = fileUploading('education_documents','programs');
                }
                if(!empty($_FILES['passport_resume']['name'])){
                    $data['passport_resume'] = fileUploading('passport_resume','programs');
                }
                if(!empty($_FILES['test_score']['name'])){
                    $data['test_score'] = fileUploading('test_score','programs');
                }
                if(!empty($_FILES['sop_lor']['name'])){
                    $data['sop_lor'] = fileUploading('sop_lor','programs');
                }
                if(!empty($_FILES['finance_documents']['name'])){
                    $data['finance_documents'] = fileUploading('finance_documents','programs');
                }
                $lid = $this->common_model->addRecords(APPLIED_PROGRAMS,$data);
                if(!empty($lid)){
                    $fields = array(
                        array('Attribute' => 'FirstName', 'Value' => $data['first_name']),
                        array('Attribute' => 'LastName', 'Value' => $data['last_name']),
                        array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                        array('Attribute' => 'Phone', 'Value' => $data['phone_no']),
                        array('Attribute' => 'SkypeId', 'Value' => $data['skype_id']),
                        array('Attribute' => 'mx_Gender', 'Value' => $data['gender']),
                        array('Attribute' => 'mx_Secondary_Email', 'Value' => $data['secondary_email']),
                        array('Attribute' => 'mx_Date_Of_Birth', 'Value' => $data['dob']),
                        array('Attribute' => 'mx_Marital_Status', 'Value' => $data['marital_status']),
                        array('Attribute' => 'mx_Birth_Country', 'Value' => $data['birth_country']),
                        array('Attribute' => 'mx_Birth_Place', 'Value' => $data['birth_place']),
                        array('Attribute' => 'mx_Nationality', 'Value' => $data['nationality']),
                        array('Attribute' => 'mx_Occupation', 'Value' => $data['occupation']),
                        array('Attribute' => 'mx_Passport_Number', 'Value' => $data['passport_number']),
                        array('Attribute' => 'mx_Passport_Issue_Date', 'Value' => $data['passport_issue_date']),
                        array('Attribute' => 'mx_Passport_Location', 'Value' => $data['passport_location']),
                        array('Attribute' => 'mx_Passport_Expire_Date', 'Value' => $data['passport_expiry_date']),
                        array('Attribute' => 'mx_Street1', 'Value' => $data['address_1']),
                        array('Attribute' => 'mx_Street2', 'Value' => $data['address_2']),
                        array('Attribute' => 'mx_Postal_Code', 'Value' => $data['postal_code']),
                        array('Attribute' => 'mx_WhatsApp_Number', 'Value' => $data['whatsapp_number']),
                        array('Attribute' => 'mx_Country', 'Value' => $data['country']),
                        array('Attribute' => 'mx_State', 'Value' => $data['state']),
                        array('Attribute' => 'mx_City', 'Value' => $data['city']),
                        array('Attribute' => 'mx_Emergency_Person_Name', 'Value' => $data['emergency_contact_person_name']),
                        array('Attribute' => 'mx_Emergency_Contact_Person_Number', 'Value' => $data['emergency_contact_person_no']),
                        array('Attribute' => 'mx_Relationship', 'Value' => $data['relationship']),
                        array('Attribute' => 'mx_Last_Education_Level', 'Value' => $data['schooling']),
                        array('Attribute' => 'mx_Last_School_College_University_Name', 'Value' => $data['last_school']),
                        array('Attribute' => 'mx_Program_of_Interest', 'Value' => $data['program_of_interest']),
                        array('Attribute' => 'mx_Tests', 'Value' => $data['technical_tests']),
                        array('Attribute' => 'mx_Technical_Test_Date_Taken_Will_be_Taken', 'Value' => $data['technical_test_taken_date']),
                        array('Attribute' => 'mx_English_Test', 'Value' => $data['english_test']),
                        array('Attribute' => 'mx_English_Test_Date_Taken_Will_be_Taken', 'Value' => $data['english_test_taken_date']),
                        array('Attribute' => 'mx_Work_History_Experience', 'Value' => $data['history_experience']),
                        array('Attribute' => 'mx_Position_Held', 'Value' => $data['position_held']),
                        array('Attribute' => 'mx_Organization_Name', 'Value' => $data['organization_name']),
                        array('Attribute' => 'mx_Heard_Us_From', 'Value' => $data['hear_about_us']),
                        array('Attribute' => 'mx_Is_an_education_counsellor_helping_you', 'Value' => $data['education_counsellor']),
                    );
                    feedCRMDetails($fields);
                    echo json_encode(array('type' => 'success','id' => encode($lid)));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'first_name'=> form_error('first_name'),
                    'email'     => form_error('email'),
                    'phone_no'  => form_error('phone_no'),
                    'address_1' => form_error('address_1')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function paypal_success()
    {
        if(!empty($_GET)){
            $data               = array();
            $data['amount']     = $_GET['amt'];
            $data['pay_type']   = 0;
            $data['txn_id']     = $_GET['tx'];
            $data['pay_status'] = $_GET['st'];
            $data['paymnet_date'] = datetime();
            $status = $this->common_model->updateRecords(APPLIED_PROGRAMS,$data,array('id' => decode($_GET['cm'])));
            if($_GET['st'] == 'Completed' && $status == TRUE){

                $this->sendEmailToAdmin('Payment successfully completed','payment',SUPPORT_EMAIL);

                $this->session->set_flashdata('success','Payment successfully completed');
            }else{
                $this->session->set_flashdata('error','Failed please try again !!');
            }
        }else{
            $this->session->set_flashdata('error','Failed please try again !!');
        }
        redirect('student/my-applications');
    }

    public function cancel_payment()
    {
        $this->session->set_flashdata('error','Paymnet cancelled !!');
        redirect('search-programs');
    }

    public function citrus_notify()
    {
        mail('sorav.mobiwebtech123@gmail.com', 'Citrus Pay Notification', json_encode($_POST));
    }

    public function citrus_return()
    {
        if(!empty($_POST) && !empty($_GET['id'])){
            $data               = array();
            $data['amount']     = $_POST['amount'];
            $data['pay_type']   = 1;
            $data['txn_id']     = $_POST['TxId'];
            $data['pay_status'] = $_POST['TxStatus'];
            $data['paymnet_date'] = datetime();
            $status = $this->common_model->updateRecords(APPLIED_PROGRAMS,$data,array('id' => decode($_GET['id'])));
            if($_POST['TxStatus'] == 'SUCCESS' && $status == TRUE){
                
                $this->sendEmailToAdmin('Payment successfully completed','payment',SUPPORT_EMAIL);

                $this->session->set_flashdata('success','Payment successfully completed');
                redirect('student/my-applications');
            }else{
                $this->session->set_flashdata('error','Payment failed please try again !!');
                redirect('search-programs');
            }
        }else{
            $this->session->set_flashdata('error','Payment failed please try again !!');
            redirect('search-programs');
        }
    }

    public function my_comments()
    {
        checkUserSession(array('2','4','5','6'));
        $data = array();
        $data['meta_title']     = 'My Comments';
        $data['parent']         = 'my_comments';
        
        $where = array('to_user_id' =>$this->uid);
        $or_where = array('from_user_id' =>$this->uid);
        $data['comments']  = $this->common_model->getComments(COMMENTS,'id','ASC',$where,$or_where);
        load_front_view('student/my_comments', $data);
    }

    public function view_portfolio()
    {
        $data = array();
        $data['meta_title'] = 'E-portfolio';
        $data['parent'] = 'portfolio';
        //echo $_GET['id'];die;
        $user_id = decode($_GET['id']);
        $data['certifications'] = $this->common_model->getAllRecordsOrderById(CERTIFICATIONS,'id','DESC',array('user_id' => $user_id));
        $data['education']      = $this->common_model->getAllRecordsOrderById(EDUCATION,'id','DESC',array('user_id' => $user_id));
        $data['interests']      = $this->common_model->getAllRecordsOrderById(INTERESTS,'id','DESC',array('user_id' => $user_id));
        $data['volunteers']     = $this->common_model->getAllRecordsOrderById(VOLUNTEERS,'id','DESC',array('user_id' => $user_id));
        $data['username']     = $this->common_model->getSingleRecordById(USER,array('id' => $user_id));

        load_front_view('student/social_icon_portfolio', $data);
    }

    public function my_events()
    {
        $data = array();
        $data['meta_title'] = 'My Events';
        $data['parent'] = 'my-events';
        
        //$data['events'] = $this->common_model->getAllRecords(EVENTS);
        load_front_view('user/my_events', $data);
    }

    public function favorite_programs()
    {
        $user_id = $this->uid;
        $data['programs'] = $this->common_model->getAllRecordsBySingleJoin(FAVORITE_PROGRAMS,'program_id',PROGRAMS,'id',$user_id);
        load_front_view('pages/favorite_programs', $data);
    }

    public function add_favorite_programs()
    {
        $user_id = $this->uid;
        $fvrtArray = array('user_id'=>$user_id,'program_id'=>$_POST['program_id']);
        
        $getFvrtData = $this->common_model->getAllRecordsById(FAVORITE_PROGRAMS,$fvrtArray);
        if(empty($getFvrtData))
        {
            $fvrtArray['added_date'] = date('Y-m-d');
            $request = $this->common_model->addRecords(FAVORITE_PROGRAMS,$fvrtArray);
            if($request)
            {
                echo json_encode(array('type' => 'success', 'msg' => 'Program added successfully in your favorite list'));
            }
        }
        else
        {
            echo json_encode(array('type' => 'error', 'msg' => 'This Program is already exist in your favorite list'));
            exit;
        }
    }

    public function Remove_favorite_programs()
    {
        $user_id = $this->uid;
        $fvrtArray = array('user_id'=>$user_id,'program_id'=>$_POST['program_id']);
        
        $request = $this->common_model->deleteRecord(FAVORITE_PROGRAMS,$fvrtArray);
        if($request)
        {
            echo json_encode(array('type' => 'success', 'msg' => 'Program remove successfully from your favorite list'));
        }
        // else
        // {
        //     echo json_encode(array('type' => 'error', 'msg' => 'This Program is already exist in your favorite list'));
        //     exit;
        // }
    }



}
?>