<?php

/**
* 
*/
class M_expired extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function show_expired($limit, $start, $st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from v_expiredlist where nama like '%$st%' order by id_trans limit " . $start . ", " . $limit;
          $query = $this->db->query($sql);
          return $query->result();
      } 
    function get_expired_count($st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from v_expiredlist where nama like '%$st%' order by id_trans";
          $query = $this->db->query($sql);
          return $query->num_rows();
      }

     function getBack($id){
      $field=array('back_date'=>date("Y-m-d"));
      $this->db->where('id_trans', $id);
      $this->db->update('transaksi',$field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }

}
}
?>