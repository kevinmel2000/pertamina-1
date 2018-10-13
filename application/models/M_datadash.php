<?php
  class M_datadash extends CI_Model{
    function __construct(){
      parent::__construct();
    }
    
   function getProduct()
    {
        $this->db->select("id,nama,link,stock,taken"); 
        $this->db->from('v_product');
        $query = $this->db->get();
        return $query->result();
    }

    function getRequestList(){
         $this->db->where('username', $this->session->userdata('username'));
         $this->db->from('v_requestlist');
          $query = $this->db->get();
          return $query->result();
    }

    function getApprovedList(){
         $this->db->where('username', $this->session->userdata('username'));
         $this->db->from('v_approvedlist');
          $query = $this->db->get();
          return $query->result();
    }

    function getExpiredList(){
         $this->db->where('user', $this->session->userdata('username'));
         $this->db->from('v_expiredlist');
          $query = $this->db->get();
          return $query->result();
    }

    function getProfil(){
         $this->db->where('username', $this->session->userdata('username'));
         $this->db->from('users');
          $query = $this->db->get();
          return $query->row();
    }

    function submit(){
      $field = array(
              'user'=>$this->session->userdata('username'),
              'date_trans'=>date("Y-m-d"),
             'time'=>$this->input->post('time'),
              'necessity'=>$this->input->post('necessity'),
              'more_info'=>$this->input->post('info')
            );
      $this->db->insert('transaksi', $field);
      if($this->db->affected_rows() > 0){ 
          $checked=$this->input->post('image_check');
          $id=$this->db->insert_id();
          foreach($checked as $key) {

                $reg_dat = array(

                    'id_trans'   => $id,
                    'id_product' => $key,
                    'jumlah'     => $this->input->post('jumlah'.$key)
                );
             $this->db->insert('orderpro',$reg_dat);

}

      }else{
          return false;
      }
    }

    function updateProfil(){
      $username=$this->session->userdata('username');
      $dataupdate=array(
        'first'=>$this->input->post('first'),
        'last'=>$this->input->post('last'),
        'email'=>$this->input->post('email'),
        'hp'=>$this->input->post('hp'),
        'password'=>$this->input->post('newpass')
      );
      $this->db->where('username',$username);
      $this->db->update('users',$dataupdate);
    }
    
  }
?>