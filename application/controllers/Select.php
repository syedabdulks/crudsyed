<?php

class Select extends CI_Controller {
    public function __construct () {
        parent::__construct();
        $this->load->database();
        $this->load->model('data_model');
        $this->load->helper('url');
    }
    public function index() {
        $countries = $this->data_model->getCountries();
        $this->load->view('select_form', array('countries'=>$countries));
    }
    public function states() {
        $country_id = $this->input->get('country_id');
        $states = $this->data_model->getStates($country_id);
        $html = ' <option value="">Select State</option>';
        foreach($states as $state){
            $html .= '<option value="' .$state->state_id.'">'.$state->state_name. '</option>';
        }
        echo $html;
    }
    public function cities () {
        $state_id = $this->input->get('state_id');
        $cities = $this->data_model->getCities($state_id);
        $html = ' <option value="">Select City</option>';
        foreach ($cities as $city) {
            $html .= '<option value="' .$city->city_id.'">'.$city->city_name.'</option>';
        }
        echo $html;
    }
}

?>