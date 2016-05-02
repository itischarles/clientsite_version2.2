<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author itischarles
 */
class Dashboard extends MY_Controller {
    
    /**
     *
     * @var object 
     * used to access the users model
     */
      var $user_accessor =''; // to access the user model
     
      /**
       * used to access the authoriation model
       * @var object 
       */
     var $authorisation_accessor;
     
     
     /**
      *
      * @var int 
      * store the current user ID
      * we do not need to redefine but can simply call it since it is inhered from the suer class
      */
     //var $currentUserID;
  
    function __construct() {
        parent::__construct();
      
        
    $this->user_accessor = new User_Model(); 
    
    // you need to be authenticated to view this controller
    $this->user_accessor->authenticate($this->session->userdata('userID'));
    $this->authorisation_accessor = new Authorisation_model();
    
               
    }
    
    
    
    
    function index(){
             
       	$data['userDetails'] = $userDetails= $this->user_accessor->getUserByID(array($this->currentUserID));

	  
        if(empty($userDetails)):
             $this->session->set_flashdata('message', 'User Not found!!!');
             $this->session->set_flashdata('type', 'flash_error');
             redirect($_SERVER['HTTP_REFERER']); 
	     return false;
        endif;
	
	
	$data['page_title'] = "Welcome: Client Site ";
        $data['sub_title'] = "dashboard";

	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar', $data);
        $this->load->view('dashboard/welcome', $data);
        $this->load->view('templates/footer', $data); 
    }
    
    
    
    


    
}
