<?php

class Crud extends CI_Controller {

   public function __construct() {
       parent:: __construct();
       $this->load->database();
       $this->load->model('crud_model');
   }
   public function displaydata() {
    $result['data']=$this->crud_model->display_records();
    $this->load->view('display_records', $result);
   }
   public function deletedata() {
    $id = $this->input->get ('id');
    $response = $this->crud_model->deleteRecordById($id);
    if ($response == true) {
        echo "Data Deleted Successfully";
    }
    else {
        echo "failed to Delete";
    }
   }
   
} 


?>