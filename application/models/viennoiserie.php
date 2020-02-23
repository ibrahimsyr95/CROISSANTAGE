<?php

class Viennoiserie extends CI_Model{

  public function getAll(){
   
        $query = $this->db->query("SELECT * FROM  pastrytype ");
        return json_encode($query->result_array());
    }
    public function getAvailable(){
   
        $query = $this->db->query("SELECT * FROM  pastrytype where isAvailable=1 ");
        return json_encode($query->result_array());
    }
    public function update_status_pastry($id,$data){
        $this->db->where('id', $id);
        return $this->db->update('pastrytype', $data);
    }
  

}
?>