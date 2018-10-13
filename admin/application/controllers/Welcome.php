<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
            parent::__construct();

          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->database();
          $this->load->model('M_dashboard');
      }

	public function index()
	{	
		 if($this->session->userdata('username') != '')  
           { 
           		$data['count'] = $this->M_dashboard->getCount();
              $data['request']=$this->M_dashboard->getRequest();
              $data['expired']=$this->M_dashboard->getExpired();
           		$this->load->view('/dashboard/index',$data); 
           }  
           else  
           {   
            	$this->load->view('/dashboard/login'); 
           }   
		
	}

	public function login()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');   
                if($username=='admin'&&$password=='p3rt4min4')  
                {  
                     $session_data = array('username'=>$username );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() );  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     $this->load->view('/dashboard/login');   
                }  
           }  
           else  
           {  
                 
               $this->load->view('/dashboard/login');  
           }  
      } 

      public function logout(){
      	   $this->session->unset_userdata('username');  
           redirect(base_url());  
      } 
}
