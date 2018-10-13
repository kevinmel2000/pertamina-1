<?php  
 class M_signup extends CI_Model  
 {  
      function __construct(){
          parent::__construct();
      }

      function signup(){
      	$check=$this->db->query("select * from users where username='".$this->input->post('username')."'");
		$row = $check->num_rows();
		if($row){
			return false;
		}
		else{
			 $field = array(
          		'first'=>$this->input->post('first'),
          		'last'=>$this->input->post('last'),
          		'email'=>$this->input->post('email'),
          		'hp'=>$this->input->post('hp'),
          		'username'=>$this->input->post('username'),
          		'password'=>$this->input->post('password')
          	);
			 $this->db->insert('users', $field);
			  if($this->db->affected_rows() > 0){
            	return true;
          	  }else{
            	return false;
          	  }
		}
      }
  } 