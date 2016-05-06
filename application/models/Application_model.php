<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of application model
 *
 */
class Application_model extends CI_Model{
 
     private $table = 'applications';
     
    function __construct() {
        parent::__construct();
	
	
    }
    
     
   
    
    
     /*
     * function to add new record to Applicationtable
     * @params data
     * @returns object or null
     */

    function addNewApplication($data) {

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    
    
        /*
     * function to check existing record Applicationtable
     * @params data
     * @returns object or null
     */

    function isApplicationExists($data) {
        $this->db->where($data);
        $res = $this->db->get($this->table);
        if ($res) {
            return $res->row();
        }
        return false;
    }

   
     function getByID($applicationID) {
        return $this->db->where('applicationID', $applicationID)
                        ->get($this->table, 1)
                        ->row();
    }

    function getByReference($applicationReference)  {
        return $this->db->where('applicationReference', $applicationReference)
                        ->get($this->table, 1)
                        ->row();
    }

    function getBySchemeAccountNumber($schemeAccountNumber){
        return $this->db->where('schemeAccountNumber', $schemeAccountNumber)
        ->get($this->table, 1)
        ->row();
    }
    
     function getByClientID( $applicationID = 0, $clientID = 0) {
	 $this->db->where('applicationID', $applicationID);
        return $this->db->where('clientID', $clientID)
                        ->get($this->table)->row();
    }

    function getAllByClientID($clientID){
        return $this->db->where('clientID', $clientID)
                        ->get($this->table)
                        ->result();
    }

    

        /**
     * basically you are checking if this application request belongs to this client
     * 
     * @return boolean
     */
    function isAvalidRequest($clientID, $applicationID){

	$isValid['applications.applicationID'] = $applicationID;
	$isValid['clientID'] = $clientID;
	
	 $this->db->where($isValid);       
        if( $this->db->count_all_results($this->table) < 1):
            return false;
        endif;
        
        return true;
	
    }

}