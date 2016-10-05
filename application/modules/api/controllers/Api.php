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


}