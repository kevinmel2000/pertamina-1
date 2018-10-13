<?php

defined('BASEPATH') OR exit('No direct script access allowed');







class Signup extends CI_Controller {

	 function __construct(){

            parent::__construct();



          $this->load->helper('form');

          $this->load->helper('url');

          $this->load->database();

           $this->load->model('m_signup');

      }



	public function index()

	{

		$this->load->view('signup/index');

	}

  public function submit()

  {

    $result =$this->m_signup->signup(); 

    if($result){

      $this->session->set_flashdata('success_msg', 'You Registered Succesfully !');

      redirect(base_url('signup'));

    }

    else{

      $this->session->set_flashdata('error_msg', 'Choose Another username');

      redirect(base_url('signup'));

    }

  }





}