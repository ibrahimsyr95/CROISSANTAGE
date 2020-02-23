<?php

class currentcommand extends CI_Model{
  public function __construct()
  {
      $this->pass_time_to_choice_pastry();
  }
  /**
   * quand la commande depasse la date de changer le type de pastry on les supprimer de ce tableau on l'ajourt dans pastrycommanditems
   */
 public function pass_time_to_choice_pastry()
 {
   $sql="INSERT INTO pastrycommanditems (idC, 	idType, 	nb ) SELECT currentcommand.idCroissantage ctg,pastrytype.id past,COUNT(*) nb from croissantage INNER JOIN currentcommand on croissantage.id= currentcommand.idCroissantage INNER JOIN pastrytype on pastrytype.id=currentcommand.pastryType WHERE croissantage.dateCommand < now() GROUP by currentcommand.idCroissantage,currentcommand.pastryType";
   $this->db->query($sql);
   $sqldelete=" DELETE a FROM currentcommand a   INNER JOIN croissantage b    ON a.idCroissantage = b.id    WHERE b.dateCommand < now() ";
   $this->db->query($sqldelete);
 }
  public function getAll(){
   
        $query = $this->db->query("SELECT * FROM  currentcommand");
        return json_encode($query->result_array());
    }
    /**
     * 
     */
    public function add_current_command($idcroissantage){
      $query = $this->db->query("INSERT INTO currentcommand (currentcommand.idCroissantage, 	pastryType, 	idStudent )
      SELECT  $idcroissantage,student.defaultPastry,  student.id  FROM student;");
      return json_encode($query);
    }
    /**
     * 
     * 
     */

    public function get_number_items($idcroissantage){
      $sql="SELECT pastryType.name,COUNT(pastryType.id) nb FROM `currentcommand` INNER JOIN pastryType on pastryType.id=currentcommand.pastryType WHERE currentcommand.idCroissantage=$idcroissantage GROUP by pastryType.name";
      $query = $this->db->query($sql);
      return json_encode($query->result_array());
    
    }
    /***
     * 
     */
    public function update_crrent_commande($idpastry,$ctg,$idstudent){
      	$sql="UPDATE currentcommand        SET pastryType=$idpastry   WHERE idStudent=$idstudent and idCroissantage=$ctg ";
        $query = $this->db->query($sql);
        return json_encode($query);
    }
  

}
?>