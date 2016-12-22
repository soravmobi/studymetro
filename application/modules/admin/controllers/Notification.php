<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* Documents index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    public function viewAll() {
        is_logged_in($this->url.'/view-all');
        $data = array();
        $data['meta_title'] = 'View All';
        $data['small_text'] = 'Notification';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        $user_id = $data['user_info']['user_id'];
        /* Fetch Data */
        $offset = $this->uri->segment(4);
        if(!$offset) {
            $offset = 0;
        }
        if(isset($_GET['s']) && !empty($_GET['s'])){
            if($this->input->get('per_page')){
                $offset = $this->input->get('per_page');
            }else{
                $offset = 0;
            }
        }

        $data['offset'] = $offset;
        $data['users'] = '';
        $data['pagination'] = '';
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(ADMIN_NOTIFICATION, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(ADMIN_NOTIFICATION, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
        }

        $data['notification'] = $this->common_model->getAllRecords(ADMIN_NOTIFICATION);

        $this->common_model->updateRecords(ADMIN_NOTIFICATION,array('is_read'=>1),array('receiver_id'=>$user_id));

        /* Load admin view */
        load_admin_view('notification/view_notification', $data);
    }

    public function delete_notification($id)
    {
    	$data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        $user_id = $data['user_info']['user_id'];

        $to_id = $user_id;
        $table_name = getNotifyHistoryTable($to_id);

        $request = $this->common_model->deleteRecord($table_name,array('id'=>$id));
        if($request)
        {
            $this->session->set_flashdata('item_success','Notification Deleted Successfully');
            redirect('admin/notification/view-all');
        }
        else
        {
            $this->session->set_flashdata('invalid_item','Unable to delete Notification');
            redirect('admin/notification/view-all');
        }
    }
}
?>