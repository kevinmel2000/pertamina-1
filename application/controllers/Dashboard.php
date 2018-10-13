<?php

defined('BASEPATH') OR exit('No direct script access allowed');







class Dashboard extends CI_Controller {

	 function __construct(){

            parent::__construct();



          $this->load->helper('form');

          $this->load->helper('url');

          $this->load->database();

          $this->load->model('m_datadash');



      }



	public function index()

	{

		$data['product'] = $this->m_datadash->getProduct();

    $data['request'] = $this->m_datadash->getRequestList();	

    $data['approved'] = $this->m_datadash->getApprovedList(); 

    $data['expired'] = $this->m_datadash->getExpiredList(); 

    $data['profil'] = $this->m_datadash->getProfil(); 

		$data['user']=$this->session->userdata('username');

		$this->load->view('dashboard/index', $data);	

	}

 



 	public function submitRequest(){

  		 $result =$this->m_datadash->submit();

       redirect(base_url('dashboard/#data'));

  		}



  public function update(){

    $result=$this->m_datadash->updateProfil();

     if($result){

      $this->session->set_flashdata('error_msg', 'Faill to update record');

    }else{

       $this->session->set_flashdata('success_msg', 'Record updated successfully');

    }

    redirect(base_url('dashboard/#profile'));

  }



  function logout()  

      {  

           $this->session->unset_userdata('username');  

           redirect(base_url());  

      }







}