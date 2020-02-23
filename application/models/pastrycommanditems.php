<?php

class pastrycommanditems extends CI_Model{
  public function __construct()
  {
     
  }
  public function get_percentage_items()
  {
    $sql="SELECT pastrytype.name name, SUM(pastrycommanditems.nb) nb FROM `pastrycommanditems` INNER JOIN pastrytype on pastrytype.id = pastrycommanditems.idType GROUP by idType";
    $query = $this->db->query($sql);
    return json_encode($query->result_array());
  }
}
?>