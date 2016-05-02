<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author itischarles
 */


class MY_Controller extends CI_Controller {
    


       /**
     *	@currentUserID int 
     *	@description current user ID got from session data
     *	@returns ID of the current user
      */
    protected $currentUserID; 
   
    
   /**
     *	$currentUserBaseUrl string 
     *	@description current user user got from session data
     *	@returns string of the current user
      */
    protected $currentUserBaseUrl;
    
    
        /**
     * @$user_accessor mixed 
     * used to access the users_model
     */
    public $user_accessor;
     
    
    function __construct() {
        parent::__construct();
        
        date_default_timezone_set('Europe/London');
   	
	// set the userID if available
	$this->setCurrentUserID();
	$this->setCurrentUserBaseURL();
	
	$this->user_accessor =  new User_model(); 

    }
    
    
   
    
        /**
     * generate url for elements/tables records. e.g client url
     * @$elementName string $elementName the element generating the URL
     * @return string
     */
    protected function generateElementURL($elementName = " ? "){
	$timenow = date("Y-m-d H:i:s", strtotime('now'));	
	$randomNumber = rand(0, 1000);
	return md5($timenow+$elementName+$randomNumber);
    }
    
    
    
    private function setCurrentUserID() {
	if($this->session->userdata('userID')):
	    $this->current_userID = $this->session->userdata('userID');
	endif;
	
    }
    
    
     private function setCurrentUserBaseURL() {
	 
	 if($this->session->userdata('userBaseUrl')):
	    $this->current_userID = $this->session->userdata('userBaseUrl');
	endif;

	
    }
    
    
     /**
     * 
     * @$api_key_posted string API key for this client
     * @return boolean
     */
    protected function authenticateAPIRequest($api_key_posted){
	 $extected_key = "cs9a25c11ba50c1f63562d6a50f74bd885";
	 if($extected_key != $api_key_posted):
	     return false;
	 endif;
	 
	 return true;
    }



//     /**
//     * make this function available to all controllers extending this controller
//      * return the current user ID
//     */
//    protected function getCurrentUserID() {
//	return  $this->user_accessor->getSessionID();
//    }
//    
//    
//    /**
//     * make this function available to all controllers extending this controller
//     * return the current user baseurl
//     */
//    protected function getCurrentUserBaseURL() {
//	return $this->currentUserBaseUrl;
//	
//    }
    
}