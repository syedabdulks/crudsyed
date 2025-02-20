<?php

class Uploadrag extends CI_Controller {


public function __construct () {
    parent::__construct();
    $this->load->helper('url');
}

public function index () {
    $this->load->view('uploadrag_form');
}

public function fileupload() {
    $config['upload_path'] = FCPATH.'Uploads/';
    $config['max_size'] = 1024;
    $config['allowed_types'] = 'jpeg|png|gif';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        $data = $this->upload->data();
    }

}

}
?>