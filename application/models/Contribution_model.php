
<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author trblap
 */
class Contribution_model extends CI_Model {

    private $table = 'contributions';
    
    function __construct() {
        parent::__construct();
    }
    
     /*
     * function to add new record to Contribution table
     * @params data
     * @returns object or null
     */

    function addNewContribution($data) {

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
     function updateContribution($data, $where) {
	 $this->db->where($where);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
    
    
    function getByID($contributionID)  {
        return $this->db->where('contributionID', $contributionID)
                        ->get($this->table, 1)
                        ->row();
    }

    function listByApplicationID($applicationID)   {
        return $this->db->where('applicationID', $applicationID)
                        ->get($this->table)
                        ->result();
    }
    
    function getByApplicationID($applicationID)    {
        return $this->db->where('applicationID', $applicationID)
                        ->get($this->table)
                        ->row();
    }
    
    
    function deleteByID($contributionID) {
        $this->db->where('contributionID', $contributionID);
        $this->db->delete($this->table);
    }

    function deleteByApplicationID($applicationID){
        $this->db->where('applicationID', $applicationID);
        $this->db->delete($this->table);
    }
    
    /*
     * function to Check the Selected  Fund type already exists
     * @params wdata
     * @returns object or null
     */
//
//    function fundTypeExists($wdata) {
//        $this->db->where($wdata);
//        $query = $this->db->get($this->table);
//        if ($query->num_rows() > 0) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//    
    
        /**
     * basically you are checking if this contribution request belongs to this client
     * 
     * @return boolean
     */
    function isAvalidRequest($clientID, $applicationID, $contribbutionID){
	$this->db->join('applications', "applications.applicationID = {$this->table}.applicationID");
	
	$isValid['applications.applicationID'] = $applicationID;
	$isValid['contributionID'] = $contribbutionID;
	$isValid['clientID'] = $clientID;
	
	 $this->db->where($isValid);       
        if( $this->db->count_all_results($this->table) < 1):
            return false;
        endif;
        
        return true;
	
    }

}
