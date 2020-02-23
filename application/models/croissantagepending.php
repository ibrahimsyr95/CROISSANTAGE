<?php

class croissantagepending extends CI_Model{

    /**
     * 
     */
    public function getAll($id){
        $sql="SELECT cro.id,cer.firstname cername,cer.lastname cerlast,cro.dateC,ced.lastname cedname,ced.firstname cedlast,cro.deadline,cro.dateCommand,cro.id idCroissantage FROM croissantage_pending_validation cro INNER JOIN student ced on ced.id=cro.idCed INNER JOIN student cer on cer.id=cro.idCer ";
        $query = $this->db->query($sql);
        return ($query->result_array());
    
    }
    /**
     * 
     */
    public function insert($data){
          $this->db->insert("croissantage_pending_validation",$data);
          return $this->db->insert_id();
    }
    public function rejectCroissantage($data)
    {
        $this->db->where($data);
        $this->db->delete("croissantage_pending_validation");
    }
   public function confirmCroissantage($data)
   {
    $sql="SELECT `idCed`, `idCer`, `dateC`, `dateCommand`, `deadline` FROM croissantage_pending_validation where id=$data ";
    $query = $this->db->query($sql);
    return ($query->result_array());
   }
}
?>
