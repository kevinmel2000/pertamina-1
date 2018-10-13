<?php

/**
* 
*/
class M_request extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function show_request($limit, $start, $st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from v_requestlist where nama like '%$st%' order by id_trans limit " . $start . ", " . $limit;
          $query = $this->db->query($sql);
          return $query->result();
      } 
    function get_request_count($st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from v_requestlist where nama like '%$st%' order by id_trans";
          $query = $this->db->query($sql);
          return $query->num_rows();
      }

     function accept($id){
      $field=array('approved_date'=>date("Y-m-d"));
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