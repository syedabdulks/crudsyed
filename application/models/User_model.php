<?php

class User_model extends CI_Model {
   
    public function registerUser($data) {
     $this->db->insert ('user', $data);
    return $this->db->insert_id();
    }

    public function addUserCategory($user_id, $category) {
        $this->db->insert('user_categories', array('user_id' => $user_id, 'category'=>$category));

    }
    public function getUsers() {
       return $this->db->get ('user')->result();
    }
    public function getUser($id) {
        return $this->db->where('id', $id)->get('user')->row();
     }
     public function getUserCategories($id) {
        return $this->db->where('user_id', $id)->get('user_categories')->result_array();
     }
}

?>


