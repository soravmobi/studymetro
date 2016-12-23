<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This Class used as REST API for user
 * @package   CodeIgniter
 * @category  Controller
 * @author    MobiwebTech Team
 */

class Api extends REST_Controller {

	function __construct() 
    {
        parent::__construct();
    }

    /**
     * Function Name: signup
     * Description:   To User Registration
     */
    function signup_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
    	$this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('user_type','Register as','trim|required|in_list[2,3,4,5,6]');
        $this->form_validation->set_rules('email','Email Id','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[14]|callback_regex_check');
        $this->form_validation->set_rules('confm_pswd','Confirm Password','trim|required|min_length[6]|max_length[14]|callback_regex_check|matches[password]');
        $this->form_validation->set_rules('device_type', 'Device Type', 'trim|required|in_list[ANDROID,IOS]');
        $this->form_validation->set_rules('device_id', 'Device ID', 'trim|required');
        $this->form_validation->set_rules('device_key', 'Device Key', 'trim|required');
    	if($this->form_validation->run() == FALSE) 
        {
        	$error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['response']         =   array(); 
            $return['message']      =   $error; 
        }
        else
        {   
            $dataArr = array();
            $dataArr['first_name']  = extract_value($data,'first_name','');
            $dataArr['last_name']   = extract_value($data,'last_name','');
            $dataArr['user_type']   = extract_value($data,'user_type','');
            $dataArr['email']       = extract_value($data,'email','');
            $dataArr['password']    = md5(extract_value($data,'password',''));
            $dataArr['device_type'] = extract_value($data,'device_type','');
            $dataArr['device_id']   = extract_value($data,'device_id','');
            $dataArr['device_key']  = extract_value($data,'device_key','');
            $dataArr['is_blocked']  = 0;
            $dataArr['is_email_verified'] = 1;
            $dataArr['username']     = $dataArr['first_name'].$dataArr['last_name'];
            if($dataArr['user_type']== 5)
            {
                $dataArr['user_status'] = 0;
            }
            else
            {
                $dataArr['user_status'] = 1;
            }
            $dataArr['date_created'] = datetime();

            /* Insert User Data Into Users Table */
            $lid = $this->common_model->addRecords(USER,$dataArr);
        	if($lid){
                /* Send verification mail to user
                $email    = $dataArr['EmailId'];
                $token    = ci_enc($email."-".$Status);
                $link     = base_url().'verify/user?email='.$email.'&token='.$token;
                $message  = "";
                $message .= "<br><br> Hello, <br/><br/>";
                $message .= "Your ".SITE_NAME." profile has been created. Please click on the link below to complete your registration. <br/><br/>";
                $message .= "<a href='".$link."'>Verify Your Email</a>  <br/><br/>";
                $message .= "Thanks, <br/><br/>";
                $message .= "The ".SITE_NAME." Team <br/>";
                $message .= "contactus@nolimit.com";
                $this->email->to($email);
                $this->email->from(FROM_EMAIL,FROM_NAME);
                $this->email->subject('['.SITE_NAME.'] Thank you for registering with us');
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();

                /* Update mail notification token 
                $this->Common_model->updateFields('users',array('TokenID' => $token),array('UserID' => $Status));
                */

                /* Return success response */
                $return['status']         =   1; 
	            $return['response']         =   array(); 
	            $return['message']      =   'User registered successfully'; 
        	}else{
                $return['status']         =   0; 
	            $return['response']         =   array(); 
	            $return['message']      =   GENERAL_ERROR;
        	}
        }
        $this->response($return);
    }

    /**
     * Function Name: regex_check
     * Description:   For Password Regular Expression
     */
    public function regex_check($str)
    {
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

    /**
     * Function Name: login
     * Description:   To User Login
     */
    function login_post()
    {
        $return['code'] =   200;
        $data = $this->input->post();
        $this->form_validation->set_rules('email','Email Id','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('device_type', 'Device Type', 'trim|required|in_list[ANDROID,IOS]');
        $this->form_validation->set_rules('device_id', 'Device ID', 'trim|required');
        $this->form_validation->set_rules('device_key', 'Device Key', 'trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['response']         =   array(); 
            $return['message']      =   $error; 
        }
        else
        {   
            $dataArr = array();
            $dataArr['email']    = extract_value($data,'email','');
            $dataArr['password'] = md5(extract_value($data,'password',''));

            /* Get User Data From Users Table */
            $Status = $this->common_model->getSingleRecordById(USER,$dataArr);
            if(empty($Status))
            {
                $return['status']         =   0; 
                $return['response']         =   array(); 
                $return['message']      =   'Invalid Email-id or Password'; 
            }
            else if(!empty($Status) && $Status['is_email_verified'] == 0){
                $return['status']         =   0; 
                $return['response']         =   array(); 
                $return['message']      =   'Currently your profile is  not verified'; 
            }
            else if(!empty($Status) && $Status['is_blocked'] == 1){
                $return['status']         =   0; 
                $return['response']         =   array(); 
                $return['message']      =   'Your profile has been blocked. Please contact to our support team'; 
            }
            else if($Status['is_email_verified'] == 1 && $Status['is_blocked'] == 0){
                /* Update User Data */
                $LoginSessionKey = get_guid();
                $UpdateData = array();
                $UpdateData['login_session_key'] = $LoginSessionKey;
                $UpdateData['device_type']       = extract_value($data,'device_type',NULL);
                $UpdateData['device_id']         = extract_value($data,'device_id',NULL);
                $UpdateData['device_key']        = extract_value($data,'device_key',NULL);
                $UpdateStatus = $this->common_model->updateRecords(USER,$UpdateData,array('id' => $Status['id']));
                if($UpdateStatus){
                    /* Return Response */
                    $response = array();
                    $response['first_name']        = null_checker($Status['first_name']);
                    $response['last_name']         = null_checker($Status['last_name']);
                    $response['email']             = null_checker($Status['email']);
                    $response['login_session_key'] = null_checker($LoginSessionKey);
                    $return['status']         =   1; 
                    $return['response']         =   $response; 
                    $return['message']      =   'User logged in successfully';
                }else{
                    $return['status']         =   0; 
                    $return['response']         =   array(); 
                    $return['message']      =   GENERAL_ERROR; 
                }
            }
        }
        $this->response($return);
    }


}

/* End of file Api.php */
/* Location: ./application/modules/api/controllers/Api.php */

?>

