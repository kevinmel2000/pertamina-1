<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {
  function __construct(){
            parent::__construct();

          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->database();
          $this->load->model('m_login');
      }


	public function index()
	{
		 if($this->session->userdata('username') != '')  
           {  
                redirect(base_url() . 'dashboard'); 
           }  
           else  
           {   
            $this->load->view("welcome/index"); 
           }   
	}

  function login()  
  {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true 
                $this->load->model('m_login');   
                $username = $this->input->post('username');  
                $password = $this->input->post('password');   
                if($this->m_login->login($username, $password))  
                {  
                     $session_data = array('username'=>$username );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'dashboard');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error_msg', 'Invalid Username and Password');  
                     redirect(base_url());  
                }  
           }  
           else  
           {  
                redirect(base_url());  
           }  
      }  

  function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url() . 'welcome');  
      }

}
