<?php

/**
* 
*/
class M_data extends CI_Model
{
	
  
	function __construct()
	{
		parent::__construct();
	}

	function show_user($limit, $start, $st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from users where username like '%$st%' order by username limit " . $start . ", " . $limit;
          $query = $this->db->query($sql);
          return $query->result();
      } 
    function get_user_count($st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from users where username like '%$st%' order by username";
          $query = $this->db->query($sql);
          return $query->num_rows();
      }

     function getUser($username){
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
          return $query->row();
        }else{
          return false;
        }
    }
    function delete($username){
    $this->db->where('username', $username);
    $this->db->delete('users');
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  } 
}

?>