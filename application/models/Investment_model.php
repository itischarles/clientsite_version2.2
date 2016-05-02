
<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author trblap
 */
class Investment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * function to add new record to Investment table
     * @params data
     * @returns object or null
     */

    function addNewInvestment($data) {

        $this->db->insert('investment_intructions', $data);
        return $this->db->insert_id();
    }

    /*
     * function to get all records of Investment table
     * @params app_id
     * @returns object or null
     */

    public function getInvestmentDataById($app_id) {
        $this->db->where('applicationID', $app_id);
        $res = $this->db->get('investment_intructions');
        if ($res) {
            return $res->result();
        }
        return false;
    }
    
    /*
     * function to Check the Selected investment option already exists
     * @params wdata
     * @returns object or null
     */

    function investmentOptionsExists($wdata) {
        $this->db->where($wdata);
        $query = $this->db->get('investment_intructions');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

  
}
