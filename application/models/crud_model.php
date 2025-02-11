<?php

class Crud_model extends CI_Model 
{
public function display_records(){
$query=$this->db->get('students');
return $query->result();
}
public function deleteRecordById ($id)
{
    $this->db->where('id', $id);
    $this->db->delete('students');
    return true;

}

// public function update_records($first_name, $last_name, $email, $id) {
//     $this->db->query("Update students set first_name = '$first_name', last_name = '$last_name', email = '$email' where id='" .$id. "'");
// }
}



?>