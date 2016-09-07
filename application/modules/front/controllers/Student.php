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

    public function upload_documents() {
        $data = array();
        $data['meta_title'] = 'Upload Documents';
        $data['parent']     = 'upload_documents';
        $data['documents']  = $this->common_model->getAllRecordsOrderById(DOCUMENTS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('student/upload_documents', $data);
    }

    public function doUploadDocuments(){
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
                load_front_view('student/upload_documents', $data);
            }else{
                $data['file'] = base_url().'uploads/documents/'.$document['upload_data']['file_name'];
                $data['user_id'] = $this->uid;
                $data['added_date'] = datetime();
                $this->common_model->addRecords(DOCUMENTS, $data);
                $this->session->set_flashdata('success', sprintf(ITEM_ADD_SUCCESS, 'Documents'));
                redirect('student/upload_documents');
            }
        }else{
            $this->session->set_flashdata('error', 'Please select image file !!');
            $data['meta_title'] = 'Upload Documents';
            $data['parent']     = 'upload_documents';
            load_front_view('student/upload_documents', $data);
        }
        }else{
            $data['meta_title'] = 'Upload Documents';
            $data['parent']     = 'upload_documents';
            load_front_view('student/upload_documents', $data);
        }
    }

    public function deleteDocument($id) {
        $id = decode($id);
        if($id) {
            $this->common_model->deleteRecords(DOCUMENTS, 'id', $id);
            $this->session->set_flashdata('success', sprintf(ITEM_DELETE_SUCCESS, 'Document'));
            redirect('student/upload_documents');
        } else {
            $this->session->set_flashdata('error', INVALID_ITEM);
            redirect('student/upload_documents');
        }
    }

}

?>