<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    /**
	* Index of users controller
    */
    public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
    * Add new user
    * @param $_POST
    */
    public function addNew() {
        is_logged_in($this->url.'/add-new');
        $data = array();
        $data['meta_title'] = 'Add New';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_user');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);

        if($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__verify_user_email');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|integer');
            $this->form_validation->set_rules('profile_picture', 'Profile Picture', 'callback__verify_user_image');

            if($this->form_validation->run() == true){
                $addData = array(
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'phone_number' => $_POST['phone_number'],
                    'is_email_verified' => $_POST['is_email_verified'],
                    'is_phone_verified' => $_POST['is_phone_verified'],
                    'user_type' => $_POST['user_type'],
                    'user_status' => ($_POST['is_email_verified'] == 1 && $_POST['is_phone_verified'] == 1) ? 1 : 0,
                    'online_status' => 0,
                    'is_blocked' => $_POST['is_blocked'],
                    'date_created' => date('Y-m-d H:i:s')
                );

                /* Add record */
                $userId = $this->common_model->addRecords(USER, $addData);
                if($userId) {
                    /* Adding username on users entity */
                    $username = strtolower(str_replace(' ', '-', $_POST['first_name']).str_replace(' ', '-', $_POST['last_name']).$userId);
                    $this->common_model->updateRecords(USER, array('username' => $username), array('id' => $userId));

                    /* Upload profile picture */
                    if(!empty($_FILES['profile_picture']['name'])) {
                        $config['file_name']     = time().$_FILES['profile_picture']['name']; 
                        $config['upload_path']   = './uploads/users';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size']      = '2474898';
                        $config['max_width']     = '100024';
                        $config['max_height']    = '768000';
                        $config['remove_spaces'] = true;
                        $config['field_name']     = 'profile_picture';

                        $imageData = upload_file($_FILES['profile_picture'], $config);
                        if(isset($imageData) && $imageData['message'] == 'success') {
                            $profilePic = $imageData['file_path'];
                        }
                    } else {
                        $profilePic = '';
                    }

                    /* Add meta data */
                    $meta = array(
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'profile_picture' => $profilePic
                    );

                    /* Send Email */
                    send_mail(sprintf(ACCOUNT_CREATED_MESSAGE, ucfirst($_POST['first_name'].' '.$_POST['last_name']), $_POST['email'], $_POST['password'], get_option('public_website_url')), ACCOUNT_CREATED, $_POST['email']);

                    foreach($meta as $key => $val) {
                        update_user_meta($userId, $key, $val);
                    }

                    $this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'User'));
                    redirect($this->url.'/view-all');
                } else {
                    $this->session->set_flashdata('general_error', GENERAL_ERROR);
                    redirect($this->url.'/add-new');
                }
            }
        }
        /* Load admin view */
        load_admin_view('add-new-user', $data);
    }

    /**
    * View all users
    */
    public function viewAll() {
        is_logged_in($this->url.'/view-all');
        $data = array();
        $data['meta_title'] = 'View All';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);

        /* Fetch Data */
        $offset = $this->uri->segment(4);
        if(!$offset) {
            $offset = 0;
        }

        $data['offset'] = $offset;
        $data['users'] = '';
        $data['pagination'] = '';
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(USER, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $url = get_cms_url().$this->url.'/view-all';
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(USER, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
        }

        /* Load admin view */
        load_admin_view('view-all-users', $data);
    }

    /**
    * Edit User
    * @param $_POST
    */
    public function edit() {
        is_logged_in($this->url.'/view-all');
        $userId = $this->uri->segment(4);
        if($userId) {
            $data = array();
            $data['meta_title'] = 'Edit';
            $data['small_text'] = 'User';
            $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_user');
            $data['session_data'] = admin_session_data();
            $data['user_info'] = get_user($data['session_data']['user_id']);
            $data['user'] = $this->common_model->getSingleRecordById(USER, array('id' => $userId));

            if($this->input->post('submit')) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__verify_edit_email');
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('profile_picture', 'Profile Picture', 'callback__verify_user_image');

                /* Check for change password validation */
                if(!empty($_POST['password']) || !empty($_POST['confirm_password'])) {
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
                    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
                }

                if($this->form_validation->run() == true){
                    unset($_POST['submit']);
                    /* Updating user data */
                    $updateArr = array(
                        'email' => $_POST['email'],
                        'is_email_verified' => $_POST['is_email_verified'],
                        'is_phone_verified' => $_POST['is_phone_verified'],
                        'user_type' => $_POST['user_type'],
                        'user_status' => ($_POST['is_email_verified'] == 1 && $_POST['is_phone_verified'] == 1) ? 1 : 0,
                        'is_blocked' => $_POST['is_blocked']
                    );

                    /* Check for password */
                    if(!empty($_POST['password'])) {
                        $updateArr['password'] = md5($_POST['password']);

                        /* Send email to user for password change */
                        $message = sprintf(ADMIN_PASSWORD_CHANGE, ucfirst($_POST['first_name']), ucfirst($_POST['last_name']), $_POST['password']);
                        $subject = 'Password change by site admin';
                        send_mail($message, $subject, $_POST['email']);
                    }

                    $this->common_model->updateRecords(USER, $updateArr, array('id' => $userId));
                    
                    /* Upload profile picture */
                    if(!empty($_FILES['profile_picture']['name'])) {
                        $config['file_name']     = time().$_FILES['profile_picture']['name']; 
                        $config['upload_path']   = './uploads/users';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size']      = '2474898';
                        $config['max_width']     = '100024';
                        $config['max_height']    = '768000';
                        $config['remove_spaces'] = true;
                        $config['field_name']     = 'profile_picture';

                        $imageData = upload_file($_FILES['profile_picture'], $config);
                        if(isset($imageData) && $imageData['message'] == 'success') {
                            $profilePic = $imageData['file_path'];
                        }
                    } else {
                        $profilePic = $_POST['old_profile_picture'];
                    }

                    /* Updating usermeta */
                    $meta = array(
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'profile_picture' => $profilePic
                    );

                    foreach($meta as $key => $val) {
                        update_user_meta($userId, $key, $val);
                    }

                    $this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'User'));
                    redirect($this->url.'/view-all');
                } 
            }

            /* Load admin view */
            load_admin_view('edit-user', $data);
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * Delete user
    * @param $userId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $userId = $this->uri->segment(4);
        if($userId) {
            /* Delete Records */
            $this->common_model->deleteRecords(USER, 'id', $userId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'User'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * u=user profile image callback function
    */
    function _verify_user_image($data) {
        if(!empty($_FILES['profile_picture']['name'])) {
            $valid_extension = array('png', 'jpg', 'jpeg');
            $size = $_FILES['profile_picture']['size'];
            $type = $_FILES['profile_picture']['type'];
            $type = explode('/', $type);

            /* Check for file type */
            if(!in_array($type[1], $valid_extension)) {
                $this->form_validation->set_message('_verify_user_image', IMG_ERROR);
                return FALSE;
            }
            /* Check for file size */
            if($size > 2097152) {
                $this->form_validation->set_message('_verify_user_image', IMG_SIZE_ERROR_FOR_2);
                return FALSE;
            }
        }
    }

    /**
    * Check for user existing email address
    */
    function _verify_user_email($data) {
        $checkEmail = $this->common_model->getRecordCount(USER, array('email' => $_POST['email']));
        if($checkEmail > 0) {
            $this->form_validation->set_message('_verify_user_email', EMAIL_EXISTS);
            return FALSE;
        }
    }

    /**
    * Check for edit user existing email address
    */
    function _verify_edit_email($data) {
        $userId = $this->uri->segment(4);
        $checkEmail = $this->common_model->getCustomSqlCount('SELECT `email` FROM '.USER.' WHERE `id` != '.$userId.' AND `email` = "'.$_POST['email'].'"');
        if($checkEmail > 0) {
            $this->form_validation->set_message('_verify_edit_email', EMAIL_EXISTS);
            return FALSE;
        }
    }
}