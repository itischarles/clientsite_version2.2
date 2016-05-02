<?php

/*
 * To provide quickaccess to the authorisation model from anyhere e.g views
 */

class Authorisation_lib {

    private $_authorisation_accessor;

     
     function __construct() {
	 
	//provides access to the methos in auth model 
	 
	$CI =& get_instance();
	$CI->load->model('authorisation/Authorisation_model');
	$this->_authorisation_accessor = new Authorisation_model();
	
     }
     
    
  
     function hasPermission($perm){
	 
	 return $this->_authorisation_accessor->hasPrivilege($perm);
     }
     
     function hasRoles($roles_param){
	 return $this->_authorisation_accessor->hasRoles($roles_param);
     }
     
    
    
}
