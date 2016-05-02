<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author itischarles
 */
class Authenticate extends MY_Controller{
    
     var $user_accessor =''; // to access the user model
    
    function __construct() {
        parent::__construct();
        
        $this->user_accessor = new User_Model();
    }
    
    
    
  
    function index(){	
	
        redirect(base_url());
    }
    
    
    
    function login(){
        
        $data = array();
        
        if($this->input->post('login')):
          
              $this->form_validation->set_rules('username', 'Username', 'required');
              $this->form_validation->set_rules('password', 'Password', 'required');
              $this->form_validation->set_error_delimiters( '<em class="error_text">','</em>' );
              
                if($this->form_validation->run()):
                    
		    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                  
                      if($this->user_accessor->login($username, $password)):
//                            // If requested a page that needed login - take them there!
                            $uri_string = $this->session->userdata('uri_string');
                                         
                            if($uri_string):
                                redirect(base_url().$this->session->userdata('uri_string'));
                            endif;
                            
                            redirect(base_url());
                           
                            exit();
                               
                        else:
                           $data['login_error'] =  'Invalid Username/Password'; 
                       endif;                  
                endif;             
        endif;
        
     
        
        $this->load->view('templates/header', $data);
	$this->load->view('templates/login_head', $data);
        $this->load->view('authentication/login', $data);
        $this->load->view('templates/footer', $data); 
    }
    
    
    
    
    function register(){
        
    }
    
    
    
    
    function logout(){
        $this->user_accessor->logout();
    }
}
