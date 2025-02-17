<?php

class Extracts extends CI_Controller {

    public function __construct () {

        parent:: __construct ();
        $this->load->helper('url');
    }
    public function index () {
        $this->load->view ('upload_zip');
    }
    public function upload_zip () {
     $this->load->library('upload');
     $config['upload_path'] = './Uploads/';
     $config ['allowed_types'] = 'zip';
     $this->upload->initialize($config);

     if (!$this->upload->do_upload('file'))  {
        $error = array ('error'=> $this->upload->display_errors());
        $this->load->view ('upload_zip', $error);
     }
     else {
        $data = array ('upload_data'=>$this->upload->data());
        $zip = new ZipArchive;
        $file = $data['upload_data']['full_path'];

        if ($zip->open($file)==TRUE) {
            $zip->extractTo('./Uploads/extracts/');
            $zip->close();
            $success = array ('success'=>'Zip file Uploaded and Extracted');
            $this->load->view('upload_zip', $success);
        } else {
            $error = array ('error' => 'Unable to extract the zip file');
            $this->load->view ('upload_zip', $error);
        }
     }
    }
}

?>