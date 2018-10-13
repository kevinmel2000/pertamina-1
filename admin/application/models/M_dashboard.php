<?php

/**
* 
*/
class M_dashboard extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getCount()
	{
		$this->db->from('v_count');
		$query=$this->db->get();
		return $query->row();
	}

	function getRequest()
	{
		$this->db->limit(5);
		$query = $this->db->get('v_requestlist');
		return $query->result();
	}

	function getExpired()
	{
		$this->db->limit(5);
		$query = $this->db->get('v_expiredlist');
		return $query->result();
	}
}


?>