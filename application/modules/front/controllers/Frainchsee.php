<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frainchsee extends CI_Controller {

	public function __construct() {
        parent::__construct();
        checkUserSession(array('6'));
        $this->uid = $this->session->userdata("user_id");
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

}

?>