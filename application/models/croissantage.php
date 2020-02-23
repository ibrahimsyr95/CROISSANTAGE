<?php

class croissantage extends CI_Model{

   
    /**
     * 
     */
    public function croissantage_over_time()
    {
    $sql="SELECT  DATE_FORMAT(crt.dateC, '%d/%m/%Y') date, COUNT(*)nb FROM croissantage crt GROUP by DATE_FORMAT(crt.dateC, '%d/%m/%Y') ORDER by date ASC;";
    $query = $this->db->query($sql);
    return (json_encode($query->result_array()));
    }
    /**
     * 
     */
    public function getAll($id){
        $sql="SELECT cro.id,cer.firstname cername,cer.lastname cerlast,cro.dateC,ced.lastname cedname,ced.firstname cedlast,pastrytype.name namepastry,pastrytype.id idpastry,cro.deadline,cro.dateCommand,cro.id idCroissantage FROM croissantage cro INNER JOIN student ced on ced.id=cro.idCed  INNER JOIN student cer on cer.id=cro.idCer INNER join currentcommand cur on cur.idCroissantage= cro.id inner join pastrytype on cur.pastryType=pastrytype.id where cur.idStudent=$id ";
        $query = $this->db->query($sql);
        $sql="SELECT cro.id,cer.firstname cername,cer.lastname cerlast,cro.dateC,ced.lastname cedname,ced.firstname cedlast,cro.deadline,cro.dateCommand,cro.id idCroissantage FROM croissantage cro INNER JOIN student ced on ced.id=cro.idCed  INNER JOIN student cer on cer.id=cro.idCer  WHERE cro.dateCommand < now()";
        $query2 = $this->db->query($sql);
        $res=array_merge($query->result_array(), $query2->result_array());
        return ($res);
    
    }
    /**
     * 
     */
    public function insert($data){
          $this->db->insert("croissantage",$data);
          return $this->db->insert_id();
    }
    /**
     * 
     */
public function get_5best_croissanted(){
    $sql="SELECT  student.firstname,student.lastname, COUNT(*)nb FROM croissantage INNER JOIN student on student.id=croissantage.idCer GROUP by student.id  ORDEr by nb DESC LIMIT 5";
    $query = $this->db->query($sql);
    return ($query->result_array());
}
    
}
?>
