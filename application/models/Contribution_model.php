
<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author trblap
 */
class Contribution_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
     /*
     * function to add new record to Contribution table
     * @params data
     * @returns object or null
     */

    function addNewContribution($data) {

        $this->db->insert('contributions', $data);
        return $this->db->insert_id();
    }
    
    
    /*
     * function to get all records of Contributions table
     * @params app_id
     * @returns object or null
     */

    public function getContributionsDataById($app_id) {
        $this->db->where('applicationID', $app_id);
        $res = $this->db->get('contributions');
        if ($res) {
            return $res->result();
        }
        return false;
    }
    
    /*
     * function to Check the Selected  Fund type already exists
     * @params wdata
     * @returns object or null
     */

    function fundTypeExists($wdata) {
        $this->db->where($wdata);
        $query = $this->db->get('contributions');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
