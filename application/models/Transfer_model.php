
<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author trblap
 */
class Transfer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * function to add new record to Transfer table
     * @params data
     * @returns object or null
     */

    function addNewTransfer($data) {

        $this->db->insert('transfers', $data);
        return $this->db->insert_id();
    }
    
    /*
     * function to get all records of Transfer table
     * @params app_id
     * @returns object or null
     */

    public function getTransferDataById($app_id) {
        $this->db->where('applicationID', $app_id);
        $res = $this->db->get('transfers');
        if ($res) {
            return $res->result();
        }
        return false;
    }

}
