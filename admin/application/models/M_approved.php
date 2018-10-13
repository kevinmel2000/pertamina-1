<?php

/**
* 
*/
class M_approved extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function show_approved($limit, $start, $st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from v_approvedlist where nama like '%$st%' order by id_trans limit " . $start . ", " . $limit;
          $query = $this->db->query($sql);
          return $query->result();
      } 
    function get_approved_count($st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from v_approvedlist where nama like '%$st%' order by id_trans";
          $query = $this->db->query($sql);
          return $query->num_rows();
      }

    
}
?>