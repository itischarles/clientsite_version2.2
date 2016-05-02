<?php


/**
 * Description
 * TABLE NAMES
 *	auth_roles - hold the roles that exist in the system e.g - Administrator, Staff Member
 *	auth_permissions - holds the list of permissions a role can have- view, edit, delete etc
 *	auth_role_perm - maps which role has what permission
 *	auth_user_role - maps which user has what roles
 *
 * @author itischarles
 */
class Authorisation_model extends CI_Model{
   
    /**
     *hold list of permissions
     * @var array 
     */
   // protected $permissions;
    private $roles;
    
    private $_userID;


    public function __construct() {
	parent::__construct();
	
	//$this->permissions = array();
	$this->roles = array();

	 $this->_userID = $this->session->userdata('userID'); // currentuserID set in my_controller
	
	$this->initRoles();
    }
    
    


    
    // check if user has a specific privilege
    public function hasPrivilege($perm) {
	
	
	
	// if the role array is empty stop
	if(empty($this->roles)):
	    return false;
	endif;
	
	// if the user has administrative role, return true
        foreach ($this->roles as $roles=>$role) {
	    if($role['roleName'] == 'Administrator'):
		return true;
	    endif;
	    
	    // if the not administrator, check the permissions of this user
	    // if the user does not have permission, stop
	    $rolePermission = $role['rolePermission'];
	    if(empty($rolePermission)):
		return false;
	    endif;
	    
	    // if the list of permission matches the given one, return true
	    foreach($rolePermission as $key=>$permissions):
		if($permissions->permDesc == $perm):
		    return true;
		endif;
	    endforeach;
	    
            
        }
        return false;
    }
    
    
    // check if the user has any of these roles
    /**
     * 
     * @param array $roles_param check if the user has any of the roles listed here
     * @return boolean
     */
    function hasRoles($roles_param){
	
	if(empty($this->roles)):
	    return false;
	endif;
	
	$roles_param = (array)$roles_param;
	

        foreach ($this->roles as $roles=>$role) {
	    if(in_array($role['roleName'], $roles_param)):
				return true;
	    endif;
        }
        return false;	
    }
    
    
    
     // populate roles with their associated permissions
    private function initRoles() {
       
	$this->db->join('auth_roles', 'auth_user_role.roleID=auth_roles.roleID');
	
        $this->db->where('auth_user_role.userID', $this->_userID);
         
        $roles_recrod =  $this->db->get('auth_user_role')->result();
	
       if(!empty($roles_recrod)):
	   //print_r($roles_recrod);
	   foreach($roles_recrod as $key=>$role):

	  	$this->roles[] = array(
			    'userID' => $this->_userID,
			    'roleName' => $role->roleName,
			    'roleID' => $role->roleID,
			    'rolePermission'=>  $this->listRolePermissions($role->roleID)
		
	    	); 
	   endforeach;
	   
       endif;
//       
//	// $this->roles =  
//	echo "<pre>";print_r($this->roles); echo "</pre>";
	
    }
    
    
         // return a role object with associated permissions
    private function listRolePermissions($role_id = 0) {
	
	$this->db->join('auth_permissions', 'auth_role_perm.permID=auth_permissions.permID');
	
        $this->db->where('auth_role_perm.roleID', $role_id);
         
	return  $this->db->get('auth_role_perm')->result();
    }
    
    
    
    
    /**
     * list all the roles
     * @return array
     */
    function listRoles(){	
	return  $this->db->get('auth_roles')->result();
    }
    
    
    function removeUserRoles($userID){
	$this->db->where('userID', $userID);
	$this->db->delete('auth_user_role');
    }
    
    
    function addUserRole($content){
	$this->db->insert('auth_user_role', $content);	
    }
    
    function listUserRoles($userID){
	$this->db->join('auth_roles', 'auth_user_role.roleID=auth_roles.roleID');
	$this->db->where('userID', $userID);
	return $this->db->get('auth_user_role')->result();
    }
    
}
?>