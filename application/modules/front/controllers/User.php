<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        checkUserSession(array('2','3','4','5','6'));
        $this->uid = $this->session->userdata("user_id");
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function logout()
	{
		$this->session->sess_destroy();
		delete_cookie("study_metro");
		redirect('/');
	}

    public function callback_pswd_check($pswd)
    {
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
        $data = $this->input->post();
        $this->common_model->updateRecords('users',$data,array('id' => $this->uid));
        $this->session->set_flashdata('success','Profile successfully updated !');
        redirect('user/profile');
    }

    public function dashboard()
    {
        $data = array();
        $data['meta_title'] = 'dashboard';
        $data['parent'] = 'dashboard';
        $data['detail'] = $this->common_model->getAllRecordsById('users',array('id' => $this->uid));
        load_front_view('user/dashboard', $data);
    }

}
?>