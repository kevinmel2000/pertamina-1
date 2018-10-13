<?php
  class M_login extends CI_Model{
    function __construct(){
      parent::__construct();
    }
    
   function login($username, $password)
    {
    $this->db->where('username', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('users');    
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
  }
  }
?>