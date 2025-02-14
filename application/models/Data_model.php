<?php 
class Data_model extends CI_Model {
    public function getCountries (){
        return $this->db->get('country')->result();
    } 
    public function getStates($country_id) {
        return $this->db->where('country_id', $country_id)->get('state')->result();
    }
    public function getCities($state_id) {
        return $this->db->where('state_id', $state_id)->get('city')->result();
    }
}




?>