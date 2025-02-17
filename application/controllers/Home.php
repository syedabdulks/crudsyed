<?php 

class Home extends CI_Controller {

    public function settings() {
       if($this->input->is_ajax_request()) {
        $data = $this->load->view('settings', null, true);
        echo "$data";
        } else {
            echo "You cannot access this page directly";
        }
  
    }
    public function ajaxSettings () {
        $this->load->view('ajax');
    }
}




?>