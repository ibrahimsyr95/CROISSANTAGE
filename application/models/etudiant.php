<?php

class etudiant extends CI_Model{


    /**
     * verifier l'existance de cet utilisateur dans BDD
     */
    public function verify($data)
    {
        $this->db->select('pwd');
         $query=$this->db->get_where("student",$data);
         return $query->row();
    }
    public function getRole($data)
    {
         $query=$this->db->get_where("rights",$data);
         return  $query->result_array();
    }
    /**
     * 
     * 
     * 
     */
    public function getid($login){
        $this->db->select('id');
        $query=$this->db->get_where("student",$login);
        return ($query->result_array());
    }
    public function isAdmin($data)
    {
        $query=$this->db->get_where("rights",$data);
        return $query->num_rows();
    }
    /**
     * 
     */
     public function insert($data)
     {
        return $this->db->insert("student",$data);
     }
    /**
     * obtenir tous les etudiants
     */
    public function getAll()
    {
      
         $query=$this->db->get_where("student");
         return json_encode($query->result_array());
    }
    /**
     * 
     */
    public function deleteStudent($data){
        $this->db->where($data);
       return  $this->db->delete("student");
    }
  /**
   * 
   */
   public function updateRole($data)
   {
    $this->db->where('idS', $data["idS"]);
      $this->db->delete("rights");
    return $this->db->insert('rights',$data);
   }
    /**
     * 
     */
    public function get_my_prfile($id){
        $query = $this->db->query("SELECT *  FROM `student` INNER JOIN pastrytype on student.defaultPastry=pastrytype.id WHERE student.id=$id");
        return json_encode($query->result_array());
    }
    /**
     * 
     */
    public function update_my_profile($id,$data){
        $this->db->where('id', $id);
      return $this->db->update('student', $data);
    }
     /**
      * 
      */
    public function get_Number_time_croissanted($id){
        $query = $this->db->query("SELECT count(*) nb FROM `croissantage` INNER JOIN student on student.id=croissantage.idCed WHERE croissantage.idCed=$id");
        return json_encode($query->result_array());
    }
    /**
     * 
     */


    public function get_Number_time_croissanter($id){
        $query = $this->db->query("SELECT count(*) nb FROM `croissantage` INNER JOIN student on student.id=croissantage.idCer WHERE croissantage.idCer=$id");
        return json_encode($query->result_array());
    }
  
}
?>
