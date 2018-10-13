<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Expired extends CI_Controller {



	function __construct(){

            parent::__construct();



          $this->load->helper('form');

          $this->load->helper('url');

          $this->load->database();

          $this->load->model('m_expired');

      }



      function index()

      {	

      	if($this->session->userdata('username') != '')  

           {

           		$config['base_url'] = site_url('expired/index');

                $config['total_rows'] = $this->db->count_all('v_expiredlist');

                $config['per_page'] = "10";

                $config["uri_segment"] = 3;

                $choice = $config["total_rows"]/$config["per_page"];

                $config["num_links"] = floor($choice);



                $config['full_tag_open'] = '<ul class="pagination">';

                $config['full_tag_close'] = '</ul>';

                $config['first_link'] = false;

                $config['last_link'] = false;

                $config['first_tag_open'] = '<li>';

                $config['first_tag_close'] = '</li>';

                $config['prev_link'] = '«';

                $config['prev_tag_open'] = '<li class="prev">';

                $config['prev_tag_close'] = '</li>';

                $config['next_link'] = '»';

                $config['next_tag_open'] = '<li>';

                $config['next_tag_close'] = '</li>';

                $config['last_tag_open'] = '<li>';

                $config['last_tag_close'] = '</li>';

                $config['cur_tag_open'] = '<li class="active"><a href="#">';

                $config['cur_tag_close'] = '</a></li>';

                $config['num_tag_open'] = '<li>';

                $config['num_tag_close'] = '</li>';

                $this->pagination->initialize($config);



                $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                $data['expiredlist'] = $this->m_expired->show_expired($config["per_page"], $data['page'], NULL); 

                $data['pagination'] = $this->pagination->create_links();

           		$this->load->view('data/expired', $data);

           }  

           else  

           {   

            	redirect(base_url() . 'welcome/login'); 

           }     	

      }





      function search(){



         if($this->session->userdata('username') != '')  

           { 

        $search = ($this->input->post("search_expired"))? $this->input->post("search_expired") : "NIL";



        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;



        // pagination settings

        $config = array();

        $config['base_url'] = site_url("expired/search/$search");

        $config['total_rows'] = $this->m_expired->get_expired_count($search);

        $config['per_page'] = "10";

        $config["uri_segment"] = 4;

        $choice = $config["total_rows"]/$config["per_page"];

        $config["num_links"] = floor($choice);



        // integrate bootstrap pagination

        $config['full_tag_open'] = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = false;

        $config['last_link'] = false;

        $config['first_tag_open'] = '<li>';

        $config['first_tag_close'] = '</li>';

        $config['prev_link'] = '«';

        $config['prev_tag_open'] = '<li class="prev">';

        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '«';

        $config['next_tag_open'] = '<li>';

        $config['next_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';

        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';

        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);



        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['expiredlist'] = $this->m_expired->show_expired($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('data/expired', $data);

          }  

           else  

           {  

                redirect(base_url() . 'welcome/login');  

           }  

    }





  function getback($id){

    if($this->session->userdata('username') != '')  

           {

      $result = $this->m_expired->getBack($id);

      if($result){

          $this->session->set_flashdata('success_msg', 'Item '.$id.' Accept successfully');

      }else{

          $this->session->set_flashdata('error_msg', 'Faill to accept item');

      }

      redirect(base_url('expired'));

      }  

           else  

           {  

                redirect(base_url() . 'welcome/login');  

           }  

  }

    



}