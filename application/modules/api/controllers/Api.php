<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends REST_Controller {

	public function __construct() {
		header('Access-Control-Allow-Origin: *');
        parent::__construct();
    }

    public function login_post(){
        /* Check for required value */
        $data = $this->input->post();
        $required_parameter = array('email', 'password');
        $chk_error = check_required_value($required_parameter, $data);
        if ($chk_error) {
             $resp = array('code' => MISSING_PARAM, 'message' => 'YOU_HAVE_MISSED_A_PARAMETER_' . strtoupper($chk_error['param']));
             $this->response($resp);
        }
        $password = md5($data['password']);
        $where    = array('password' => $password,'email' => $data['email']);
        $result   = $this->common_model->getSingleRecordById('users',$where);
        if(empty($result)){
            $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' => 'This user is not exists in our system'));
            $this->response($resp);
        }else{
            if($result['is_email_verified'] == 0){
                $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' => 'This user email id has not verified'));
                $this->response($resp);
            }else if($result['user_status'] == 0){
                $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' =>'Currently this account is disabled'));
                $this->response($resp);
            }
            $resp = array('code' => SUCCESS, 'message' => SUCCESS_MSG, 'response' => array('user_type' => $result['user_type'],'user_type_name' =>get_user_type_name($result['user_type']),'first_name' => $result['first_name'],'last_name' => $result['last_name'],'username' => $result['username'],'email' => $result['email']));
            $this->response($resp);
        }
    }

    public function signup_post(){
        $data = $this->input->post();
        $required_parameter = array('first_name', 'last_name','email','password','user_type');
        $chk_error = check_required_value($required_parameter, $data);
        if ($chk_error) {
             $resp = array('code' => MISSING_PARAM, 'message' => 'YOU_HAVE_MISSED_A_PARAMETER_' . strtoupper($chk_error['param']));
             $this->response($resp);
        }

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' =>'Invalid email-id'));
            $this->response($resp);
        }

        if (1 !== preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $data['password']))
        {
            $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' =>'Password must contain at least 6 characters, including UPPER/lower case & numbers'));
            $this->response($resp);
        }

        $where = array('email' => $data['email']);
        $result = $this->common_model->getSingleRecordById('users',$where);
        if(!empty($result)){
            $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' =>'Email-id already exist in our system'));
            $this->response($resp);
        }

        if(!in_array($data['user_type'], array('2','3','4','5','6'))){
            $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' =>'Invalid user type'));
            $this->response($resp);
        }

        $data['password'] = md5($data['password']);
        $data['username'] = $data['first_name'].$data['last_name'];
        $data['is_blocked'] = 0;
        $data['is_email_verified'] = 1;
        $data['user_status'] = 1;
        $data['date_created'] = datetime();
        $lid = $this->common_model->addRecords('users',$data);
        if(!empty($lid)){
            $resp = array('code' => SUCCESS, 'message' => SUCCESS_MSG, 'response' => array('message' => 'User registered successfully'));
            $this->response($resp);
        }else{
            $resp = array('code' => ERROR, 'message' => 'ERROR', 'response' => array('message' => GENERAL_ERROR));
            $this->response($resp);
        }
    }


}