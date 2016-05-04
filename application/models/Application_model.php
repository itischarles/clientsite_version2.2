<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of application model
 *
 */
class Application_model extends CI_Model{
 
    function __construct() {
        parent::__construct();
    }
    
     
   
    
    
     /*
     * function to add new record to Applicationtable
     * @params data
     * @returns object or null
     */

    function addNewApplication($data) {

        $this->db->insert('applications', $data);
        return $this->db->insert_id();
    }
    
    
    
        /*
     * function to check existing record Applicationtable
     * @params data
     * @returns object or null
     */

    function isApplicationExists($data) {
        $this->db->where($data);
        $res = $this->db->get("applications");
        if ($res) {
            return $res->row();
        }
        return false;
    }

   

    /*
     * function to get all records of application table
     * @params clientID
     * @returns object or null
     */

    public function getMyApplication($clientID) {
        $this->db->where('clientID', $clientID);
        $res = $this->db->get('applications');
        if ($res) {
            return $res->row();
        }
        return false;
    }
    
    /*
     * function to get a record
     * @params app_id
     * @returns object or null
     */

    public function getApplicationDataById($app_id) {
        $this->db->where('applicationID', $app_id);
        $res = $this->db->get('applications');
        if ($res) {
            return $res->row();
        }
        return false;
    }
    
    /*
     * function to get a record
     * @params userID
     * @returns object or null
     */
    
     public function getClientByUserId($userID) {

        $this->db->where('userID', $userID);
        return $this->db->get('clients')->row();
    }

}