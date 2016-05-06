
<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author trblap
 */
class Transfer_model extends CI_Model {

     private $table = 'transfers';
     
    function __construct() {
        parent::__construct();
    }
    
    /*
     * function to add new record to Transfer table
     * @params data
     * @returns object or null
     */

    function addNewTransfer($data) {

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    function updateTransfer($content, $where){
	 $this->db->where($where);
        $this->db->update($this->table,$content);
        
        return $this->db->affected_rows();
    }
    
    
    function getByID($transferID) {
        return $this->db->where('transferID', $transferID)
                        ->get($this->table, 1)
                        ->row();
    }

    function getByApplicationID($applicationID){
        return $this->db->where('applicationID', $applicationID)
                        ->get($this->table)
                        ->row();
    }
     function listByApplicationID($applicationID){
        return $this->db->where('applicationID', $applicationID)
                        ->get($this->table)
                        ->result();
    }
    
    function deleteByID($transferID){
        $this->db->where('transferID', $transferID);
        $this->db->delete($this->table);
    }

    function deleteByApplication($applicationID)  {
        $this->db->where('applicationID', $applicationID);
        $this->db->delete($this->table);
    }
    
    
    
         /**
     * basically you are checking if this contribution request belongs to this client
     * 
     * @return boolean
     */
    function isAvalidRequest($clientID, $applicationID, $transferID){
	$this->db->join('applications', "applications.applicationID = {$this->table}.applicationID");
	
	$isValid['applications.applicationID'] = $applicationID;
	$isValid['transferID'] = $transferID;
	$isValid['clientID'] = $clientID;
	
	 $this->db->where($isValid);       
        if( $this->db->count_all_results($this->table) < 1):
            return false;
        endif;
        
        return true;
	
    }


}
