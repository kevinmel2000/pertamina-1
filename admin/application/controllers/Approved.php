<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Approved extends CI_Controller {



	function __construct(){

            parent::__construct();



          $this->load->helper('form');

          $this->load->helper('url');

          $this->load->database();

          $this->load->model('m_approved');

      }



      function index()

      {	

      	if($this->session->userdata('username') != '')  

           {

           		$config['base_url'] = site_url('aopproved/index');

                $config['total_rows'] = $this->db->count_all('v_approvedlist');

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

                $data['approvedlist'] = $this->m_approved->show_approved($config["per_page"], $data['page'], NULL); 

                $data['pagination'] = $this->pagination->create_links();

           		$this->load->view('data/approved', $data);

           }  

           else  

           {   

            	redirect(base_url() . 'welcome/login'); 

           }     	

      }





      function search(){



         if($this->session->userdata('username') != '')  

           { 

        $search = ($this->input->post("search_approved"))? $this->input->post("search_approved") : "NIL";



        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;



        // pagination settings

        $config = array();

        $config['base_url'] = site_url("approved/search/$search");

        $config['total_rows'] = $this->m_approved->get_approved_count($search);

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

        $data['approvedlist'] = $this->m_approved->show_approved($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('data/approved', $data);

          }  

           else  

           {  

                redirect(base_url() . 'welcome/login');  

           }  

    }





}