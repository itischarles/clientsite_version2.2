
<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author trblap
 */
class Investment_model extends CI_Model {

     private $investmentTable = "investment_intructions";
     private $investmentTypeTable = "investment_type";
    
    function __construct() {
        parent::__construct();
    }

    /*
     * function to add new record to Investment table
     * @params data
     * @returns object or null
     */

    function addNewInvestment($data) {

        $this->db->insert($this->investmentTable, $data);
        return $this->db->insert_id();
    }
    
      /**
    * update invest ttable
    * @param array $content
    * @param array $where
    * @return int
    */
   function editInvestment($content, $where){
       $this->db->update($this->investmentTable,$content,$where);
	 return $this->db->affected_rows();
   }

      
    function getByID($investmentID)  {
        // Get Fund Details if selected.
        $this->db->join($this->investmentTypeTable, "{$this->investmentTable}.investmentTypeID = {$this->investmentTypeTable}.investmentTypeID", 'left');
//        $this->db->join('fund_manager', 'fund.fundManagerID = fund_manager.fundManagerID', 'left');
        return $this->db->where('investmentInstructionID', $investmentID)
                        ->get($this->investmentTable, 1)
                        ->row();
    }
    
    // get investment by policy ID
    function listByApplicationID($applicationID)    {
	$this->db->join($this->investmentTypeTable, "{$this->investmentTable}.investmentTypeID = {$this->investmentTypeTable}.investmentTypeID", 'left');

        return $this->db->where('applicationID', $applicationID)
                        ->get($this->investmentTable)
                        ->result();
    }
    
  
  
  
  

  
  
  /**
   * delete investion instruction by id
   * @param int $contributionID
   */

   function deleteByID($investmentID)
    {
        $this->db->where('investmentInstructionID', $investmentID);
        $this->db->delete($this->investmentTable);
    }

    
    /**
   * delete investment instruction by policy id
   * @param int $policy id
   */
    function deleteByApplicationID($applicationID)
    {
        $this->db->where('applicationID', $applicationID);
        $this->db->delete($this->investmentTable);
    }
    
    /*
     * function to Check the Selected investment option already exists
     * @params wdata
     * @returns object or null
     */

//    function investmentOptionsExists($wdata) {
//        $this->db->where($wdata);
//        $query = $this->db->get('investment_intructions');
//        if ($query->num_rows() > 0) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    
       /**
     * basically you are checking if this contribution request belongs to this client
     * 
     * @return boolean
     */
    function isAvalidRequest($clientID, $applicationID, $investmentID){
	$this->db->join('applications', "applications.applicationID = {$this->investmentTable}.applicationID");
	
	$isValid['applications.applicationID'] = $applicationID;
	$isValid['investmentInstructionID'] = $investmentID;
	$isValid['clientID'] = $clientID;
	
	 $this->db->where($isValid);       
        if( $this->db->count_all_results($this->investmentTable) < 1):
            return false;
        endif;
        
        return true;
	
    }
  
}
