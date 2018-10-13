<?php

class M_item extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function show_item($limit, $start, $st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from product where nama like '%$st%' order by nama limit " . $start . ", " . $limit;
          $query = $this->db->query($sql);
          return $query->result();
      } 
    function get_item_count($st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from product where nama like '%$st%' order by nama";
          $query = $this->db->query($sql);
          return $query->num_rows();
      }

     function getItem($id){
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        if($query->num_rows() > 0){
          return $query->row();
        }else{
          return false;
        }
    }
    function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('product');
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

    function save(){
      $field=array(
        'nama'=>$this->input->post('nama'),
        'stock'=>$this->input->post('stock'),
        'warna'=>$this->input->post('colour'),
        'merek'=>$this->input->post('merek'),
        'link'=>$this->input->post('link')
      );
      $this->db->insert('product', $field);
        if($this->db->affected_rows() > 0){
              return true;
              }else{
              return false;
              }
    } 

    function update(){
      $id=$this->input->post('id');
      $field=array(
        'nama'=>$this->input->post('nama'),
        'stock'=>$this->input->post('stock'),
        'warna'=>$this->input->post('colour'),
        'merek'=>$this->input->post('merek'),
        'link'=>$this->input->post('link')
      );
      $this->db->where('id',$id);
      $this->db->update('product', $field);
        if($this->db->affected_rows() > 0){
              return true;
              }else{
              return false;
              }
    } 
}

?>